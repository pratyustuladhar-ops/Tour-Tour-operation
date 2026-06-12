<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TourOperationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads_with_tour_operations_dashboard(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('HimalayaAI');
        $response->assertSee('AI-Powered Nepal Exploration');
        $response->assertSee('Iconic Destinations');
    }

    public function test_planner_requires_authentication_and_redirects_guests_to_register(): void
    {
        $response = $this->get('/planner');

        $response->assertRedirect('/auth/register');
    }

    public function test_bookings_page_loads_with_booking_form(): void
    {
        $response = $this->get('/bookings');

        $response->assertStatus(200);
        $response->assertSee('HimalayaAI');
        $response->assertSee('Book your Himalayan itinerary');
        $response->assertSee('tour_name');
    }

    public function test_ai_planner_returns_a_helpful_fallback_when_gemini_key_is_missing(): void
    {
        config(['services.gemini.api_key' => '']);

        $response = $this->postJson('/api/planner/chat', [
            'message' => 'Create a 4-day Annapurna trek plan for a couple.',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['reply']);
        $this->assertStringContainsString('Annapurna', $response->json('reply'));
        $this->assertStringNotContainsString('not configured yet', strtolower($response->json('reply')));
    }

    public function test_ai_planner_mentions_poon_hill_for_that_destination(): void
    {
        config(['services.gemini.api_key' => '']);

        $response = $this->postJson('/api/planner/chat', [
            'message' => 'Plan a Poon Hill sunrise trek for a couple.',
        ]);

        $response->assertStatus(200);
        $this->assertStringContainsString('Poon Hill', $response->json('reply'));
    }

    public function test_ai_planner_directs_users_to_customer_service_after_two_repeated_chats(): void
    {
        config(['services.gemini.api_key' => '']);

        $response = $this->withSession(['ai_planner_chat_count' => 2])
            ->postJson('/api/planner/chat', [
                'message' => 'Please continue the plan.',
            ]);

        $response->assertStatus(200);
        $this->assertStringContainsString('customer service', strtolower($response->json('reply')));
    }

    public function test_booking_submission_stores_a_booking_record(): void
    {
        $response = $this->post('/bookings', [
            'tour_name' => 'Alpine Escape',
            'guest_name' => 'Ava Patel',
            'guest_email' => 'ava@example.com',
            'guests' => 4,
            'travel_date' => '2026-08-15',
            'notes' => 'Window seats preferred',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('bookings', [
            'tour_name' => 'Alpine Escape',
            'guest_email' => 'ava@example.com',
            'guests' => 4,
        ]);
    }
}
