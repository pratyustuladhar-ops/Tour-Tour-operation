<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>HimalayaAI | AI Route Planner</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&amp;family=Manrope:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "outline": "#707881",
                    "on-tertiary-fixed-variant": "#0e5138",
                    "primary-fixed": "#cde5ff",
                    "tertiary": "#266449",
                    "surface": "#f7f9fb",
                    "surface-container-high": "#e6e8ea",
                    "on-error": "#ffffff",
                    "on-primary": "#ffffff",
                    "secondary": "#9b4500",
                    "tertiary-fixed-dim": "#95d4b3",
                    "on-secondary-fixed-variant": "#763300",
                    "surface-container-lowest": "#ffffff",
                    "inverse-surface": "#2d3133",
                    "on-secondary": "#ffffff",
                    "primary-fixed-dim": "#94ccff",
                    "primary": "#005d90",
                    "secondary-container": "#fc8a40",
                    "on-primary-fixed-variant": "#004b74",
                    "surface-tint": "#006399",
                    "on-tertiary-container": "#dfffeb",
                    "surface-container-highest": "#e0e3e5",
                    "surface-dim": "#d8dadc",
                    "primary-container": "#0077b6",
                    "on-surface-variant": "#404850",
                    "on-tertiary-fixed": "#002114",
                    "on-tertiary": "#ffffff",
                    "on-secondary-fixed": "#331200",
                    "error": "#ba1a1a",
                    "on-background": "#191c1e",
                    "secondary-fixed-dim": "#ffb68d",
                    "tertiary-container": "#417d61",
                    "surface-container": "#eceef0",
                    "inverse-primary": "#94ccff",
                    "surface-container-low": "#f2f4f6",
                    "surface-variant": "#e0e3e5",
                    "on-primary-container": "#f3f7ff",
                    "on-primary-fixed": "#001d32",
                    "on-error-container": "#93000a",
                    "tertiary-fixed": "#b1f0ce",
                    "outline-variant": "#bfc7d1",
                    "inverse-on-surface": "#eff1f3",
                    "on-secondary-container": "#672c00",
                    "error-container": "#ffdad6",
                    "surface-bright": "#f7f9fb",
                    "on-surface": "#191c1e",
                    "secondary-fixed": "#ffdbc9",
                    "background": "#f7f9fb"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "xl": "64px",
                    "container-max": "1280px",
                    "gutter": "20px",
                    "sm": "16px",
                    "md": "24px",
                    "xs": "8px",
                    "lg": "40px",
                    "base": "4px"
            },
            "fontFamily": {
                    "headline-lg-mobile": ["Plus Jakarta Sans"],
                    "display-lg": ["Plus Jakarta Sans"],
                    "body-md": ["Manrope"],
                    "label-md": ["Manrope"],
                    "label-sm": ["Manrope"],
                    "headline-lg": ["Plus Jakarta Sans"],
                    "headline-md": ["Plus Jakarta Sans"],
                    "body-lg": ["Manrope"]
            },
            "fontSize": {
                    "headline-lg-mobile": ["28px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .ai-aura {
            box-shadow: 0 0 20px rgba(0, 93, 144, 0.15);
        }
        .route-line-anim {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: dash 3s ease-out forwards;
        }
        @keyframes dash {
            to { stroke-dashoffset: 0; }
        }
        .message-bubble {
            border-radius: 20px;
            max-width: 85%;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">

<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-md border-b border-white/20 dark:border-outline/20 shadow-sm">
    <div class="flex justify-between items-center w-full px-md md:px-lg max-w-container-max mx-auto h-16">
        <a href="/" class="flex items-center gap-xs">
            <span class="material-symbols-outlined text-primary text-3xl">landscape</span>
            <span class="text-headline-md font-headline-md font-bold tracking-tight text-primary">HimalayaAI</span>
        </a>
        <div class="hidden md:flex items-center gap-lg">
            <a class="text-label-md font-label-md text-on-surface-variant hover:bg-primary-container/20 transition-colors px-3 py-1 rounded-full" href="/">Explore</a>
            <a class="text-label-md font-label-md text-primary font-bold px-3 py-1 rounded-full bg-primary/10" href="/planner">Plan</a>
            <a class="text-label-md font-label-md text-on-surface-variant hover:bg-primary-container/20 transition-colors px-3 py-1 rounded-full" href="/bookings">Bookings</a>
            <a class="text-label-md font-label-md text-on-surface-variant hover:bg-primary-container/20 transition-colors px-3 py-1 rounded-full" href="/dashboard">My Trips</a>
        </div>
        <div class="flex items-center gap-sm">
            <a href="/bookings" class="bg-primary-container text-on-primary-container text-label-md font-label-md px-4 py-2 rounded-full hover:scale-95 duration-200">New Trek</a>
            @auth
                <div class="flex items-center gap-2">
                    @if(auth()->user()->is_admin)
                    <a href="/admin" class="text-xs px-3 py-1.5 rounded-full font-bold" style="background:rgba(245,158,11,0.12);color:#d97706;border:1px solid rgba(245,158,11,0.3);">Admin</a>
                    @endif
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-tertiary flex items-center justify-center text-white font-black text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <form action="/auth/logout" method="POST">
                        @csrf
                        <button type="submit" class="text-xs text-on-surface-variant hover:text-primary">Sign out</button>
                    </form>
                </div>
            @else
                <a href="/auth/login" class="text-label-md font-bold text-primary border border-primary/30 px-4 py-2 rounded-full hover:bg-primary hover:text-white transition-all duration-200">Sign In</a>
                <a href="/auth/register" class="text-label-md font-bold text-white bg-primary px-4 py-2 rounded-full hover:bg-primary-container hover:text-on-primary-container transition-all duration-200">Register</a>
            @endauth
        </div>
    </div>
</header>

<main class="pt-24 pb-32 px-md md:px-xl max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-12 gap-lg relative">
    <!-- Left Column: AI Interface & Inputs -->
    <section class="lg:col-span-5 space-y-md">
        <!-- AI Guide Persona Header -->
        <div class="glass-panel p-md rounded-xl flex items-center gap-md ai-aura">
            <div class="relative">
                <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-3xl">smart_toy</span>
                </div>
                <div class="absolute bottom-0 right-0 w-4 h-4 bg-tertiary rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h2 class="text-headline-md font-headline-md text-primary">HimalayaAI Guide</h2>
                <p class="text-label-md font-label-md text-on-surface-variant uppercase tracking-wider">Active Planning Session</p>
            </div>
        </div>

        <!-- Chat / Multi-step Form -->
        <div class="glass-panel p-md rounded-xl h-[600px] flex flex-col shadow-sm border border-white/40">
            <div id="chat-box" class="flex-1 overflow-y-auto space-y-lg pr-2 scrollbar-hide">
                <!-- Message: Welcome -->
                <div class="flex items-start gap-sm">
                    <div class="bg-surface-container-highest p-4 message-bubble text-on-surface">
                        <p class="text-body-md font-body-md">Namaste! I'm your HimalayaAI Guide. Let's design your perfect journey through the peaks. To start, how many days do you have for this adventure?</p>
                    </div>
                </div>

                <!-- Step 1: Days & Group Inputs -->
                <div class="grid grid-cols-2 gap-sm">
                    <div class="space-y-xs">
                        <label class="text-label-sm font-label-sm text-outline px-1">DURATION</label>
                        <div class="relative">
                            <input id="input-duration" class="w-full bg-white border-outline-variant rounded-lg p-3 text-body-md focus:ring-primary focus:border-primary" placeholder="7" type="number" value="7"/>
                            <span class="material-symbols-outlined absolute right-3 top-3 text-outline-variant">calendar_month</span>
                        </div>
                    </div>
                    <div class="space-y-xs">
                        <label class="text-label-sm font-label-sm text-outline px-1">GROUP SIZE</label>
                        <div class="relative">
                            <select id="input-group-size" class="w-full bg-white border-outline-variant rounded-lg p-3 text-body-md focus:ring-primary focus:border-primary appearance-none">
                                <option value="Solo">Solo Traveler</option>
                                <option value="Couple" selected>Couple (2)</option>
                                <option value="Small Group">Small Group (3-5)</option>
                                <option value="Large Team">Large Team (6+)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-3 text-outline-variant pointer-events-none">group</span>
                        </div>
                    </div>
                </div>

                <!-- Message: Interests -->
                <div class="flex items-start gap-sm">
                    <div class="bg-surface-container-highest p-4 message-bubble text-on-surface">
                        <p class="text-body-md font-body-md">Excellent. What's the soul of this trip? Select your primary interests below.</p>
                    </div>
                </div>

                <!-- Interest Chips -->
                <div id="interest-chips" class="flex flex-wrap gap-xs">
                    <button data-interest="Trekking" class="interest-chip px-4 py-2 rounded-full border border-primary-fixed-dim bg-primary-fixed text-on-primary-fixed text-label-md font-label-md transition-all active:scale-95">Trekking</button>
                    <button data-interest="Adventure" class="interest-chip px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary text-label-md font-label-md transition-all active:scale-95">Adventure</button>
                    <button data-interest="Culture" class="interest-chip px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary text-label-md font-label-md transition-all active:scale-95">Culture</button>
                    <button data-interest="Spiritual" class="interest-chip px-4 py-2 rounded-full border border-primary-fixed-dim bg-primary-fixed text-on-primary-fixed text-label-md font-label-md transition-all active:scale-95">Spiritual</button>
                    <button data-interest="Wildlife" class="interest-chip px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary text-label-md font-label-md transition-all active:scale-95">Wildlife</button>
                    <button data-interest="Food" class="interest-chip px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary text-label-md font-label-md transition-all active:scale-95">Food</button>
                </div>

                <!-- Message: Budget / Comfort -->
                <div class="flex items-start gap-sm">
                    <div class="bg-surface-container-highest p-4 message-bubble text-on-surface">
                        <p class="text-body-md font-body-md">Lastly, define your comfort level for the Himalayan stay.</p>
                    </div>
                </div>

                <!-- Budget Selector -->
                <div id="comfort-selector" class="flex gap-sm">
                    <button data-comfort="Essential" class="comfort-btn flex-1 p-3 rounded-lg border border-outline-variant text-center hover:bg-slate-50 transition-colors">
                        <span class="material-symbols-outlined block mb-1">backpack</span>
                        <span class="text-label-sm font-label-sm">Essential</span>
                    </button>
                    <button data-comfort="Boutique" class="comfort-btn flex-1 p-3 rounded-lg border-2 border-primary bg-primary-container/10 text-primary text-center transition-colors">
                        <span class="material-symbols-outlined block mb-1">apartment</span>
                        <span class="text-label-sm font-label-sm">Boutique</span>
                    </button>
                    <button data-comfort="Luxury" class="comfort-btn flex-1 p-3 rounded-lg border border-outline-variant text-center hover:bg-slate-50 transition-colors">
                        <span class="material-symbols-outlined block mb-1">diamond</span>
                        <span class="text-label-sm font-label-sm">Luxury</span>
                    </button>
                </div>
            </div>

            <!-- Input Chat Footer -->
            <div class="mt-md pt-md border-t border-outline-variant/20 flex gap-sm items-center">
                <button class="text-primary hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">add_circle</span>
                </button>
                <input id="chat-input" class="flex-1 border-none bg-surface-container-low rounded-lg px-4 py-2 text-body-md focus:ring-0 focus:outline-none" placeholder="Tell me more about your vibe..." type="text"/>
                <button id="chat-submit" class="bg-primary text-on-primary p-3 rounded-full shadow-lg hover:shadow-primary/20 transition-all active:scale-95 flex items-center justify-center">
                    <span class="material-symbols-outlined">auto_awesome</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Right Column: AI Output / Itinerary -->
    <section class="lg:col-span-7 space-y-md">
        <div class="glass-panel p-lg rounded-2xl shadow-xl overflow-hidden relative min-h-[800px]">
            <!-- Header with Elevation Profile -->
            <div class="flex justify-between items-end mb-xl relative z-10">
                <div>
                    <h2 id="itinerary-title" class="text-headline-lg font-headline-lg text-primary transition-all duration-300">Annapurna Spiritual Sanctuary</h2>
                    <div class="flex flex-wrap items-center gap-md mt-sm">
                        <div class="flex items-center gap-xs text-on-surface-variant">
                            <span class="material-symbols-outlined text-base">location_on</span>
                            <span class="text-label-md font-label-md">Nepal, Himalayas</span>
                        </div>
                        <div class="flex items-center gap-xs text-tertiary">
                            <span class="material-symbols-outlined text-base">speed</span>
                            <span id="itinerary-difficulty" class="text-label-md font-label-md">Moderate Difficulty</span>
                        </div>
                        <div class="flex items-center gap-xs text-secondary">
                            <span class="material-symbols-outlined text-base">hotel</span>
                            <span id="itinerary-hotel-style" class="text-label-md font-label-md">Boutique Comforts</span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <span id="itinerary-days-num" class="text-display-lg font-display-lg text-primary">7</span>
                    <span class="text-headline-md font-headline-md text-on-surface-variant">Days</span>
                </div>
            </div>

            <!-- Animated Route Line SVG -->
            <div class="absolute top-48 right-12 w-32 h-64 opacity-20 pointer-events-none z-0">
                <svg class="w-full h-full" fill="none" viewbox="0 0 100 200">
                    <path class="route-line-anim" d="M50 0C70 40 10 60 40 100C70 140 20 160 50 200" stroke="#005d90" stroke-linecap="round" stroke-width="2"></path>
                </svg>
            </div>

            <!-- Itinerary Timeline -->
            <div id="itinerary-timeline" class="space-y-lg relative z-10 mt-8">
                <!-- Days will be loaded dynamically by script -->
            </div>

            <!-- Book and Total Budget Summary -->
            <div class="mt-xl pt-lg border-t border-slate-200 relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="w-full md:max-w-md">
                    <div class="flex items-center justify-between gap-3 flex-wrap">
                        <span class="text-label-sm text-slate-500 uppercase tracking-widest block">Cost Simulator</span>
                        <label class="inline-flex items-center gap-2 text-xs text-slate-500 uppercase tracking-[0.18em]">
                            <span>Convert</span>
                            <select id="currency-selector" class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-sm text-slate-700 shadow-sm focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="USD">USD</option>
                                <option value="NPR">NPR</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </label>
                    </div>
                    <div class="mt-3 flex items-baseline gap-2">
                        <span id="itinerary-cost" class="text-display-lg font-black text-primary">$1,740</span>
                        <span id="currency-label" class="text-sm text-slate-500">USD</span>
                    </div>
                    <p id="cost-note" class="text-xs text-slate-500">Live estimate • 1 USD ≈ NPR 133</p>
                </div>
                <a href="/bookings" id="booking-btn" class="w-full md:w-auto bg-primary text-white text-center font-bold px-10 py-4 rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:bg-primary-container transition-all active:scale-95 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">payments</span>
                    Book This Custom Itinerary
                </a>
            </div>
        </div>
    </section>
</main>

<script>
    // Itinerary generation database based on combinations
    const itineraryTemplate = {
        Day1: {
            title: "Arrival & Welcome",
            details: {
                Spiritual: "Arrival at Tribhuvan International. AI-selected luxury stay at traditional Dwarika's Hotel. Afternoon guided tour of the Pashupatinath Temple for spiritual grounding.",
                Trekking: "Arrival at Kathmandu. Check-in to your comfortable lodge, followed by a detailed trek briefing and gear checking session with your lead Sherpa guide.",
                Culture: "Arrival at Tribhuvan International. Transfer to Kathmandu Newar boutique hotel. Evening tour of the ancient Patan Durbar Square, tasting local delicacies.",
                Wildlife: "Arrival in Kathmandu. Airport transfer to boutique hotel. Afternoon briefing on Nepal's biodiversity, national parks, and safari preparations.",
                Default: "Arrival at Tribhuvan International. Private check-in to your hotel. Rest, unpack, and join the pre-trip welcome dinner with local guides."
            },
            hotel: {
                Essential: "Comfortable Local Lodge / Guesthouse",
                Boutique: "Traditional Newar Heritage Stay (Dwarika's)",
                Luxury: "Dwarika's Resort / 5-Star Luxury Hyatt"
            },
            elevation: "1,400m",
            icon: "flight_land",
            img: "https://lh3.googleusercontent.com/aida-public/AB6AXuCFftTYqblSF6gP6IRoIbvsKbZ1Uzox23X4S2cdhovdITzApaLSQbTa8ii5ZeuLEkQcP_URP15X-mUcohy499EKbFVWtcTCRcwejgaVWbf9JqLhe8_0jT8Ws7sIris7SFqX6ADejuP0VKD5XZlgc6cwsXDqH-wswGa83d1bxVy-JRVQ06fnPiFQeLsRwIduqnpwSbrQQAdlqL_97Rq88RXT3ndd6CoQGngBdkJ7OMXPLOyTJyEwoEWubaNTbHnJHdRyiJcFmSzu3A"
        },
        Day2: {
            title: "Gateway to the Annapurnas",
            details: {
                Trekking: "Morning scenic flight to Pokhara. Private transfer to Nayapul to begin the trek. A gentle 4-hour hike through rhododendron forests to Tikhedhunga.",
                Adventure: "Fly to Pokhara, transfer to Nayapul. Begin the steep hike to Tikhedhunga, crossing suspension bridges and ascending the stone steps.",
                Spiritual: "Morning flight to Pokhara. Serene lakeside meditation. Private transfer to a peaceful mountain lodge in Tikhedhunga for evening prayer bells.",
                Default: "Fly to Pokhara. Transfer to Nayapul. Scenic walk through farming terraces, valleys, and local rivers to reach Tikhedhunga."
            },
            hotel: {
                Essential: "Tikhedhunga Tea House",
                Boutique: "Ker & Downey Sanctuary Lodge",
                Luxury: "Tiger Mountain Pokhara Lodge"
            },
            elevation: "1,540m",
            icon: "hiking",
            img: "/images/pokhara.png"
        },
        Day3: {
            title: "Ascent to Ghorepani",
            details: {
                Trekking: "A challenging steep climb up the famous 3,200 stone steps of Ulleri. Ascend through oak and rhododendron forests to reach Ghorepani.",
                Default: "Hike up the stone staircase to Ulleri village. Follow trails inside tranquil rhododendron forests, spotting local wildlife, ending at Ghorepani."
            },
            hotel: {
                Essential: "Ghorepani Hilltop Lodge",
                Boutique: "Snowland Guest House",
                Luxury: "Phoolbari Resort Complex"
            },
            elevation: "2,860m",
            icon: "terrain",
            img: "https://lh3.googleusercontent.com/aida-public/AB6AXuCRvUjAXrk9NNS2WIZz-HT75c0bNRzW9qX8Yl08OxFcs3y6f7j9pcqu47Red4sJCJso7GYLIk_YuAUYdHBhWRD3lXG_HwxEHDWPtBPGopRa7ieeIOGSdSCJrMXpRLaLWcbwcISwYoFMrn_uX4H0_NhB3sver3XsX_3bOmCDh_dF1AqexDRO2QCUV_LLH4OSm4m4zuTQGZ_2uPCDSCngTQ01xUI-VZ1Jisij3yyfu9WbUauWadTzDhq5XtTbWw3hQBXNkGRPUUcJeg"
        },
        Day4: {
            title: "Poon Hill Sunrise & Tadapani",
            details: {
                Adventure: "Early morning hike to Poon Hill (3,210m) for sunrise over Dhaulagiri and Annapurna. Return to lodge, eat breakfast, then trek to Tadapani.",
                Spiritual: "Dawn sunrise meditation atop Poon Hill with 360-degree golden Himalayan views. Hike back down, followed by a quiet mountain walk to Tadapani.",
                Default: "Watch the sun illuminate the snow-peaks of Dhaulagiri and Annapurna from Poon Hill. Trek onwards through lush alpine forests to Tadapani."
            },
            hotel: {
                Essential: "Tadapani Forest Lodge",
                Boutique: "Tadapani Panoramic Lodge",
                Luxury: "Himalayan Luxury Camps"
            },
            elevation: "2,630m",
            icon: "wb_sunny",
            img: "https://lh3.googleusercontent.com/aida-public/AB6AXuBqFDnJ676Mkjk50Qfnub4I6BZ8-bLDgPsKYX7kQeC97pVviHOBQk6dyaJ6OsKMA78BAuhX_S4yAoB5xlafNyXk1JcmtL_A1nHSDUdba2F9M6j0G6_BppdooyNXX0MhKlypBnaYvlbD9dczOmDQkRv9UFn7kNbxmzsZt3U09trKSchKCWGh44p4iYAJjCi71pU4Iw6dsOx0LH1UB9RxohcvUeRizosx4tzvLDNXz-q_pFNuU_-PpTbzf2rIFbxaPi1QYaPrqca1oA"
        },
        Day5: {
            title: "Chhomrong Cultural Valley",
            details: {
                Culture: "Descend into the valley of the Gurung people at Chhomrong. Meet village elders, visit the Gurung Cultural Museum, and enjoy local millet bread.",
                Default: "Trek down to the suspension bridge at Kimrong Khola, then climb back up to Chhomrong, a Gurung village tucked directly below Annapurna South."
            },
            hotel: {
                Essential: "Chhomrong Tea House Lodge",
                Boutique: "Fishtail Guest House Chhomrong",
                Luxury: "Chhomrong Luxury Retreat Lodge"
            },
            elevation: "2,170m",
            icon: "groups",
            img: "https://lh3.googleusercontent.com/aida-public/AB6AXuBhJsfF2RVKFsuTUTwQfLVvcDPvy6qpfR2x7XmOqlpAEsJmvc-LURwlQJ2ou4kihcZGD_Rg0XCZGw4tm1J0CCfZSVcoUf8HPklYet-flN9FvZ7rEiFHoqSC3rMgJAjrcwYQlCXr1qEUm2yhpnw5dPVBsH3xCkM_t8DHPB5BzvMEZruNaMp7YZFBqHVOUmGZbu68BITMPOQ4kmBOiMU3O74yJpY-Xnj51XJ9iRjl05DB8RC-7DFaB4EfTb4gbfHOflV6zlV7b4oiNw"
        },
        Day6: {
            title: "Annapurna Base Camp Reach",
            details: {
                Trekking: "Cross the Machhapuchhre Base Camp, entering the Sanctuary basin. Hike to Annapurna Base Camp (4,130m) for breathtaking sunset views.",
                Adventure: "Push through the avalanche corridors past MBC to arrive at ABC. Face the massive vertical walls of Annapurna South, Hiunchuli, and Machhapuchhre.",
                Default: "Ascend past the timberline into the majestic mountain sanctuary. Spend the night at Annapurna Base Camp, surrounded by 360 degrees of glaciers."
            },
            hotel: {
                Essential: "Base Camp Alpine Tea House",
                Boutique: "ABC Sanctuary Lodge Complex",
                Luxury: "Base Camp Heated Glamping Pods"
            },
            elevation: "4,130m",
            icon: "ac_unit",
            img: "/images/himalayas_sunrise.png"
        },
        Day7: {
            title: "Descent & Farewell",
            details: {
                Default: "Wake up for a final sunrise inside the Sanctuary bowl. Fly back to Pokhara or Kathmandu by private helicopter charter, ending your adventure."
            },
            hotel: {
                Essential: "Kathmandu Transit Guesthouse",
                Boutique: "Dwarika's Heritage Hotel (Final Night)",
                Luxury: "Dwarika's Luxury Suites"
            },
            elevation: "1,400m",
            icon: "flight_takeoff",
            img: "https://lh3.googleusercontent.com/aida-public/AB6AXuDwprGD48ZLPirE00vJhhhiet_g6ppF38zDTfp90K6-z2PswlRf09aX03AXfhpb0uQiRxgEC1u1wd3nO9yAJ7b-k0MR-ZZ38gqWoHNnLv08FYWJ5Wuijfrm9uUSsoZTXhHsXKWbvmhmJTl1PkAZHwPINb4Uy8YgLA0Mx2lO3P60iErJI7onyBrjdCX1N3P0Y7HjmQKYU0ZVfUB9uRo65QDGSyTsNYR3nBYX8BQwcsuiz_xpez7CF8-P5UJOs29hV6hdm2cCYNQopw"
        }
    };

    // State Variables
    let currentDuration = 7;
    let currentGroup = "Couple";
    let activeInterests = ["Trekking", "Spiritual"];
    let activeComfort = "Boutique";
    let currentCurrency = 'USD';
    const conversionRates = {
        USD: 1,
        NPR: 133,
        EUR: 0.92,
    };

    // Setup interactive events
    document.addEventListener('DOMContentLoaded', () => {
        setupInterests();
        setupComfort();
        setupFormListeners();
        updateItinerary();

        // Chat submit click
        const chatInput = document.getElementById('chat-input');
        const chatSubmit = document.getElementById('chat-submit');
        
        chatSubmit.addEventListener('click', handleChatSubmit);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') handleChatSubmit();
        });
    });

    // Form selection bindings
    function setupFormListeners() {
        const durationInput = document.getElementById('input-duration');
        const currencySelector = document.getElementById('currency-selector');

        durationInput.addEventListener('change', (e) => {
            let val = parseInt(e.target.value);
            if (val < 2) val = 2;
            if (val > 7) val = 7; // Cap template days
            e.target.value = val;
            currentDuration = val;
            updateItinerary();
            guideReply(`I've set your trek duration to **${val} Days**. The timeline on the right now reflects the adjusted days.`);
        });

        const groupInput = document.getElementById('input-group-size');
        groupInput.addEventListener('change', (e) => {
            currentGroup = e.target.value;
            updateItinerary();
            guideReply(`Group size updated to **${currentGroup}**. Re-calculating the logistics and accommodation availability.`);
        });

        currencySelector.addEventListener('change', (e) => {
            currentCurrency = e.target.value;
            updateItinerary();
        });
    }

    // Toggle interest chips
    function setupInterests() {
        const chips = document.querySelectorAll('.interest-chip');
        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                const interest = chip.getAttribute('data-interest');
                if (activeInterests.includes(interest)) {
                    // Remove
                    activeInterests = activeInterests.filter(item => item !== interest);
                    chip.className = "interest-chip px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary text-label-md font-label-md transition-all active:scale-95";
                } else {
                    // Add
                    activeInterests.push(interest);
                    chip.className = "interest-chip px-4 py-2 rounded-full border border-primary-fixed-dim bg-primary-fixed text-on-primary-fixed text-label-md font-label-md transition-all active:scale-95";
                }
                updateItinerary();
                guideReply(`Noted! Your interest in **${interest}** is now factored into the route. See how the activities changed on the right!`);
            });
        });
    }

    // Comfort Selector
    function setupComfort() {
        const btns = document.querySelectorAll('.comfort-btn');
        btns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Reset styles
                btns.forEach(b => {
                    b.className = "comfort-btn flex-1 p-3 rounded-lg border border-outline-variant text-center hover:bg-slate-50 transition-colors";
                });
                // Set active
                btn.className = "comfort-btn flex-1 p-3 rounded-lg border-2 border-primary bg-primary-container/10 text-primary text-center transition-colors";
                
                activeComfort = btn.getAttribute('data-comfort');
                updateItinerary();
                guideReply(`Switching stay selections to **${activeComfort}** tier. Upgrading teahouses and calculating fresh lodging budgets.`);
            });
        });
    }

    // Dynamic Itinerary Renderer
    function updateItinerary() {
        const titleEl = document.getElementById('itinerary-title');
        const daysEl = document.getElementById('itinerary-days-num');
        const diffEl = document.getElementById('itinerary-difficulty');
        const hotelStyleEl = document.getElementById('itinerary-hotel-style');
        const costEl = document.getElementById('itinerary-cost');
        const currencyLabel = document.getElementById('currency-label');
        const costNote = document.getElementById('cost-note');
        const timeline = document.getElementById('itinerary-timeline');

        // Render Title based on interests
        let titleWord = "Spiritual Sanctuary";
        if (activeInterests.includes("Adventure")) titleWord = "Adventure Odyssey";
        else if (activeInterests.includes("Trekking")) titleWord = "High Glacier Pass";
        else if (activeInterests.includes("Culture")) titleWord = "Heritage Trail";
        else if (activeInterests.includes("Wildlife")) titleWord = "Jungle Sanctuary";
        else if (activeInterests.includes("Food")) titleWord = "Culinary Expedition";
        titleEl.textContent = `Annapurna ${titleWord}`;

        // Render meta
        daysEl.textContent = currentDuration;
        
        let difficulty = "Moderate Difficulty";
        if (activeInterests.includes("Adventure")) difficulty = "Strenuous Difficulty";
        if (activeInterests.includes("Culture")) difficulty = "Easy Difficulty";
        diffEl.textContent = difficulty;

        let hotelStyle = "Boutique Comforts";
        if (activeComfort === "Essential") hotelStyle = "Rustic Teahouses";
        if (activeComfort === "Luxury") hotelStyle = "Ultra Luxury Stays";
        hotelStyleEl.textContent = hotelStyle;

        // Render Budget
        let baseCost = 650;
        if (activeComfort === "Boutique") baseCost = 1450;
        if (activeComfort === "Luxury") baseCost = 3900;
        
        // Group modifier
        let modifier = 1.0;
        if (currentGroup === "Solo") modifier = 0.7;
        if (currentGroup === "Small Group") modifier = 2.2;
        if (currentGroup === "Large Team") modifier = 4.8;
        
        let finalCost = Math.round(baseCost * (currentDuration / 7) * modifier);

        const formatCost = (amount, currency) => {
            if (currency === 'NPR') return `NPR ${Math.round(amount * conversionRates.NPR).toLocaleString()}`;
            if (currency === 'EUR') return `€${Math.round(amount * conversionRates.EUR).toLocaleString()}`;
            return `$${amount.toLocaleString()}`;
        };

        costEl.textContent = formatCost(finalCost, currentCurrency);
        currencyLabel.textContent = currentCurrency;
        costNote.textContent = currentCurrency === 'USD'
            ? 'Live estimate • 1 USD ≈ NPR 133'
            : `Approx. conversion • 1 USD ≈ ${currentCurrency === 'NPR' ? 'NPR 133' : '€0.92'}`;

        // Set up timeline steps
        timeline.innerHTML = '';
        for (let i = 1; i <= currentDuration; i++) {
            let dayKey = `Day${i}`;
            // Fallback for days beyond template
            if (!itineraryTemplate[dayKey]) dayKey = 'Day7';
            
            let template = itineraryTemplate[dayKey];
            
            // Resolve details based on interests
            let details = template.details.Default;
            for (let interest of activeInterests) {
                if (template.details[interest]) {
                    details = template.details[interest];
                    break;
                }
            }

            // Resolve hotel stay
            let hotel = template.hotel[activeComfort] || template.hotel.Boutique;

            const dayCard = document.createElement('div');
            dayCard.className = "flex gap-md group animate-fade-in duration-500";
            dayCard.innerHTML = `
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-label-sm font-label-sm z-10">0${i}</div>
                    ${i < currentDuration ? '<div class="w-0.5 flex-1 bg-outline-variant/30 my-1"></div>' : ''}
                </div>
                <div class="flex-1 bg-white/50 p-md rounded-xl border border-white/60 hover:bg-white/80 transition-all hover:translate-x-1 duration-200">
                    <div class="flex justify-between items-start mb-sm">
                        <div>
                            <h3 class="text-headline-md font-headline-md text-on-surface">${template.title}</h3>
                            <span class="text-xs text-primary font-bold uppercase tracking-wider">${template.elevation}</span>
                        </div>
                        <div class="flex gap-xs">
                            <span class="material-symbols-outlined text-outline">${template.icon}</span>
                            <span class="material-symbols-outlined text-outline">bed</span>
                        </div>
                    </div>
                    <p class="text-body-md text-on-surface-variant mb-4">${details}</p>
                    <div class="mb-4 bg-slate-100/50 p-3 rounded-lg flex items-center gap-2 border border-slate-200/40">
                        <span class="material-symbols-outlined text-sm text-secondary">hotel</span>
                        <span class="text-xs text-on-surface-variant">Stay: <strong>${hotel}</strong></span>
                    </div>
                    <div class="flex gap-sm overflow-x-auto pb-xs scrollbar-hide">
                        <img alt="Day Image" class="w-full h-40 rounded-lg object-cover shadow-sm" src="${template.img}"/>
                    </div>
                </div>
            `;
            timeline.appendChild(dayCard);
        }
    }

    // ── Real Gemini AI chat ─────────────────────────────────────
    async function handleChatSubmit() {
        const input = document.getElementById('chat-input');
        const text = input.value.trim();
        if (!text) return;

        appendChatBubble(text, 'user');
        input.value = '';

        // Local UX helpers: still update chips/duration from keywords
        const tl = text.toLowerCase();
        if (tl.includes('luxury') || tl.includes('five star')) { const b = document.querySelector('[data-comfort="Luxury"]'); if (b) b.click(); }
        if (tl.includes('budget') || tl.includes('essential')) { const b = document.querySelector('[data-comfort="Essential"]'); if (b) b.click(); }
        const dm = tl.match(/(\d+)\s*days?/);
        if (dm) { const d = parseInt(dm[1]); if (d >= 2 && d <= 7) { document.getElementById('input-duration').value = d; currentDuration = d; updateItinerary(); } }

        // Show typing indicator
        const typingId = 'typing-' + Date.now();
        const chatBox = document.getElementById('chat-box');
        chatBox.insertAdjacentHTML('beforeend', `
            <div id="${typingId}" class="flex items-start gap-sm">
                <div class="bg-surface-container-highest p-4 message-bubble text-on-surface flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-primary animate-bounce" style="animation-delay:0ms"></span>
                    <span class="inline-block w-2 h-2 rounded-full bg-primary animate-bounce" style="animation-delay:150ms"></span>
                    <span class="inline-block w-2 h-2 rounded-full bg-primary animate-bounce" style="animation-delay:300ms"></span>
                    <span class="text-sm text-on-surface-variant ml-1">HimalayaAI is thinking…</span>
                </div>
            </div>`);
        chatBox.scrollTop = chatBox.scrollHeight;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            const res = await fetch('/api/planner/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ message: text })
            });
            const data = await res.json();
            document.getElementById(typingId)?.remove();
            appendChatBubble(data.reply || 'Sorry, could not get a response.', 'guide');
        } catch (err) {
            document.getElementById(typingId)?.remove();
            appendChatBubble('⚠️ Connection error. Please check your network and try again.', 'guide');
        }
    }

    function toggleInterestChip(interest, forceActive) {
        const chip = document.querySelector(`[data-interest="${interest}"]`);
        if (!chip) return;
        
        if (forceActive && !activeInterests.includes(interest)) {
            activeInterests.push(interest);
            chip.className = "interest-chip px-4 py-2 rounded-full border border-primary-fixed-dim bg-primary-fixed text-on-primary-fixed text-label-md font-label-md transition-all active:scale-95";
        }
    }

    function renderMarkdown(text) {
        return text
            .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
            .replace(/\*\*(.+?)\*\*/g,'<strong>$1</strong>')
            .replace(/\*(.+?)\*/g,'<em>$1</em>')
            .replace(/^### (.+)$/gm,'<h3 class="font-bold text-primary mt-3 mb-1 text-sm">$1</h3>')
            .replace(/^## (.+)$/gm,'<h2 class="font-bold text-on-surface mt-4 mb-1">$1</h2>')
            .replace(/^- (.+)$/gm,'<li class="ml-4 list-disc">$1</li>')
            .replace(/(<li.*<\/li>)/s,'<ul class="space-y-1 my-2">$1</ul>')
            .replace(/\n\n/g,'<br><br>').replace(/\n/g,'<br>');
    }

    function appendChatBubble(text, sender) {
        const chatBox = document.getElementById('chat-box');
        const bubble = document.createElement('div');
        bubble.className = 'flex items-start gap-sm';
        bubble.style.animation = 'fadeIn 0.3s ease';

        if (sender === 'user') {
            bubble.innerHTML = `
                <div class="ml-auto bg-primary text-white p-4 message-bubble">
                    <p class="text-body-md font-body-md">${text.replace(/</g,'&lt;')}</p>
                </div>`;
        } else {
            bubble.innerHTML = `
                <div class="bg-surface-container-highest p-4 message-bubble text-on-surface">
                    <div class="text-body-md font-body-md leading-relaxed">${renderMarkdown(text)}</div>
                </div>`;
        }
        chatBox.appendChild(bubble);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function guideReply(text) {
        // Debounced or direct reply wrapper
        setTimeout(() => {
            appendChatBubble(text, 'guide');
        }, 300);
    }
</script>
</body>
</html>
