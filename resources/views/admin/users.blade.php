<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Users | HimalayaAI</title>
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
        .badge-yellow { background: rgba(245,158,11,0.15); color: #fbbf24; }
        .badge-blue { background: rgba(0,119,182,0.20); color: #60a5fa; }
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
                    <div class="font-black text-white text-sm" style="font-family:'Plus Jakarta Sans',sans-serif;">HimalayaAI</div>
                    <div class="text-xs" style="color: rgba(255,255,255,0.35);">Admin Console</div>
                </div>
            </div>
        </div>
        <nav class="flex-1 p-4 space-y-1 mt-4">
            <a href="/admin" class="nav-item"><span class="material-symbols-outlined text-lg">dashboard</span> Overview</a>
            <a href="/admin/bookings" class="nav-item"><span class="material-symbols-outlined text-lg">confirmation_number</span> Bookings</a>
            <a href="/admin/users" class="nav-item active"><span class="material-symbols-outlined text-lg">group</span> Users</a>
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
        <div class="mb-8">
            <h1 class="text-2xl font-black text-white" style="font-family:'Plus Jakarta Sans',sans-serif;">User Management</h1>
            <p style="color: rgba(255,255,255,0.4);" class="text-sm mt-1">{{ $users->total() }} registered accounts</p>
        </div>

        @if(session('status'))
        <div class="mb-5 p-4 rounded-2xl flex items-center gap-2 text-sm" style="background: rgba(34,197,94,0.12); border: 1px solid rgba(34,197,94,0.2); color: #4ade80;">
            <span class="material-symbols-outlined text-lg">check_circle</span> {{ session('status') }}
        </div>
        @endif

        <div class="glass-table">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr style="background: rgba(255,255,255,0.03);">
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">User</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Email</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Role</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Joined</th>
                            <th class="text-left p-4 text-xs font-semibold uppercase tracking-wider" style="color: rgba(255,255,255,0.35);">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" style="border-color: rgba(255,255,255,0.04);">
                        @foreach($users as $user)
                        <tr class="hover:bg-white/3 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white font-bold text-sm"
                                         style="background: linear-gradient(135deg, #005d90, #266449);">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-white text-sm font-semibold">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-sm" style="color: rgba(255,255,255,0.5);">{{ $user->email }}</td>
                            <td class="p-4">
                                @if($user->is_admin)
                                    <span class="badge badge-yellow">Admin</span>
                                @else
                                    <span class="badge badge-blue">Customer</span>
                                @endif
                            </td>
                            <td class="p-4 text-xs" style="color: rgba(255,255,255,0.35);">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    @if(!$user->is_admin)
                                    <form action="/admin/users/{{ $user->id }}/make-admin" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="text-xs px-3 py-1.5 rounded-lg font-semibold transition-colors"
                                                style="background: rgba(245,158,11,0.12); color: #fbbf24; border: 1px solid rgba(245,158,11,0.2);">
                                            Make Admin
                                        </button>
                                    </form>
                                    @else
                                    <form action="/admin/users/{{ $user->id }}/remove-admin" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="text-xs px-3 py-1.5 rounded-lg font-semibold transition-colors"
                                                style="background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.4); border: 1px solid rgba(255,255,255,0.1);">
                                            Remove Admin
                                        </button>
                                    </form>
                                    @endif
                                    @if(auth()->id() !== $user->id)
                                    <form action="/admin/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Delete this user?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs px-3 py-1.5 rounded-lg font-semibold transition-colors"
                                                style="background: rgba(239,68,68,0.10); color: #f87171; border: 1px solid rgba(239,68,68,0.2);">
                                            Delete
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-5 border-t" style="border-color: rgba(255,255,255,0.06);">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </main>
</body>
</html>
