<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | HimalayaAI</title>
    <meta name="description" content="Sign in to your HimalayaAI account to access AI-powered Nepal travel planning.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
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
                        'shimmer': 'shimmer 2.5s linear infinite',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0px)' }, '50%': { transform: 'translateY(-18px)' } },
                        shimmer: { '0%': { backgroundPosition: '-200% 0' }, '100%': { backgroundPosition: '200% 0' } },
                    }
                }
            }
        };
    </script>
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .glass { background: rgba(255,255,255,0.80); border: 1px solid rgba(255,255,255,0.70); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); }
        .hero-bg {
            background: linear-gradient(135deg, #001d32 0%, #003a5c 35%, #005d90 65%, #266449 100%);
            position: relative; overflow: hidden;
        }
        .hero-bg::before {
            content: '';
            position: absolute; inset: 0;
            background: url('/images/himalayas_sunrise.png') center/cover no-repeat;
            opacity: 0.18;
        }
        .particle {
            position: absolute; border-radius: 50%;
            background: rgba(255,255,255,0.12); animation: float 6s ease-in-out infinite;
        }
        .input-field {
            width: 100%; padding: 14px 48px 14px 16px;
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
    </style>
</head>
<body class="min-h-screen flex">

    {{-- Left decorative panel --}}
    <div class="hero-bg hidden lg:flex lg:w-[52%] flex-col justify-between p-12 relative">
        <!-- Floating particles -->
        <div class="particle w-64 h-64 top-[-60px] right-[-40px] animate-float"></div>
        <div class="particle w-40 h-40 bottom-20 left-[-30px] animate-float-delay"></div>
        <div class="particle w-24 h-24 top-1/2 right-12" style="animation: float 8s ease-in-out 1s infinite;"></div>

        <!-- Logo -->
        <div class="flex items-center gap-3 z-10">
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-2xl">landscape</span>
            </div>
            <span class="font-black text-xl text-white tracking-tight font-display">HimalayaAI</span>
        </div>

        <!-- Hero text -->
        <div class="z-10">
            <div class="inline-block bg-white/15 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 text-white/90 text-sm font-medium mb-6">
                ✨ AI-Powered Nepal Travel
            </div>
            <h1 class="text-4xl xl:text-5xl font-black text-white leading-tight font-display mb-6">
                Your Himalayan<br>
                <span class="text-transparent bg-clip-text" style="background: linear-gradient(90deg, #94ccff, #b1f0ce);">adventure awaits.</span>
            </h1>
            <p class="text-white/70 text-lg leading-relaxed max-w-md">
                Plan AI-optimized trekking routes, manage bookings, and explore 30+ breathtaking Nepal destinations.
            </p>
            <div class="mt-8 flex flex-col gap-4">
                @foreach([
                    ['icon' => 'route', 'text' => 'AI-powered itinerary generation'],
                    ['icon' => 'verified_user', 'text' => 'Secure Passport authentication'],
                    ['icon' => 'landscape', 'text' => '30+ curated Nepal destinations'],
                ] as $feature)
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-white/15 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-white text-lg">{{ $feature['icon'] }}</span>
                    </div>
                    <span class="text-white/80 text-sm font-medium">{{ $feature['text'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Bottom stats -->
        <div class="flex items-center gap-6 z-10">
            @foreach([['5k+', 'Happy travelers'], ['30+', 'Destinations'], ['4.9★', 'Rating']] as $stat)
            <div>
                <div class="text-2xl font-black text-white font-display">{{ $stat[0] }}</div>
                <div class="text-white/60 text-xs font-medium">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Right auth panel --}}
    <div class="flex-1 flex items-center justify-center px-6 py-12 bg-surface">
        <div class="w-full max-w-md">

            <!-- Mobile logo -->
            <div class="lg:hidden flex items-center gap-2 mb-8">
                <span class="material-symbols-outlined text-primary text-3xl">landscape</span>
                <span class="font-black text-xl text-primary tracking-tight font-display">HimalayaAI</span>
            </div>

            <div class="mb-8">
                <h2 class="text-3xl font-black text-onSurface font-display">Welcome back</h2>
                <p class="text-muted mt-2">Sign in to continue your Himalayan journey.</p>
            </div>

            {{-- Flash messages --}}
            @if (session('status'))
                <div class="mb-5 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-800 text-sm font-medium flex items-center gap-2">
                    <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-5 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-sm font-medium flex items-center gap-2">
                    <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                    {{ session('error') }}
                </div>
            @endif

            <form id="login-form" action="/auth/login" method="POST" class="space-y-5">
                @csrf

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
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-semibold text-muted" for="password">Password</label>
                        <a href="#" class="text-xs text-primary font-semibold hover:underline">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                               class="input-field @error('password') border-red-400 @enderror"
                               placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password','eye-icon')" class="absolute right-4 top-1/2 -translate-y-1/2 text-muted">
                            <span id="eye-icon" class="material-symbols-outlined text-lg">visibility</span>
                        </button>
                    </div>
                    @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3">
                    <input id="remember" name="remember" type="checkbox" class="w-4 h-4 accent-primary rounded">
                    <label for="remember" class="text-sm text-muted font-medium">Keep me signed in</label>
                </div>

                <button id="login-btn" type="submit" class="btn-primary">
                    Sign In to HimalayaAI
                </button>
            </form>

            <div class="mt-6 flex items-center gap-4">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-muted font-medium">or</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <p class="mt-6 text-center text-sm text-muted">
                Don't have an account?
                <a href="/auth/register" class="text-primary font-bold hover:underline">Create free account</a>
            </p>

            <p class="mt-4 text-center text-xs text-muted/60">
                By signing in, you agree to our
                <a href="#" class="underline">Terms of Service</a> and
                <a href="#" class="underline">Privacy Policy</a>.
            </p>
        </div>
    </div>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = 'visibility_off';
    } else {
        input.type = 'password';
        icon.textContent = 'visibility';
    }
}

document.getElementById('login-form').addEventListener('submit', function() {
    const btn = document.getElementById('login-btn');
    btn.textContent = 'Signing in…';
    btn.disabled = true;
    btn.style.opacity = '0.7';
});
</script>
</body>
</html>
