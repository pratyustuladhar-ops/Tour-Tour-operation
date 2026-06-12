<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | HimalayaAI</title>
    <meta name="description" content="Create your HimalayaAI account and start planning AI-powered Nepal adventures.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#005d90',
                        'primary-dark': '#0077b6',
                        surface: '#f7f9fb',
                        onSurface: '#191c1e',
                        muted: '#404850',
                    },
                    fontFamily: {
                        sans: ['Manrope', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delay': 'float 6s ease-in-out 2s infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0px)' }, '50%': { transform: 'translateY(-18px)' } },
                    }
                }
            }
        };
    </script>
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .glass { background: rgba(255,255,255,0.80); border: 1px solid rgba(255,255,255,0.70); backdrop-filter: blur(24px); }
        .hero-bg {
            background: linear-gradient(135deg, #002114 0%, #266449 40%, #005d90 80%, #001d32 100%);
            position: relative; overflow: hidden;
        }
        .hero-bg::before {
            content: '';
            position: absolute; inset: 0;
            background: url('/images/mustang.png') center/cover no-repeat;
            opacity: 0.15;
        }
        .particle { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.10); }
        .input-field {
            width: 100%; padding: 13px 48px 13px 16px;
            border: 1.5px solid #e0e3e5; border-radius: 14px;
            background: rgba(255,255,255,0.9); font-family: 'Manrope', sans-serif;
            font-size: 15px; transition: all 0.25s; outline: none; color: #191c1e;
        }
        .input-field:focus { border-color: #005d90; box-shadow: 0 0 0 3px rgba(0,93,144,0.12); }
        .btn-primary {
            width: 100%; padding: 15px; background: linear-gradient(135deg, #005d90, #0077b6);
            color: white; font-weight: 700; font-size: 15px; border-radius: 14px;
            border: none; cursor: pointer; transition: all 0.25s; font-family: 'Plus Jakarta Sans', sans-serif;
            letter-spacing: 0.02em; box-shadow: 0 8px 24px rgba(0,93,144,0.30);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(0,93,144,0.40); }
        .btn-primary:active { transform: translateY(0); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .strength-bar { height: 4px; border-radius: 4px; transition: all 0.4s; }
    </style>
</head>
<body class="min-h-screen flex">

    {{-- Left decorative panel --}}
    <div class="hero-bg hidden lg:flex lg:w-[48%] flex-col justify-between p-12 relative">
        <div class="particle w-72 h-72 top-[-80px] right-[-50px] animate-float"></div>
        <div class="particle w-44 h-44 bottom-16 left-[-20px] animate-float-delay"></div>

        <div class="flex items-center gap-3 z-10">
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-2xl">landscape</span>
            </div>
            <span class="font-black text-xl text-white tracking-tight font-display">HimalayaAI</span>
        </div>

        <div class="z-10">
            <div class="inline-block bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 text-white/90 text-sm font-medium mb-6">
                🏔️ Join 5,000+ Himalayan adventurers
            </div>
            <h1 class="text-4xl xl:text-5xl font-black text-white leading-tight font-display mb-6">
                Begin your<br>
                <span class="text-transparent bg-clip-text" style="background: linear-gradient(90deg, #b1f0ce, #94ccff);">Nepal story.</span>
            </h1>
            <p class="text-white/70 text-lg leading-relaxed max-w-md">
                Create your free account and unlock AI-generated trekking routes, real-time weather insights, and seamless bookings.
            </p>

            <div class="mt-8 grid grid-cols-2 gap-4">
                @foreach([
                    ['icon' => 'psychology', 'title' => 'AI Planner', 'desc' => 'Personalized routes'],
                    ['icon' => 'local_activity', 'title' => '30+ Treks', 'desc' => 'Curated destinations'],
                    ['icon' => 'cloud', 'title' => 'Weather AI', 'desc' => 'Real-time alerts'],
                    ['icon' => 'support_agent', 'title' => '24/7 Support', 'desc' => 'Expert guides'],
                ] as $f)
                <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-2xl p-4">
                    <span class="material-symbols-outlined text-white/80 text-xl">{{ $f['icon'] }}</span>
                    <div class="mt-2 font-bold text-white text-sm">{{ $f['title'] }}</div>
                    <div class="text-white/55 text-xs">{{ $f['desc'] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center gap-2 z-10">
            <div class="flex -space-x-2">
                @foreach(['bg-blue-400','bg-green-400','bg-orange-400','bg-purple-400'] as $c)
                <div class="w-8 h-8 rounded-full {{ $c }} border-2 border-white flex items-center justify-center">
                    <span class="text-white text-xs font-bold">{{ chr(rand(65,90)) }}</span>
                </div>
                @endforeach
            </div>
            <span class="text-white/70 text-sm ml-1">Join our community today</span>
        </div>
    </div>

    {{-- Right form panel --}}
    <div class="flex-1 flex items-center justify-center px-6 py-10 bg-surface overflow-y-auto">
        <div class="w-full max-w-md">

            <div class="lg:hidden flex items-center gap-2 mb-8">
                <span class="material-symbols-outlined text-primary text-3xl">landscape</span>
                <span class="font-black text-xl text-primary font-display">HimalayaAI</span>
            </div>

            <div class="mb-8">
                <h2 class="text-3xl font-black text-onSurface font-display">Create your account</h2>
                <p class="text-muted mt-2">Free forever. No credit card required.</p>
            </div>

            @if ($errors->any())
                <div class="mb-5 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-sm">
                    <div class="flex items-center gap-2 font-semibold mb-1">
                        <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                        Please fix the following:
                    </div>
                    <ul class="ml-6 list-disc text-xs space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="register-form" action="/auth/register" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-muted mb-2" for="name">Full name</label>
                    <div class="relative">
                        <input id="name" name="name" type="text" required autocomplete="name"
                               value="{{ old('name') }}"
                               class="input-field @error('name') border-red-400 @enderror"
                               placeholder="Alex Morgan">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-muted text-lg">person</span>
                    </div>
                    @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-muted mb-2" for="email">Email address</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" required autocomplete="email"
                               value="{{ old('email') }}"
                               class="input-field @error('email') border-red-400 @enderror"
                               placeholder="you@example.com">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-muted text-lg">mail</span>
                    </div>
                    @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-muted mb-2" for="password">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               oninput="checkStrength(this.value)"
                               class="input-field @error('password') border-red-400 @enderror"
                               placeholder="Min. 8 characters">
                        <button type="button" onclick="togglePassword('password','eye1')" class="absolute right-4 top-1/2 -translate-y-1/2 text-muted">
                            <span id="eye1" class="material-symbols-outlined text-lg">visibility</span>
                        </button>
                    </div>
                    <div class="mt-2 flex gap-1">
                        <div id="s1" class="strength-bar flex-1 bg-slate-200"></div>
                        <div id="s2" class="strength-bar flex-1 bg-slate-200"></div>
                        <div id="s3" class="strength-bar flex-1 bg-slate-200"></div>
                        <div id="s4" class="strength-bar flex-1 bg-slate-200"></div>
                    </div>
                    <p id="strength-label" class="text-xs text-muted mt-1">Enter password to see strength</p>
                    @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-muted mb-2" for="password_confirmation">Confirm password</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="input-field" placeholder="Re-enter password">
                        <button type="button" onclick="togglePassword('password_confirmation','eye2')" class="absolute right-4 top-1/2 -translate-y-1/2 text-muted">
                            <span id="eye2" class="material-symbols-outlined text-lg">visibility</span>
                        </button>
                    </div>
                </div>

                <div class="flex items-start gap-3 pt-1">
                    <input id="terms" name="terms" type="checkbox" required class="w-4 h-4 accent-primary rounded mt-0.5 flex-shrink-0">
                    <label for="terms" class="text-sm text-muted">
                        I agree to the <a href="#" class="text-primary font-semibold hover:underline">Terms of Service</a>
                        and <a href="#" class="text-primary font-semibold hover:underline">Privacy Policy</a>
                    </label>
                </div>

                <button id="register-btn" type="submit" class="btn-primary mt-2">
                    Create Account — It's Free
                </button>
            </form>

            <div class="mt-6 flex items-center gap-4">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-muted font-medium">already a member?</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <p class="mt-6 text-center text-sm text-muted">
                Already have an account?
                <a href="/auth/login" class="text-primary font-bold hover:underline">Sign in here</a>
            </p>
        </div>
    </div>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    input.type = input.type === 'password' ? 'text' : 'password';
    icon.textContent = input.type === 'password' ? 'visibility' : 'visibility_off';
}

function checkStrength(val) {
    const bars = ['s1','s2','s3','s4'];
    const label = document.getElementById('strength-label');
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    const colors = ['#ef4444','#f97316','#eab308','#22c55e'];
    const labels = ['Weak','Fair','Good','Strong 🔒'];
    bars.forEach((id, i) => {
        document.getElementById(id).style.backgroundColor = i < score ? colors[score - 1] : '#e2e8f0';
    });
    label.textContent = val.length ? labels[Math.min(score,4) - 1] || '' : 'Enter password to see strength';
    label.style.color = val.length ? colors[score - 1] : '';
}

document.getElementById('register-form').addEventListener('submit', function() {
    const btn = document.getElementById('register-btn');
    btn.textContent = 'Creating account…';
    btn.disabled = true;
    btn.style.opacity = '0.7';
});
</script>
</body>
</html>
