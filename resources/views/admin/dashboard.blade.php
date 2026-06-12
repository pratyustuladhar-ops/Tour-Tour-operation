<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | HimalayaAI</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#005d90', 'primary-dark': '#003a5c',
                        surface: '#0f1117', 'surface-card': '#1a1d2e',
                        accent: '#0077b6', success: '#22c55e', warning: '#f59e0b', danger: '#ef4444',
                    },
                    fontFamily: { sans: ['Manrope', 'sans-serif'], display: ['Plus Jakarta Sans', 'sans-serif'] },
                }
            }
        };
    </script>
    <style>
        body { font-family: 'Manrope', sans-serif; background: #0f1117; color: #e2e8f0; }
        .sidebar { background: linear-gradient(180deg, #1a1d2e 0%, #0d1321 100%); border-right: 1px solid rgba(255,255,255,0.07); }
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 11px 16px; border-radius: 12px; font-size: 14px; font-weight: 500; color: rgba(255,255,255,0.55); transition: all 0.2s; cursor: pointer; }
        .nav-item:hover, .nav-item.active { background: rgba(0,93,144,0.25); color: #94ccff; }
        .nav-item.active { border-left: 3px solid #0077b6; }
        .stat-card { background: linear-gradient(135deg, #1a1d2e, #161927); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; padding: 24px; }
        .glass-table { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; overflow: hidden; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .badge { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; }
        .badge-green { background: rgba(34,197,94,0.15); color: #4ade80; }
        .badge-yellow { background: rgba(245,158,11,0.15); color: #fbbf24; }
        .badge-red { background: rgba(239,68,68,0.15); color: #f87171; }
        .badge-blue { background: rgba(0,119,182,0.20); color: #60a5fa; }
        .admin-btn { padding: 8px 18px; border-radius: 10px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; font-family: 'Manrope', sans-serif; }
        .admin-btn-primary { background: linear-gradient(135deg, #005d90, #0077b6); color: white; }
        .admin-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(0,93,144,0.4); }
        .admin-btn-danger { background: rgba(239,68,68,0.12); color: #f87171; border: 1px solid rgba(239,68,68,0.25); }
        .admin-btn-danger:hover { background: rgba(239,68,68,0.22); }
        ::-webkit-scrollbar { width: 5px; } ::-webkit-scrollbar-track { background: transparent; } ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 3px; }
    </style>
</head>
<body class="min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="sidebar w-64 min-h-screen flex flex-col fixed left-0 top-0 bottom-0 z-40 overflow-y-auto">
        {{-- Logo --}}
        <div class="p-6 border-b border-white/7">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-accent to-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-xl">landscape</span>
                </div>
                <div>
                    <div class="font-black text-white text-sm font-display">HimalayaAI</div>
                    <div class="text-xs" style="color: rgba(255,255,255,0.35);">Admin Console</div>
                </div>
            </div>
        </div>

        {{-- Admin info --}}
        <div class="mx-4 mt-5 p-3 rounded-2xl" style="background: rgba(0,93,144,0.15); border: 1px solid rgba(0,93,144,0.3);">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-accent to-primary flex items-center justify-center text-white font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs" style="color: rgba(148,204,255,0.7);">Super Admin</div>
                </div>
                <span class="badge badge-green text-[10px]">Live</span>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 p-4 space-y-1 mt-4">
            <p class="text-[10px] font-bold uppercase tracking-widest mb-3" style="color: rgba(255,255,255,0.25);">Dashboard</p>
            <a href="/admin" class="nav-item active">
                <span class="material-symbols-outlined text-lg">dashboard</span> Overview
            </a>
            <a href="/admin/bookings" class="nav-item">
                <span class="material-symbols-outlined text-lg">confirmation_number</span> Bookings
                <span class="ml-auto badge badge-blue">{{ $stats['bookings'] }}</span>
            </a>
            <a href="/admin/users" class="nav-item">
                <span class="material-symbols-outlined text-lg">group</span> Users
                <span class="ml-auto badge badge-green">{{ $stats['users'] }}</span>
            </a>

            <p class="text-[10px] font-bold uppercase tracking-widest mt-6 mb-3" style="color: rgba(255,255,255,0.25);">Content</p>
            <a href="#" class="nav-item">
                <span class="material-symbols-outlined text-lg">landscape</span> Destinations
            </a>
            <a href="#" class="nav-item">
                <span class="material-symbols-outlined text-lg">psychology</span> AI Settings
            </a>

            <p class="text-[10px] font-bold uppercase tracking-widest mt-6 mb-3" style="color: rgba(255,255,255,0.25);">System</p>
            <a href="#" class="nav-item">
                <span class="material-symbols-outlined text-lg">settings</span> Settings
            </a>
            <form action="/auth/logout" method="POST">
                @csrf
                <button type="submit" class="nav-item w-full text-left" style="color: rgba(248,113,113,0.8);">
                    <span class="material-symbols-outlined text-lg">logout</span> Sign Out
                </button>
            </form>
        </nav>

        <div class="p-4">
            <a href="/" target="_blank" class="nav-item text-xs">
                <span class="material-symbols-outlined text-base">open_in_new</span> View Customer Site
            </a>
        </div>
    </aside>

    {{-- Main content --}}
    <main class="ml-64 flex-1 min-h-screen p-8">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-black text-white font-display">Admin Overview</h1>
                <p style="color: rgba(255,255,255,0.45);" class="text-sm mt-1">{{ now()->format('l, F j, Y') }}</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="px-4 py-2 rounded-xl text-sm font-medium" style="background: rgba(34,197,94,0.12); color: #4ade80; border: 1px solid rgba(34,197,94,0.2);">
                    <span class="inline-block w-2 h-2 rounded-full bg-green-400 mr-2 animate-pulse"></span>
                    System Online
                </div>
                <a href="/admin/bookings" class="admin-btn admin-btn-primary">
                    + New Booking
                </a>
            </div>
        </div>

        {{-- Stats grid --}}
        <div class="grid grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
            @foreach([
                ['label' => 'Total Bookings', 'value' => $stats['bookings'], 'icon' => 'confirmation_number', 'color' => '#0077b6', 'bg' => 'rgba(0,119,182,0.15)', 'change' => '+12%'],
                ['label' => 'Registered Users', 'value' => $stats['users'], 'icon' => 'group', 'color' => '#22c55e', 'bg' => 'rgba(34,197,94,0.15)', 'change' => '+8%'],
                ['label' => 'Revenue (Est.)', 'value' => '$24,800', 'icon' => 'payments', 'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,0.15)', 'change' => '+15%'],
                ['label' => 'Active Today', 'value' => $stats['today_departures'], 'icon' => 'flight_takeoff', 'color' => '#a855f7', 'bg' => 'rgba(168,85,247,0.15)', 'change' => 'departures'],
            ] as $stat)
            <div class="stat-card">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-11 h-11 rounded-2xl flex items-center justify-center" style="background: {{ $stat['bg'] }}">
                        <span class="material-symbols-outlined" style="color: {{ $stat['color'] }}; font-size: 22px;">{{ $stat['icon'] }}</span>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg" style="background: rgba(34,197,94,0.12); color: #4ade80;">{{ $stat['change'] }}</span>
                </div>
                <div class="text-3xl font-black text-white font-display">{{ $stat['value'] }}</div>
                <div class="text-sm mt-1" style="color: rgba(255,255,255,0.4);">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>

        {{-- Recent bookings + user list --}}
        <div class="grid xl:grid-cols-[1.4fr_1fr] gap-6 mb-6">

            {{-- Recent bookings table --}}
            <div class="glass-table">
                <div class="flex items-center justify-between p-6 border-b" style="border-color: rgba(255,255,255,0.06);">
                    <div>
                        <h2 class="font-bold text-white font-display">Recent Bookings</h2>
                        <p class="text-xs mt-0.5" style="color: rgba(255,255,255,0.35);">All confirmed reservations</p>
                    </div>
                    <a href="/admin/bookings" class="admin-btn admin-btn-primary text-xs">View All</a>
                </div>
                <div class="overflow-x-auto">
                    @if($bookings->count())
                    <table class="w-full">
                        <thead>
                            <tr style="background: rgba(255,255,255,0.03);">
                                <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Guest</th>
                                <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Tour</th>
                                <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Date</th>
                                <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y" style="border-color: rgba(255,255,255,0.04);">
                            @foreach($bookings as $booking)
                            <tr class="hover:bg-white/3 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-accent/60 to-primary/60 flex items-center justify-center text-white font-bold text-xs">
                                            {{ strtoupper(substr($booking->guest_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="text-white text-sm font-semibold">{{ $booking->guest_name }}</div>
                                            <div class="text-xs" style="color: rgba(255,255,255,0.35);">{{ $booking->guest_email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-white/70">{{ Str::limit($booking->tour_name, 22) }}</td>
                                <td class="p-4 text-sm text-white/70">{{ \Carbon\Carbon::parse($booking->travel_date)->format('M d, Y') }}</td>
                                <td class="p-4"><span class="badge badge-green">Confirmed</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="py-16 text-center">
                        <span class="material-symbols-outlined text-5xl" style="color: rgba(255,255,255,0.15);">inbox</span>
                        <p class="text-sm mt-3" style="color: rgba(255,255,255,0.35);">No bookings yet</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Recent users --}}
            <div class="glass-table">
                <div class="flex items-center justify-between p-6 border-b" style="border-color: rgba(255,255,255,0.06);">
                    <div>
                        <h2 class="font-bold text-white font-display">Registered Users</h2>
                        <p class="text-xs mt-0.5" style="color: rgba(255,255,255,0.35);">Latest signups</p>
                    </div>
                    <a href="/admin/users" class="admin-btn admin-btn-primary text-xs">Manage</a>
                </div>
                <div class="divide-y" style="border-color: rgba(255,255,255,0.04);">
                    @forelse($users as $user)
                    <div class="flex items-center gap-3 p-4 hover:bg-white/3 transition-colors">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-bold text-sm flex-shrink-0"
                             style="background: linear-gradient(135deg, #005d90, #266449);">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-white text-sm font-semibold truncate">{{ $user->name }}</div>
                            <div class="text-xs truncate" style="color: rgba(255,255,255,0.35);">{{ $user->email }}</div>
                        </div>
                        @if($user->is_admin)
                            <span class="badge badge-yellow">Admin</span>
                        @else
                            <span class="badge badge-blue">User</span>
                        @endif
                    </div>
                    @empty
                    <div class="py-12 text-center">
                        <span class="material-symbols-outlined text-4xl" style="color: rgba(255,255,255,0.15);">group</span>
                        <p class="text-sm mt-2" style="color: rgba(255,255,255,0.35);">No users registered</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Quick actions --}}
        <div class="glass-table p-6">
            <h2 class="font-bold text-white font-display mb-5">Quick Actions</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach([
                    ['icon' => 'add_circle', 'label' => 'Add Destination', 'color' => '#0077b6', 'bg' => 'rgba(0,119,182,0.12)'],
                    ['icon' => 'psychology', 'label' => 'Test AI Planner', 'color' => '#a855f7', 'bg' => 'rgba(168,85,247,0.12)'],
                    ['icon' => 'bar_chart', 'label' => 'View Reports', 'color' => '#22c55e', 'bg' => 'rgba(34,197,94,0.12)'],
                    ['icon' => 'notifications', 'label' => 'Send Alert', 'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,0.12)'],
                ] as $action)
                <button class="flex flex-col items-center gap-3 p-5 rounded-2xl transition-all hover:scale-105 cursor-pointer text-center"
                        style="background: {{ $action['bg'] }}; border: 1px solid rgba(255,255,255,0.06);">
                    <span class="material-symbols-outlined text-3xl" style="color: {{ $action['color'] }}">{{ $action['icon'] }}</span>
                    <span class="text-xs font-semibold text-white/70">{{ $action['label'] }}</span>
                </button>
                @endforeach
            </div>
        </div>

    </main>

</body>
</html>
