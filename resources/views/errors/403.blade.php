<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 — Access Denied | HimalayaAI</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&family=Manrope:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Manrope', sans-serif; background: #0f1117; color: #e2e8f0; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
        .float { animation: float 4s ease-in-out infinite; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-8">
    <div class="text-center max-w-lg">
        <div class="float inline-block mb-8">
            <div class="w-24 h-24 rounded-3xl flex items-center justify-center mx-auto" style="background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.25);">
                <span class="material-symbols-outlined text-5xl" style="color: #f87171;">lock</span>
            </div>
        </div>
        <div class="text-sm font-bold uppercase tracking-widest mb-3" style="color: rgba(248,113,113,0.7);">403 — Forbidden</div>
        <h1 class="text-4xl font-black text-white mb-4" style="font-family:'Plus Jakarta Sans',sans-serif;">Access Denied</h1>
        <p style="color: rgba(255,255,255,0.45);" class="text-lg mb-8 leading-relaxed">
            You don't have permission to view this page.<br>
            This area is restricted to administrators only.
        </p>
        <div class="flex items-center justify-center gap-4">
            <a href="/"
               class="px-6 py-3 rounded-2xl font-bold text-sm transition-all hover:-translate-y-1"
               style="background: linear-gradient(135deg, #005d90, #0077b6); color: white; box-shadow: 0 8px 24px rgba(0,93,144,0.35);">
                ← Back to Home
            </a>
            <a href="/auth/login"
               class="px-6 py-3 rounded-2xl font-bold text-sm transition-all hover:-translate-y-1"
               style="background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.6); border: 1px solid rgba(255,255,255,0.1);">
                Sign In
            </a>
        </div>
    </div>
</body>
</html>
