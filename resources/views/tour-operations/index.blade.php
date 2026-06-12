<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>HimalayaAI | Explore Nepal</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-dark {
            background: rgba(0, 93, 144, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .mountain-silhouette {
            mask-image: linear-gradient(to top, black 50%, transparent 100%);
            -webkit-mask-image: linear-gradient(to top, black 50%, transparent 100%);
        }
        .hero-gradient {
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, #f7f9fb 100%);
        }
        .ai-glow {
            box-shadow: 0 0 20px rgba(0, 119, 182, 0.2);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md selection:bg-primary-fixed selection:text-on-primary-fixed">

<!-- Top Navigation Bar -->
<header class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-md border-b border-white/20">
    <nav class="flex justify-between items-center w-full px-md md:px-lg max-w-container-max mx-auto h-16">
        <a href="/" class="flex items-center gap-xs">
            <span class="material-symbols-outlined text-primary text-3xl">landscape</span>
            <span class="text-headline-md font-headline-md font-bold tracking-tight text-primary">HimalayaAI</span>
        </a>
        <div class="hidden md:flex items-center gap-lg">
            <a class="text-primary font-bold text-label-md hover:bg-primary-container/20 px-3 py-2 rounded-lg transition-colors" href="/">Explore</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-colors" href="#destinations">Destinations</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-colors" href="/planner">Trek Planner</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-colors" href="/bookings">Bookings</a>
            <a class="text-on-surface-variant hover:text-primary font-label-md transition-colors" href="/dashboard">Dashboard</a>
        </div>
        <div class="flex items-center gap-md">
            @auth
                @if(auth()->user()->is_admin)
                <a href="/admin" class="hidden md:block text-xs px-3 py-1.5 rounded-full font-bold" style="background:rgba(245,158,11,0.12);color:#d97706;border:1px solid rgba(245,158,11,0.3);">⚡ Admin</a>
                @endif
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-white font-black text-sm cursor-default">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <form action="/auth/logout" method="POST" class="hidden md:block">
                        @csrf
                        <button type="submit" class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium">Sign out</button>
                    </form>
                </div>
            @else
                <a href="/auth/login" class="hidden md:block text-on-surface-variant font-label-md hover:text-primary transition-colors">Sign In</a>
                <a href="/auth/register" class="hidden md:flex items-center gap-1 bg-primary text-white text-label-md px-4 py-2 rounded-full hover:scale-95 duration-200 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-sm">person_add</span> Register
                </a>
            @endauth
            <button class="md:hidden flex items-center justify-center w-10 h-10" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </nav>
    <!-- Mobile dropdown menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-slate-100 bg-white/95 backdrop-blur-lg flex flex-col p-4 gap-3 shadow-lg">
        <a class="text-primary font-bold text-label-md p-2 rounded-lg" href="/">Explore</a>
        <a class="text-on-surface-variant hover:text-primary font-label-md p-2 rounded-lg" href="#destinations">Destinations</a>
        <a class="text-on-surface-variant hover:text-primary font-label-md p-2 rounded-lg" href="/planner">Trek Planner</a>
        <a class="text-on-surface-variant hover:text-primary font-label-md p-2 rounded-lg" href="/bookings">Bookings</a>
        <a class="text-on-surface-variant hover:text-primary font-label-md p-2 rounded-lg" href="/dashboard">Dashboard</a>
    </div>
</header>

<!-- Hero Section -->
<section class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden">
    <!-- Background Image with Gradient Overlay -->
    <div class="absolute inset-0 z-0">
        <img alt="Himalayan Sunrise" class="w-full h-full object-cover" src="/images/himalayas_sunrise.png"/>
        <div class="absolute inset-0 bg-gradient-to-b from-primary/20 via-transparent to-background"></div>
    </div>
    <!-- Content Canvas -->
    <div class="relative z-10 w-full max-w-container-max px-md text-center pt-24">
        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30 mb-8 animate-fade-in">
            <span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
            <span class="text-label-sm text-on-primary-fixed-variant uppercase tracking-widest">AI-Powered Nepal Exploration</span>
        </div>
        <h1 class="text-display-lg font-display-lg text-on-primary-fixed-variant mb-6 max-w-4xl mx-auto md:text-6xl text-4xl">
            Experience the Roof of the <span class="text-primary italic">World</span>
        </h1>
        <p class="text-body-lg text-on-surface-variant max-w-2xl mx-auto mb-12">
            Discover curated trails, hidden spiritual sanctuaries, and breathtaking vistas optimized by HimalayaAI.
        </p>
        <!-- Glassmorphic Search Bar -->
        <div class="max-w-3xl mx-auto glass-panel p-2 rounded-2xl shadow-2xl flex flex-col md:flex-row items-center gap-2 mb-12">
            <div class="flex-1 w-full flex items-center px-4 py-3">
                <span class="material-symbols-outlined text-primary mr-3">search</span>
                <input id="hero-search-input" class="bg-transparent border-none focus:ring-0 w-full text-body-md placeholder:text-on-surface-variant/60" placeholder="Where would you like to explore in Nepal?" type="text"/>
            </div>
            <div class="h-10 w-px bg-outline/20 hidden md:block"></div>
            <button onclick="scrollToCatalog()" class="w-full md:w-auto bg-primary text-white px-8 py-3.5 rounded-xl font-label-md flex items-center justify-center gap-2 hover:bg-primary-container transition-all active:scale-95">
                <span class="material-symbols-outlined text-xl">map</span>
                Explore
            </button>
        </div>
        <!-- CTAs -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="/planner" class="w-full sm:w-auto px-10 py-4 bg-primary text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all flex items-center justify-center gap-2 group">
                Plan My Trek
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            <a href="#destinations" class="w-full sm:w-auto px-10 py-4 bg-white/80 backdrop-blur-md text-primary border border-primary/20 rounded-full font-bold hover:bg-white transition-all text-center">
                Explore Destinations
            </a>
        </div>
    </div>
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-on-surface-variant/50">
        <span class="text-label-sm uppercase tracking-tighter">Discover More</span>
        <div class="w-6 h-10 border-2 border-on-surface-variant/30 rounded-full flex justify-center p-1">
            <div class="w-1 h-2 bg-primary rounded-full animate-bounce"></div>
        </div>
    </div>
</section>

<!-- Mountain Silhouette Spacer -->
<div class="relative h-24 -mt-24 z-20 pointer-events-none">
    <svg class="w-full h-full" fill="none" viewbox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 120H1440V68L1320 48L1180 88L1040 28L880 78L720 18L560 68L400 38L240 88L120 48L0 78V120Z" fill="#f7f9fb"></path>
    </svg>
</div>

<!-- Featured Destinations Section -->
<section id="destinations" class="py-xl bg-surface scroll-mt-16">
    <div class="max-w-container-max mx-auto px-md">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-lg gap-md">
            <div>
                <h2 class="text-headline-lg font-headline-lg text-on-background mb-2">Iconic Destinations</h2>
                <p class="text-body-md text-on-surface-variant max-w-lg">From the spiritual heartbeat of Kathmandu to the silent peaks of Mustang.</p>
            </div>
            <button onclick="scrollToCatalog()" class="flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all">
                View All Regions
                <span class="material-symbols-outlined">arrow_right_alt</span>
            </button>
        </div>

        <!-- Bento Grid of Destinations -->
        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-12 gap-md h-auto lg:h-[800px]">
            <!-- Kathmandu Card (Large) -->
            <div class="md:col-span-3 lg:col-span-4 h-full min-h-[400px] relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all">
                <img alt="Kathmandu" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9J7udGPqaJXK9jGBLQGpjDe_xzQQ_y6YKSbvaxaFc-nOLFZ3qVbVMnWLgcc2krpP-tzvAs824slfblIls8L6R-iUPbn1LiI7dVl_LtHkamGns65XmCzm5a0ZXFNEnZvlND_70Rg-OohjnfyntelTXzRjjH0ksnHe4Jj0tHaAHxDUyKQSKsX2HVUdIMmz8jlCPv5cbm-SbfsoUsDOF2a9um-axlZekNYrlDzXUHtIVvVTD5KAf4hGUlgd89xwoQ6LGdthlQpFSWA"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-lg w-full">
                    <div class="glass-panel backdrop-blur-md p-4 rounded-2xl border border-white/20">
                        <h3 class="text-headline-md font-headline-md text-on-primary-fixed-variant mb-1">Kathmandu</h3>
                        <div class="flex items-center gap-2 text-label-sm text-primary">
                            <span class="material-symbols-outlined text-sm">temple_hindu</span>
                            Ancient Heritage &amp; Spirituality
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pokhara Card (Large) -->
            <div class="md:col-span-3 lg:col-span-8 h-full min-h-[400px] relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all">
                <img alt="Pokhara" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="/images/pokhara.png"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-lg w-full">
                    <div class="glass-panel backdrop-blur-md p-6 rounded-2xl border border-white/20 max-w-sm">
                        <h3 class="text-headline-lg font-headline-lg text-on-primary-fixed-variant mb-2">Pokhara</h3>
                        <p class="text-body-md text-on-surface-variant mb-4">The gateway to the Annapurna Circuit, where peaks reflect in serene lake waters.</p>
                        <button onclick="scrollToCatalog('Annapurna')" class="bg-primary text-white px-6 py-2 rounded-full font-label-md flex items-center gap-2 hover:bg-primary-container transition-colors">
                            Explore Lakes
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Everest Card (Full Width Row) -->
            <div class="md:col-span-6 lg:col-span-6 h-full min-h-[400px] relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all">
                <img alt="Everest Base Camp" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnxxmDnrXB7NeeIqBb55tFDRpIvrcxfBaaNQdsPTvL4YWd8ywgnyyDMqtWkppWBy54aJgBYk6GHywjcsvtFgTV8AhLo3jU45TaTprI2MmVgM8R064Kj-D7WgaVq2YXPWH4q1IHx1Vr0A9GKPTx3zsOTndNrHo3brtXeTAndqnvJXn--OIPjiZxzf-f6R2sYFaijJTRzY62ShxE2Z29Jjddq4KceVu0QiIuIvRWr5nu7IVvICjgVQjjrT_Upz5RWDkEW6SJzwX7zw"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute top-6 right-6">
                    <span class="bg-primary-container text-on-primary-container px-4 py-1 rounded-full text-label-sm font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        Most Popular
                    </span>
                </div>
                <div class="absolute bottom-0 left-0 p-lg w-full">
                    <div class="glass-panel backdrop-blur-md p-4 rounded-2xl border border-white/20">
                        <h3 class="text-headline-md font-headline-md text-on-primary-fixed-variant mb-1">Everest Base Camp</h3>
                        <div class="flex items-center gap-2 text-label-sm text-primary">
                            <span class="material-symbols-outlined text-sm">hiking</span>
                            Ultimate Trekking Achievement
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mustang Card -->
            <div class="md:col-span-3 lg:col-span-3 h-full min-h-[400px] relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all">
                <img alt="Mustang" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="/images/mustang.png"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-lg w-full">
                    <div class="glass-panel backdrop-blur-md p-4 rounded-2xl border border-white/20 text-center">
                        <h3 class="text-headline-md font-headline-md text-on-primary-fixed-variant">Mustang</h3>
                        <span class="text-label-sm text-primary italic">The Forbidden Kingdom</span>
                    </div>
                </div>
            </div>
            <!-- Chitwan Card -->
            <div class="md:col-span-3 lg:col-span-3 h-full min-h-[400px] relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all">
                <img alt="Chitwan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhJsfF2RVKFsuTUTwQfLVvcDPvy6qpfR2x7XmOqlpAEsJmvc-LURwlQJ2ou4kihcZGD_Rg0XCZGw4tm1J0CCfZSVcoUf8HPklYet-flN9FvZ7rEiFHoqSC3rMgJAjrcwYQlCXr1qEUm2yhpnw5dPVBsH3xCkM_t8DHPB5BzvMEZruNaMp7YZFBqHVOUmGZbu68BITMPOQ4kmBOiMU3O74yJpY-Xnj51XJ9iRjl05DB8RC-7DFaB4EfTb4gbfHOflV6zlV7b4oiNw"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-lg w-full">
                    <div class="glass-panel backdrop-blur-md p-4 rounded-2xl border border-white/20">
                        <h3 class="text-headline-md font-headline-md text-on-primary-fixed-variant mb-1">Chitwan</h3>
                        <div class="flex items-center gap-2 text-label-sm text-primary">
                            <span class="material-symbols-outlined text-sm">pets</span>
                            Wildlife &amp; Jungle Safaris
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Lumbini Card for variety -->
        <div class="mt-md w-full relative group overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition-all aspect-[21/9] min-h-[300px]">
            <img alt="Lumbini" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwprGD48ZLPirE00vJhhhiet_g6ppF38zDTfp90K6-z2PswlRf09aX03AXfhpb0uQiRxgEC1u1wd3nO9yAJ7b-k0MR-ZZ38gqWoHNnLv08FYWJ5Wuijfrm9uUSsoZTXhHsXKWbvmhmJTl1PkAZHwPINb4Uy8YgLA0Mx2lO3P60iErJI7onyBrjdCX1N3P0Y7HjmQKYU0ZVfUB9uRo65QDGSyTsNYR3nBYX8BQwcsuiz_xpez7CF8-P5UJOs29hV6hdm2cCYNQopw"/>
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/20 to-transparent flex items-center p-xl">
                <div class="max-w-md text-white">
                    <span class="text-label-sm text-primary-fixed tracking-widest uppercase mb-2 block">Birthplace of Peace</span>
                    <h3 class="text-headline-lg font-headline-lg mb-4">Lumbini</h3>
                    <p class="text-body-md text-white/80 mb-6">A spiritual journey to the birthplace of Lord Buddha. Experience unparalleled tranquility in the sacred gardens.</p>
                    <button onclick="scrollToCatalog('Terai')" class="bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition-all">Plan Spiritual Retreat</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Searchable Catalog Section (30+ Locations) -->
<section id="catalog" class="py-xl bg-[#f0f4f7] border-t border-slate-200 scroll-mt-16">
    <div class="max-w-container-max mx-auto px-md">
        <div class="text-center mb-12">
            <h2 class="text-headline-lg font-headline-lg text-[#191c1e] mb-3">Explore All 30+ Sacred Peaks & Valleys</h2>
            <p class="text-body-lg text-on-surface-variant max-w-xl mx-auto">
                Filter and browse through Nepal's ultimate destinations. Find your perfect adventure match.
            </p>
        </div>

        <!-- Catalog Toolbar -->
        <div class="glass-panel p-4 rounded-3xl mb-8 shadow-md flex flex-col lg:flex-row gap-4 items-center justify-between">
            <div class="relative w-full lg:max-w-md">
                <span class="material-symbols-outlined absolute left-4 top-3.5 text-slate-400">search</span>
                <input id="catalog-search" type="text" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary focus:border-primary bg-white text-body-md" placeholder="Search by name, region, or difficulty..."/>
            </div>

            <!-- Region Filter Chips -->
            <div id="filter-chips" class="flex gap-2 overflow-x-auto w-full lg:w-auto pb-2 lg:pb-0 scrollbar-hide">
                <button data-region="All" class="chip active px-4 py-2 rounded-full border border-primary bg-primary text-white font-label-md transition-all text-sm whitespace-nowrap">All</button>
                <button data-region="Khumbu" class="chip px-4 py-2 rounded-full border border-slate-300 hover:border-primary text-on-surface-variant font-label-md transition-all text-sm whitespace-nowrap bg-white">Khumbu / Everest</button>
                <button data-region="Annapurna" class="chip px-4 py-2 rounded-full border border-slate-300 hover:border-primary text-on-surface-variant font-label-md transition-all text-sm whitespace-nowrap bg-white">Annapurna / Mustang</button>
                <button data-region="Langtang" class="chip px-4 py-2 rounded-full border border-slate-300 hover:border-primary text-on-surface-variant font-label-md transition-all text-sm whitespace-nowrap bg-white">Langtang / Central</button>
                <button data-region="Terai" class="chip px-4 py-2 rounded-full border border-slate-300 hover:border-primary text-on-surface-variant font-label-md transition-all text-sm whitespace-nowrap bg-white">Terai / Wildlife</button>
                <button data-region="Eastern" class="chip px-4 py-2 rounded-full border border-slate-300 hover:border-primary text-on-surface-variant font-label-md transition-all text-sm whitespace-nowrap bg-white">Eastern & Western</button>
            </div>

            <!-- Sort option -->
            <div class="flex items-center gap-2 w-full lg:w-auto">
                <span class="text-label-sm text-slate-500 whitespace-nowrap">Sort By</span>
                <select id="catalog-sort" class="rounded-xl border border-slate-200 py-2.5 pl-3 pr-8 focus:ring-2 focus:ring-primary focus:border-primary bg-white text-sm font-label-md w-full lg:w-40">
                    <option value="name">Name</option>
                    <option value="elevation-desc">Highest Elevation</option>
                    <option value="elevation-asc">Lowest Elevation</option>
                    <option value="difficulty">Difficulty</option>
                </select>
            </div>
        </div>

        <!-- Catalog Grid -->
        <div id="catalog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md transition-all duration-500">
            <!-- Dynamic Cards Loaded by JS -->
        </div>

        <!-- Empty State -->
        <div id="catalog-empty" class="hidden text-center py-20">
            <span class="material-symbols-outlined text-5xl text-slate-300 mb-4">map</span>
            <h3 class="text-headline-md font-bold text-slate-600 mb-1">No Destinations Found</h3>
            <p class="text-body-md text-slate-400">Try adjusting your search query or filter chips.</p>
        </div>
    </div>
</section>

<!-- AI Planning Feature Section -->
<section class="py-xl bg-white relative overflow-hidden">
    <div class="max-w-container-max mx-auto px-md grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
        <div class="order-2 lg:order-1">
            <div class="inline-flex items-center gap-2 bg-primary-container/10 px-4 py-2 rounded-lg text-primary mb-6">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">smart_toy</span>
                <span class="text-label-md uppercase">Smart Logistics</span>
            </div>
            <h2 class="text-headline-lg font-headline-lg text-on-background mb-6">AI-Optimized Himalayan Itineraries</h2>
            <div class="space-y-lg">
                <div class="flex gap-md">
                    <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-surface-container flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">route</span>
                    </div>
                    <div>
                        <h4 class="text-headline-md font-headline-md mb-2">Terrain-Aware Planning</h4>
                        <p class="text-body-md text-on-surface-variant">Our AI analyzes altitude, weather patterns, and local trail conditions to suggest the safest routes.</p>
                    </div>
                </div>
                <div class="flex gap-md">
                    <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-surface-container flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">eco</span>
                    </div>
                    <div>
                        <h4 class="text-headline-md font-headline-md mb-2">Sustainable Travel</h4>
                        <p class="text-body-md text-on-surface-variant">Discover eco-conscious teahouses and support local communities through verified smart-partnerships.</p>
                    </div>
                </div>
            </div>
            <div class="mt-xl flex flex-wrap gap-4">
                <a href="/planner" class="px-8 py-4 bg-primary text-white rounded-xl font-bold ai-glow flex items-center gap-2 hover:bg-primary-container transition-colors">
                    Start AI Planning
                    <span class="material-symbols-outlined text-sm">bolt</span>
                </a>
                <a href="#catalog" class="px-8 py-4 border border-outline/20 rounded-xl font-bold hover:bg-surface transition-colors">See Case Studies</a>
            </div>
        </div>
        <div class="order-1 lg:order-2 relative h-[500px]">
            <div class="absolute inset-0 glass-dark rounded-[40px] rotate-3"></div>
            <div class="absolute inset-0 bg-surface shadow-2xl rounded-[40px] overflow-hidden border border-outline/10 p-md flex flex-col">
                <div class="flex justify-between items-center mb-md">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-error"></div>
                        <div class="w-3 h-3 rounded-full bg-secondary-container"></div>
                        <div class="w-3 h-3 rounded-full bg-tertiary"></div>
                    </div>
                    <span class="text-label-sm text-outline">Optimizing Route v4.2</span>
                </div>
                <!-- Mock App UI -->
                <div class="flex-1 space-y-md">
                    <div class="p-4 bg-primary-container/10 rounded-2xl border border-primary/10">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-label-md text-primary">Day 4: Namche Bazaar</span>
                            <span class="bg-white text-[10px] px-2 py-0.5 rounded-full font-bold border border-primary/20">3,440m</span>
                        </div>
                        <div class="h-2 bg-surface-container rounded-full overflow-hidden">
                            <div class="h-full bg-primary w-2/3"></div>
                        </div>
                    </div>
                    <!-- Live Dynamic Active Bookings Card -->
                    <div class="p-4 bg-primary-container/10 rounded-2xl border border-primary/15 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">groups</span>
                            <div>
                                <span class="text-label-sm text-primary font-bold block">Active Registrations</span>
                                <span class="text-xs text-on-surface-variant">Connected to Laravel Database</span>
                            </div>
                        </div>
                        <span class="text-headline-md font-black text-primary-container bg-white px-3 py-1 rounded-xl shadow-sm border border-primary/10">
                            {{ $stats['bookings'] }}
                        </span>
                    </div>
                    <div class="p-4 bg-surface-container-low rounded-2xl">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-primary">wb_sunny</span>
                            <span class="text-body-md font-bold">Weather Outlook</span>
                        </div>
                        <p class="text-label-sm text-on-surface-variant">Clear skies expected until 14:00. Optimal window for trekking to Tengboche.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-sm">
                        <div class="p-4 bg-tertiary-container/10 rounded-2xl border border-tertiary/10">
                            <span class="text-label-sm text-tertiary block mb-1">Heart Rate</span>
                            <span class="text-headline-md font-bold text-tertiary-container">78 BPM</span>
                        </div>
                        <div class="p-4 bg-secondary-container/10 rounded-2xl border border-secondary/10">
                            <span class="text-label-sm text-secondary block mb-1">Oxygen Sat.</span>
                            <span class="text-headline-md font-bold text-on-secondary-container">96%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-inverse-surface text-inverse-on-surface pt-xl pb-md">
    <div class="max-w-container-max mx-auto px-md">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-xl mb-xl">
            <div>
                <div class="flex items-center gap-xs mb-md">
                    <span class="material-symbols-outlined text-primary-fixed text-3xl">landscape</span>
                    <span class="text-headline-md font-headline-md font-bold tracking-tight text-white">HimalayaAI</span>
                </div>
                <p class="text-body-md text-surface-variant mb-md">Redefining exploration in the heart of the Himalayas through intelligent, sustainable logistics.</p>
                <div class="flex gap-4">
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="material-symbols-outlined text-sm">public</span></a>
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="material-symbols-outlined text-sm">camera</span></a>
                    <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="material-symbols-outlined text-sm">mail</span></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-md text-white">Destinations</h4>
                <ul class="space-y-3 text-surface-variant text-body-md">
                    <li><a class="hover:text-primary-fixed transition-colors" href="#destinations">Annapurna Region</a></li>
                    <li><a class="hover:text-primary-fixed transition-colors" href="#destinations">Everest Region</a></li>
                    <li><a class="hover:text-primary-fixed transition-colors" href="#destinations">Upper Mustang</a></li>
                    <li><a class="hover:text-primary-fixed transition-colors" href="#destinations">Kathmandu Valley</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-md text-white">Resources</h4>
                <ul class="space-y-3 text-surface-variant text-body-md">
                    <li><a class="hover:text-primary-fixed transition-colors" href="/bookings">Trekking Permits</a></li>
                    <li><a class="hover:text-primary-fixed transition-colors" href="#">Safety Protocols</a></li>
                    <li><a class="hover:text-primary-fixed transition-colors" href="#">Weather API</a></li>
                    <li><a class="hover:text-primary-fixed transition-colors" href="#">Travel Insurance</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-md text-white">Subscribe</h4>
                <p class="text-label-md text-surface-variant mb-4">Get the latest trekking updates and AI-curated travel tips.</p>
                <div class="flex gap-2">
                    <input class="bg-white/10 border-white/20 rounded-lg flex-1 text-sm focus:ring-primary text-white px-3" placeholder="Your email" type="email"/>
                    <button class="bg-primary px-4 py-2 rounded-lg text-white font-bold text-sm hover:bg-primary-container">Join</button>
                </div>
            </div>
        </div>
        <div class="pt-md border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-md text-surface-variant text-label-sm">
            <p>© 2026 HimalayaAI. All peaks reserved.</p>
            <div class="flex gap-lg">
                <a class="hover:text-white" href="#">Privacy Policy</a>
                <a class="hover:text-white" href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bottom Nav Bar (Mobile Only) -->
<div class="md:hidden fixed bottom-0 w-full z-50 bg-surface/80 dark:bg-inverse-surface/80 backdrop-blur-xl border-t border-white/30 rounded-t-xl shadow-[0_-4px_20px_rgba(0,93,144,0.05)]">
    <div class="flex justify-around items-center px-sm pb-sm pt-xs">
        <a href="/" class="flex flex-col items-center justify-center bg-primary-container dark:bg-on-primary-fixed-variant text-on-primary-container dark:text-primary-fixed rounded-full px-5 py-1.5 transition-all">
            <span class="material-symbols-outlined">explore</span>
            <span class="text-label-sm font-label-sm">Explore</span>
        </a>
        <a href="/planner" class="flex flex-col items-center justify-center text-on-surface-variant dark:text-outline-variant px-5 py-1.5 hover:text-primary transition-all">
            <span class="material-symbols-outlined">map</span>
            <span class="text-label-sm font-label-sm">Plan</span>
        </a>
        <a href="/bookings" class="flex flex-col items-center justify-center text-on-surface-variant dark:text-outline-variant px-5 py-1.5 hover:text-primary transition-all">
            <span class="material-symbols-outlined">payments</span>
            <span class="text-label-sm font-label-sm">Bookings</span>
        </a>
        <a href="/dashboard" class="flex flex-col items-center justify-center text-on-surface-variant dark:text-outline-variant px-5 py-1.5 hover:text-primary transition-all">
            <span class="material-symbols-outlined">person</span>
            <span class="text-label-sm font-label-sm">Account</span>
        </a>
    </div>
</div>

<script>
    // Destinations Database (32 locations)
    const destinations = [
        { name: "Kathmandu Valley", region: "Langtang", elevation: 1400, difficulty: "Easy", desc: "Temple circuits, historic durbars, and cultural Newari heritage.", icon: "temple_hindu", label: "Cultural Hub" },
        { name: "Pokhara Lakeside", region: "Annapurna", elevation: 820, difficulty: "Easy", desc: "Phewa lake cruises, spectacular Annapurna reflection, and cafes.", icon: "waves", label: "Lakeside Paradise" },
        { name: "Everest Base Camp", region: "Khumbu", elevation: 5364, difficulty: "Strenuous", desc: "The legendary base camp route below Mt. Everest peaks.", icon: "hiking", label: "Bucket List" },
        { name: "Upper Mustang", region: "Annapurna", elevation: 3840, difficulty: "Moderate", desc: "Arid red cliffs, mystical cave monasteries, and sky-high canyons.", icon: "landscape", label: "Forbidden Kingdom" },
        { name: "Chitwan National Park", region: "Terai", elevation: 150, difficulty: "Easy", desc: "Wild rhino safaris, canoe trips, and deep sub-tropical jungles.", icon: "pets", label: "Jungle Safari" },
        { name: "Lumbini Sacred Garden", region: "Terai", elevation: 150, difficulty: "Easy", desc: "Universal birthplace of Gautama Buddha and tranquil monasteries.", icon: "self_improvement", label: "Birthplace of Peace" },
        { name: "Rara Lake", region: "Eastern", elevation: 2990, difficulty: "Moderate", desc: "The deep blue queen of lakes surrounded by pine forests.", icon: "water", label: "Untouched Wilderness" },
        { name: "Shey Phoksundo Lake", region: "Eastern", elevation: 3611, difficulty: "Strenuous", desc: "Turquoise blue alpine lake, home to ancient Bon monasteries.", icon: "water", label: "Deep Dolpo" },
        { name: "Gosaikunda Lake", region: "Langtang", elevation: 4380, difficulty: "Moderate", desc: "Sacred high-altitude alpine lake dedicated to Lord Shiva.", icon: "water", label: "Sacred Waters" },
        { name: "Bardiya National Park", region: "Terai", elevation: 150, difficulty: "Easy", desc: "Jungle walks, wild elephant habitats, and Bengal tiger tours.", icon: "pets", label: "Royal Tigers" },
        { name: "Illam Tea Gardens", region: "Eastern", elevation: 1208, difficulty: "Easy", desc: "Lush green rolling tea fields and sunrise views over Kanchenjunga.", icon: "eco", label: "Tea Paradise" },
        { name: "Poon Hill", region: "Annapurna", elevation: 3210, difficulty: "Easy", desc: "Famed sunrise spot over the Dhaulagiri and Annapurna ranges.", icon: "filter_hdr", label: "Sunrise Trek" },
        { name: "Kalinchowk Shrine", region: "Langtang", elevation: 3842, difficulty: "Easy", desc: "Hill station shrine with spectacular winter snow and cable cars.", icon: "cabin", label: "Snow Retreat" },
        { name: "Janakpur Dham", region: "Terai", elevation: 74, difficulty: "Easy", desc: "Ancient Mithila kingdom birthplace of Goddess Sita.", icon: "temple_hindu", label: "Mithila Culture" },
        { name: "Bandipur Newar Town", region: "Annapurna", elevation: 1030, difficulty: "Easy", desc: "Preserved 18th-century Newari architecture and hilltop views.", icon: "home", label: "Living Museum" },
        { name: "Nagarkot Sunrise View", region: "Langtang", elevation: 2175, difficulty: "Easy", desc: "Panoramic view of 8 Himalayan ranges directly from your room.", icon: "wb_sunny", label: "Himalayan View" },
        { name: "Muktinath Temple", region: "Annapurna", elevation: 3710, difficulty: "Easy", desc: "Sacred pilgrimage temple containing 108 eternal water spouts.", icon: "self_improvement", label: "Spiritual Healing" },
        { name: "Tansen Ancient Town", region: "Eastern", elevation: 1350, difficulty: "Easy", desc: "Palpa district center famous for Dhaka weaves and heritage walks.", icon: "home", label: "Weaving Heritage" },
        { name: "Chandragiri Hills", region: "Langtang", elevation: 2551, difficulty: "Easy", desc: "Ride the cable car to see Bhaleshwor Mahadev and Everest peaks.", icon: "local_shipping", label: "Cable Car View" },
        { name: "Swargadwari Temple", region: "Eastern", elevation: 2121, difficulty: "Easy", desc: "Sacred hilltop temple hosting fire rituals since ancient times.", icon: "self_improvement", label: "Sacred Altars" },
        { name: "Khaptad National Park", region: "Eastern", elevation: 3000, difficulty: "Moderate", desc: "Lush green meadows and retreat of the famous Khaptad Swami.", icon: "forest", label: "Meadows of Peace" },
        { name: "Pathibhara Devi Temple", region: "Eastern", elevation: 3794, difficulty: "Moderate", desc: "Powerful hilltop Goddess temple in the eastern Himalayas.", icon: "self_improvement", label: "Divine Wishes" },
        { name: "Kanchenjunga Base Camp", region: "Eastern", elevation: 5143, difficulty: "Strenuous", desc: "Venture to the remote base camp of the world's 3rd highest peak.", icon: "hiking", label: "Extreme Trek" },
        { name: "Makalu Base Camp", region: "Eastern", elevation: 4870, difficulty: "Strenuous", desc: "Remote granite valleys, waterfalls, and steep glacial treks.", icon: "hiking", label: "Glacial Trails" },
        { name: "Manaslu Circuit", region: "Annapurna", elevation: 5106, difficulty: "Strenuous", desc: "Wild pristine trekking around the formidable Mt. Manaslu.", icon: "hiking", label: "Pristine Pass" },
        { name: "Tengboche Monastery", region: "Khumbu", elevation: 3867, difficulty: "Moderate", desc: "The grandest Sherpa Buddhist monastery under Ama Dablam.", icon: "temple_buddhist", label: "High Monasteries" },
        { name: "Namche Bazaar", region: "Khumbu", elevation: 3440, difficulty: "Moderate", desc: "Sherpa capital filled with bakeries, Irish pubs, and gear shops.", icon: "store", label: "Sherpa Capital" },
        { name: "Manang Valley", region: "Annapurna", elevation: 3519, difficulty: "Moderate", desc: "Unique Tibetan-style dry stone houses and high lakes.", icon: "landscape", label: "Acclimatize Zone" },
        { name: "Kagbeni Oasis", region: "Annapurna", elevation: 2800, difficulty: "Easy", desc: "Ancient mud-brick gateway fortress along the Kali Gandaki.", icon: "grain", label: "Mustang Gateway" },
        { name: "Dhulikhel Hill Station", region: "Langtang", elevation: 1550, difficulty: "Easy", desc: "Old brick houses, Newar feasts, and clear mountain vistas.", icon: "wb_sunny", label: "Valley Rim" },
        { name: "Gorkha Durbar Palace", region: "Langtang", elevation: 1060, difficulty: "Easy", desc: "Historical palace perched high on a ridge, birthplace of Nepal.", icon: "castle", label: "Royal Roots" },
        { name: "Langtang Valley", region: "Langtang", elevation: 3430, difficulty: "Moderate", desc: "Glacial rivers, yak pastures, and dramatic snow-peaks.", icon: "hiking", label: "Valley of Glaciers" }
    ];

    // Scroll helpers
    function scrollToCatalog(region = '') {
        const catalogEl = document.getElementById('catalog');
        if (catalogEl) {
            catalogEl.scrollIntoView({ behavior: 'smooth' });
        }
        if (region) {
            const chip = document.querySelector(`[data-region="${region}"]`);
            if (chip) {
                chip.click();
            }
        }
    }

    // Grid Renderer
    function renderCatalog(filterRegion = 'All', searchQuery = '', sortBy = 'name') {
        const grid = document.getElementById('catalog-grid');
        const emptyState = document.getElementById('catalog-empty');

        // Filter
        let filtered = destinations.filter(dest => {
            const matchesRegion = (filterRegion === 'All' || dest.region === filterRegion);
            const text = `${dest.name} ${dest.region} ${dest.desc} ${dest.difficulty}`.toLowerCase();
            const matchesSearch = text.includes(searchQuery.toLowerCase());
            return matchesRegion && matchesSearch;
        });

        // Sort
        filtered.sort((a, b) => {
            if (sortBy === 'name') {
                return a.name.localeCompare(b.name);
            } else if (sortBy === 'elevation-desc') {
                return b.elevation - a.elevation;
            } else if (sortBy === 'elevation-asc') {
                return a.elevation - b.elevation;
            } else if (sortBy === 'difficulty') {
                const diffWeight = { "Easy": 1, "Moderate": 2, "Strenuous": 3 };
                return (diffWeight[a.difficulty] || 0) - (diffWeight[b.difficulty] || 0);
            }
            return 0;
        });

        // Clear Grid
        grid.innerHTML = '';

        if (filtered.length === 0) {
            emptyState.classList.remove('hidden');
            return;
        } else {
            emptyState.classList.add('hidden');
        }

        // Render Cards
        filtered.forEach(dest => {
            const difficultyColor = dest.difficulty === 'Easy' ? 'text-tertiary bg-tertiary-container/10 border-tertiary/10' :
                                   dest.difficulty === 'Moderate' ? 'text-secondary bg-secondary-container/10 border-secondary/10' :
                                   'text-error bg-error-container/10 border-error/15';

            const card = document.createElement('div');
            card.className = "glass-panel p-5 rounded-3xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-white/20 flex flex-col justify-between h-full group";
            card.innerHTML = `
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-2xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-xl">${dest.icon}</span>
                        </div>
                        <span class="bg-primary-container text-on-primary-container text-[10px] px-2.5 py-0.5 rounded-full font-bold uppercase tracking-wider">${dest.label}</span>
                    </div>
                    <h3 class="text-headline-md font-bold text-on-background mb-1 group-hover:text-primary transition-colors">${dest.name}</h3>
                    <p class="text-label-sm text-outline uppercase tracking-wider mb-2">${dest.region} • ${dest.elevation.toLocaleString()}m</p>
                    <p class="text-body-md text-on-surface-variant line-clamp-3 mb-4">${dest.desc}</p>
                </div>
                <div class="flex justify-between items-center mt-auto pt-3 border-t border-slate-100">
                    <span class="text-xs font-bold border px-3 py-1 rounded-full ${difficultyColor}">${dest.difficulty}</span>
                    <a href="/planner" class="text-xs text-primary font-bold hover:underline flex items-center gap-1">
                        Plan
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </a>
                </div>
            `;
            grid.appendChild(card);
        });
    }

    // Event Listeners
    document.addEventListener('DOMContentLoaded', () => {
        // Initial load
        renderCatalog();

        // Search Input
        const searchInput = document.getElementById('catalog-search');
        searchInput.addEventListener('input', (e) => {
            const region = document.querySelector('#filter-chips button.active').getAttribute('data-region');
            const sort = document.getElementById('catalog-sort').value;
            renderCatalog(region, e.target.value, sort);
        });

        // Hero Search integration
        const heroSearch = document.getElementById('hero-search-input');
        heroSearch.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const query = e.target.value;
                searchInput.value = query;
                scrollToCatalog();
                renderCatalog('All', query, document.getElementById('catalog-sort').value);
            }
        });

        // Filter Chips
        const chips = document.querySelectorAll('#filter-chips button');
        chips.forEach(chip => {
            chip.addEventListener('click', (e) => {
                chips.forEach(c => {
                    c.classList.remove('active', 'bg-primary', 'text-white');
                    c.classList.add('bg-white', 'text-on-surface-variant', 'border-slate-300');
                });
                chip.classList.add('active', 'bg-primary', 'text-white');
                chip.classList.remove('bg-white', 'text-on-surface-variant', 'border-slate-300');

                const region = chip.getAttribute('data-region');
                const query = searchInput.value;
                const sort = document.getElementById('catalog-sort').value;
                renderCatalog(region, query, sort);
            });
        });

        // Sort Select
        const sortSelect = document.getElementById('catalog-sort');
        sortSelect.addEventListener('change', (e) => {
            const region = document.querySelector('#filter-chips button.active').getAttribute('data-region');
            const query = searchInput.value;
            renderCatalog(region, query, e.target.value);
        });
    });

    // Fade-in animation intersection observer
    const faders = document.querySelectorAll('.animate-fade-in');
    const appearOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('opacity-100');
            entry.target.classList.remove('opacity-0');
            appearOnScroll.unobserve(entry.target);
        });
    }, appearOptions);

    faders.forEach(fader => {
        fader.classList.add('transition-all', 'duration-1000', 'opacity-0');
        appearOnScroll.observe(fader);
    });
</script>
</body>
</html>
