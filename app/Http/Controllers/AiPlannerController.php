<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiPlannerController extends Controller
{
    /**
     * Stream an AI-generated itinerary from Google Gemini.
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        $userMessage = trim($request->input('message'));
        $apiKey      = config('services.gemini.api_key');
        $chatCount   = (int) $request->session()->get('ai_planner_chat_count', 0);

        if ($chatCount >= 2) {
            $request->session()->put('ai_planner_chat_count', $chatCount + 1);

            return response()->json([
                'reply' => 'You have reached the planner chat limit for this session. Please contact our customer service team for a live itinerary review and booking support.',
            ]);
        }

        $request->session()->put('ai_planner_chat_count', $chatCount + 1);

        if (empty($apiKey)) {
            return response()->json([
                'reply' => $this->buildFallbackReply($userMessage),
            ]);
        }

        $systemPrompt = <<<PROMPT
You are HimalayaAI, an expert Nepal travel assistant with deep knowledge of trekking routes, permits, culture, weather, and logistics across all 30+ major Nepal destinations including Everest Base Camp, Annapurna Circuit, Langtang, Mustang, Manaslu, Rara Lake, Kanchenjunga, Dolpo, Nar Phu Valley, and more.

When generating itineraries:
- Include day-by-day breakdown with altitudes
- Mention best season, permits required, fitness level
- Add packing tips and acclimatization advice
- Format responses with markdown (bold headings, bullet points)
- Be enthusiastic, professional, and safety-conscious
- Keep responses concise but complete (max 500 words)
PROMPT;

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $systemPrompt . "\n\nUser: " . $userMessage],
                            ],
                        ],
                    ],
                    'generationConfig' => [
                        'temperature'     => 0.8,
                        'maxOutputTokens' => 800,
                    ],
                ]
            );

            if ($response->successful()) {
                $data  = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text']
                    ?? 'Sorry, I could not generate a response. Please try again.';

                return response()->json(['reply' => $reply]);
            }

            return response()->json([
                'reply' => $this->buildFallbackReply($userMessage),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'reply' => $this->buildFallbackReply($userMessage),
            ]);
        }
    }

    private function buildFallbackReply(string $userMessage): string
    {
        $message = strtolower($userMessage);
        $days = 4;

        if (preg_match('/\b(\d+)\s*days?\b/i', $userMessage, $matches)) {
            $days = max(2, min(7, (int) $matches[1]));
        }

        $focus = 'trekking';
        if (str_contains($message, 'culture')) {
            $focus = 'culture';
        } elseif (str_contains($message, 'wildlife')) {
            $focus = 'wildlife';
        } elseif (str_contains($message, 'spiritual')) {
            $focus = 'spiritual';
        } elseif (str_contains($message, 'food')) {
            $focus = 'food';
        }

        $destination = 'Nepal';
        if (str_contains($message, 'poon hill') || str_contains($message, 'poonhill')) {
            $destination = 'Poon Hill';
        } elseif (str_contains($message, 'annapurna')) {
            $destination = 'Annapurna';
        } elseif (str_contains($message, 'everest')) {
            $destination = 'Everest';
        } elseif (str_contains($message, 'langtang')) {
            $destination = 'Langtang';
        }

        $comfort = 'Boutique';
        if (str_contains($message, 'budget') || str_contains($message, 'essential')) {
            $comfort = 'Essential';
        } elseif (str_contains($message, 'luxury')) {
            $comfort = 'Luxury';
        }

        $destinationHint = $destination === 'Poon Hill'
            ? 'Poon Hill sunrise trek'
            : "{$destination} trip";

        return "Here is a practical draft itinerary for your {$destinationHint}, ready to review while Gemini is being connected.\n\n"
            . "### {$destination} {$days}-Day Planner\n"
            . "- Focus: {$focus}\n"
            . "- Comfort level: {$comfort}\n"
            . "- Suggested pace: balanced, with acclimatization time and flexible rest stops\n\n"
            . ($destination === 'Poon Hill'
                ? "1. Day 1: Arrive in Pokhara, settle into a comfortable lodge, and prepare for the sunrise trek.\n"
                    . "2. Day 2: Drive to Nayapul, trek through rhododendron forests, and stay near Ghorepani.\n"
                    . "3. Day 3: Early sunrise at Poon Hill, then continue toward a scenic valley stop and overnight stay.\n"
                    . "4. Day 4: Return to Pokhara with time for local sightseeing and a relaxed farewell.\n\n"
                : "1. Day 1: Arrival in Kathmandu or Pokhara, hotel check-in, gear review, and a short orientation walk.\n"
                    . "2. Day 2: Scenic transfer to the trailhead, light hike, and tea-house stay.\n"
                    . "3. Day 3: Core trekking day with mountain views, local villages, and cultural stops.\n"
                    . "4. Day 4: Summit viewpoint or final valley walk, then return to the city for departure.\n\n")
            . "Tip: Add permits, weather checks, and a backup buffer for flight delays. If you add your GEMINI_API_KEY later, the planner can upgrade this draft to a live AI itinerary."
            ;
    }
}
