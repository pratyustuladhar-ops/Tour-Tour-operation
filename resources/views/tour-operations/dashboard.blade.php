<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HimalayaAI | My Dashboard</title>
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
            <a class="font-semibold text-primary" href="/dashboard">Dashboard</a>
        </div>
        <a href="/bookings" class="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-primary/20">Manage Bookings</a>
    </nav>
</header>

<main class="mx-auto flex w-full max-w-7xl flex-col gap-8 px-4 py-8 md:px-8 md:py-12">
    <section class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <article class="glass rounded-[32px] p-6 shadow-xl shadow-primary/10">
            <p class="text-sm uppercase tracking-[0.35em] text-primary">Welcome back</p>
            <h1 class="mt-3 text-3xl font-black text-onSurface md:text-4xl">Namaste, Alex</h1>
            <p class="mt-3 max-w-xl text-muted">Your Himalayan dashboard is now connected to the Laravel app and displays the same design-forward experience from the reference prompt.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl bg-white/80 p-4 border border-slate-200"><p class="text-xs uppercase tracking-[0.35em] text-primary">Status</p><p class="mt-2 text-2xl font-black text-onSurface">Everest Level</p></div>
                <div class="rounded-3xl bg-white/80 p-4 border border-slate-200"><p class="text-xs uppercase tracking-[0.35em] text-primary">Trips</p><p class="mt-2 text-2xl font-black text-onSurface">12</p></div>
                <div class="rounded-3xl bg-white/80 p-4 border border-slate-200"><p class="text-xs uppercase tracking-[0.35em] text-primary">Elevation</p><p class="mt-2 text-2xl font-black text-onSurface">24k m</p></div>
            </div>
        </article>

        <article class="glass rounded-[32px] p-6 shadow-xl shadow-primary/10">
            <p class="text-sm uppercase tracking-[0.35em] text-primary">AI insight</p>
            <h2 class="mt-3 text-2xl font-black text-onSurface">Optimization is active</h2>
            <p class="mt-3 text-muted">The route engine recommends extra acclimatization time in Manang before crossing the pass for better energy and altitude comfort.</p>
            <div class="mt-6 rounded-[24px] bg-primary/10 p-5 text-primary">Weather alert: stable conditions are expected this week, but prepare for cold mornings in the high passes.</div>
        </article>
    </section>

    <section class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <article class="glass rounded-[32px] p-6 shadow-xl shadow-primary/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.35em] text-primary">Upcoming bookings</p>
                    <h3 class="mt-3 text-2xl font-black text-onSurface">Annapurna Base Camp Expedition</h3>
                </div>
                <span class="rounded-full bg-primary/10 px-4 py-2 text-sm font-semibold text-primary">Confirmed</span>
            </div>
            <p class="mt-4 text-muted">14-day trek with guides, permits, and scenic logistics managed directly in the app.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                <div class="rounded-3xl bg-white/80 p-4 border border-slate-200"><p class="text-xs uppercase tracking-[0.35em] text-primary">Date</p><p class="mt-2 text-lg font-black text-onSurface">Oct 12 - 24</p></div>
                <div class="rounded-3xl bg-white/80 p-4 border border-slate-200"><p class="text-xs uppercase tracking-[0.35em] text-primary">Guests</p><p class="mt-2 text-lg font-black text-onSurface">2 Adults</p></div>
            </div>
        </article>

        <article class="glass rounded-[32px] p-6 shadow-xl shadow-primary/10">
            <p class="text-sm uppercase tracking-[0.35em] text-primary">Preparation</p>
            <h3 class="mt-3 text-2xl font-black text-onSurface">Progress overview</h3>
            <div class="mt-6 space-y-5">
                @foreach([
                    ['label' => 'Physical Training', 'value' => '85%', 'color' => 'bg-primary'],
                    ['label' => 'Gear Checklist', 'value' => '60%', 'color' => 'bg-[#266449]'],
                    ['label' => 'Documents', 'value' => '40%', 'color' => 'bg-[#9b4500]'],
                ] as $item)
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm font-semibold text-muted"><span>{{ $item['label'] }}</span><span>{{ $item['value'] }}</span></div>
                        <div class="h-2 rounded-full bg-slate-200"><div class="h-2 rounded-full {{ $item['color'] }}" style="width: {{ $item['value'] }}"></div></div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
</main>
</body>
</html>
