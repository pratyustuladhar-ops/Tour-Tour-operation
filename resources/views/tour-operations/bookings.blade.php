<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HimalayaAI | Bookings</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#005d90',
                        surface: '#f7f9fb',
                        onSurface: '#191c1e',
                        muted: '#404850',
                    },
                    fontFamily: {
                        sans: ['Manrope', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        };
    </script>
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .glass { background: rgba(255,255,255,0.78); border: 1px solid rgba(255,255,255,0.65); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="min-h-screen bg-surface text-onSurface">
<header class="sticky top-0 z-40 border-b border-white/40 bg-white/80 backdrop-blur-xl">
    <nav class="mx-auto flex h-16 w-full max-w-7xl items-center justify-between px-4 md:px-8">
        <a href="/" class="flex items-center gap-2 text-primary">
            <span class="material-symbols-outlined text-3xl">landscape</span>
            <span class="text-xl font-black tracking-tight">HimalayaAI</span>
        </a>
        <div class="hidden items-center gap-6 md:flex">
            <a class="text-muted hover:text-primary" href="/">Explore</a>
            <a class="text-muted hover:text-primary" href="/planner">Planner</a>
            <a class="text-muted hover:text-primary" href="/dashboard">Dashboard</a>
            <a class="font-semibold text-primary" href="/bookings">Bookings</a>
        </div>
        <a href="/bookings" class="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-primary/20">Book your Himalayan itinerary</a>
    </nav>
</header>

<main class="mx-auto flex w-full max-w-7xl flex-col gap-8 px-4 py-8 md:px-8 md:py-12">
    <section class="grid gap-8 lg:grid-cols-[1fr_0.9fr]">
        <article class="glass rounded-[32px] p-6 shadow-xl shadow-primary/10">
            <p class="text-sm uppercase tracking-[0.35em] text-primary">Booking experience</p>
            <h1 class="mt-3 text-3xl font-black text-onSurface md:text-4xl">Book your Himalayan itinerary</h1>
            <p class="mt-3 max-w-xl text-muted">Reserve an AI-planned route with guide, transport, and stay details managed directly in Laravel.</p>
            <div class="mt-6 rounded-[28px] bg-gradient-to-br from-primary to-[#0077b6] p-5 text-white shadow-2xl shadow-primary/20">
                <p class="text-sm uppercase tracking-[0.35em] text-[#cde5ff]">Why travelers choose us</p>
                <ul class="mt-4 space-y-3 text-sm text-white/90">
                    <li>• Guided route planning with weather-aware recommendations</li>
                    <li>• Seamless permit and logistics coordination</li>
                    <li>• Real-time booking confirmation through the app</li>
                </ul>
            </div>
        </article>

        <article class="glass rounded-[32px] p-6 shadow-xl shadow-primary/10">
            <p class="text-sm uppercase tracking-[0.35em] text-primary">Reservation form</p>
            <h2 class="mt-3 text-2xl font-black text-onSurface">Start your trip request</h2>
            <form action="/bookings" method="POST" class="mt-6 space-y-4">
                @csrf
                <label class="block text-sm font-semibold text-muted">Tour Name
                    <input name="tour_name" type="text" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-onSurface" placeholder="Annapurna Base Camp" required>
                </label>
                <label class="block text-sm font-semibold text-muted">Guest Name
                    <input name="guest_name" type="text" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-onSurface" placeholder="Alex Morgan" required>
                </label>
                <label class="block text-sm font-semibold text-muted">Email
                    <input name="guest_email" type="email" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-onSurface" placeholder="alex@example.com" required>
                </label>
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="block text-sm font-semibold text-muted">Guests
                        <input name="guests" type="number" min="1" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-onSurface" value="2" required>
                    </label>
                    <label class="block text-sm font-semibold text-muted">Travel Date
                        <input name="travel_date" type="date" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-onSurface" required>
                    </label>
                </div>
                <label class="block text-sm font-semibold text-muted">Notes
                    <textarea name="notes" rows="4" class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-onSurface" placeholder="Any special requests or preferences"></textarea>
                </label>
                <button type="submit" class="w-full rounded-2xl bg-primary px-5 py-4 text-sm font-semibold text-white shadow-xl shadow-primary/20">Confirm Booking</button>
            </form>
        </article>
    </section>
</main>
</body>
</html>
