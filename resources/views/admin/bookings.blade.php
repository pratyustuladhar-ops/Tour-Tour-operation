<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Bookings | HimalayaAI</title>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Manrope', sans-serif; background: #0f1117; color: #e2e8f0; }
        .sidebar { background: linear-gradient(180deg, #1a1d2e 0%, #0d1321 100%); border-right: 1px solid rgba(255,255,255,0.07); }
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 11px 16px; border-radius: 12px; font-size: 14px; font-weight: 500; color: rgba(255,255,255,0.55); transition: all 0.2s; }
        .nav-item:hover, .nav-item.active { background: rgba(0,93,144,0.25); color: #94ccff; }
        .nav-item.active { border-left: 3px solid #0077b6; }
        .glass-table { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; overflow: hidden; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .badge { display: inline-flex; align-items: center; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; }
        .badge-green { background: rgba(34,197,94,0.15); color: #4ade80; }
        .badge-blue { background: rgba(0,119,182,0.20); color: #60a5fa; }
        .admin-btn-primary { padding: 8px 18px; border-radius: 10px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; background: linear-gradient(135deg, #005d90, #0077b6); color: white; font-family: 'Manrope', sans-serif; transition: all 0.2s; }
        .admin-btn-primary:hover { transform: translateY(-1px); }
        input[type="text"], input[type="search"] { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; color: white; padding: 10px 16px; font-size: 14px; font-family: 'Manrope', sans-serif; outline: none; }
        input[type="text"]:focus, input[type="search"]:focus { border-color: #0077b6; }
    </style>
</head>
<body class="min-h-screen flex">

    <aside class="sidebar w-64 min-h-screen flex flex-col fixed left-0 top-0 bottom-0 z-40 overflow-y-auto">
        <div class="p-6 border-b border-white/7">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-xl">landscape</span>
                </div>
                <div>
                    <div class="font-black text-white text-sm font-display" style="font-family:'Plus Jakarta Sans',sans-serif;">HimalayaAI</div>
                    <div class="text-xs" style="color: rgba(255,255,255,0.35);">Admin Console</div>
                </div>
            </div>
        </div>
        <nav class="flex-1 p-4 space-y-1 mt-4">
            <a href="/admin" class="nav-item"><span class="material-symbols-outlined text-lg">dashboard</span> Overview</a>
            <a href="/admin/bookings" class="nav-item active"><span class="material-symbols-outlined text-lg">confirmation_number</span> Bookings</a>
            <a href="/admin/users" class="nav-item"><span class="material-symbols-outlined text-lg">group</span> Users</a>
            <div class="pt-4">
                <form action="/auth/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-item w-full text-left" style="color: rgba(248,113,113,0.8);">
                        <span class="material-symbols-outlined text-lg">logout</span> Sign Out
                    </button>
                </form>
            </div>
        </nav>
        <div class="p-4"><a href="/" target="_blank" class="nav-item text-xs"><span class="material-symbols-outlined text-base">open_in_new</span> View Site</a></div>
    </aside>

    <main class="ml-64 flex-1 min-h-screen p-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-black text-white" style="font-family:'Plus Jakarta Sans',sans-serif;">Bookings Management</h1>
                <p style="color: rgba(255,255,255,0.4);" class="text-sm mt-1">{{ $bookings->total() }} total reservations</p>
            </div>
        </div>

        <div class="glass-table">
            <div class="p-6 border-b flex items-center gap-4" style="border-color: rgba(255,255,255,0.06);">
                <div class="relative flex-1 max-w-xs">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-white/30 text-lg">search</span>
                    <input type="search" placeholder="Search bookings…" class="pl-10 w-full">
                </div>
            </div>

            <div class="overflow-x-auto">
                @if($bookings->count())
                <table class="w-full">
                    <thead>
                        <tr style="background: rgba(255,255,255,0.03);">
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">#</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Guest</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Tour</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Guests</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Travel Date</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Status</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Booked At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" style="border-color: rgba(255,255,255,0.04);">
                        @foreach($bookings as $booking)
                        <tr class="hover:bg-white/3 transition-colors">
                            <td class="p-4 text-white/40 text-sm">#{{ $booking->id }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-600/60 to-teal-600/60 flex items-center justify-center text-white font-bold text-xs">
                                        {{ strtoupper(substr($booking->guest_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-white text-sm font-semibold">{{ $booking->guest_name }}</div>
                                        <div class="text-xs" style="color: rgba(255,255,255,0.35);">{{ $booking->guest_email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-white/80 text-sm font-medium">{{ $booking->tour_name }}</td>
                            <td class="p-4 text-white/70 text-sm">{{ $booking->guests }} pax</td>
                            <td class="p-4 text-white/70 text-sm">{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</td>
                            <td class="p-4"><span class="badge badge-green">Confirmed</span></td>
                            <td class="p-4 text-white/40 text-xs">{{ $booking->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-5 border-t" style="border-color: rgba(255,255,255,0.06);">
                    {{ $bookings->links() }}
                </div>
                @else
                <div class="py-20 text-center">
                    <span class="material-symbols-outlined text-6xl" style="color: rgba(255,255,255,0.1);">inbox</span>
                    <p class="text-sm mt-4" style="color: rgba(255,255,255,0.3);">No bookings found</p>
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
