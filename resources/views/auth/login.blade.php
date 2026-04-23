<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .input-field {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.15);
        }

        .login-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(102, 126, 234, 0.4);
        }

        .floating-shape {
            animation: float 6s ease-in-out infinite;
        }

        .floating-shape:nth-child(2) {
            animation-delay: -2s;
        }

        .floating-shape:nth-child(3) {
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }
    </style>
</head>

<body class="min-h-screen gradient-bg flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Background Shapes -->
    <div class="absolute top-20 left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl floating-shape"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl floating-shape"></div>
    <div class="absolute top-1/2 left-1/4 w-48 h-48 bg-blue-400/10 rounded-full blur-2xl floating-shape"></div>

    <!-- Login Card -->
    <div class="glass-effect rounded-3xl p-8 w-full max-w-md relative z-10 shadow-2xl">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="material-icons-outlined text-white text-3xl">admin_panel_settings</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Admin CMS</h1>
            <p class="text-slate-500 text-sm mt-1">Please login to continue</p>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
            <div class="flex items-center gap-2 text-red-600">
                <span class="material-icons-outlined text-sm">error</span>
                <span class="text-sm font-medium">{{ $errors->first() }}</span>
            </div>
        </div>
        @endif

        <form method="POST" action="/cms/login" class="space-y-5">
            @csrf
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="input-field w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-white/50"
                        placeholder="admin@example.com">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">lock</span>
                    <input type="password" name="password" id="password" required
                        class="input-field w-full pl-12 pr-12 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-white/50"
                        placeholder="••••••••">
                    <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors">
                        <span class="material-icons-outlined text-lg" id="toggle-icon">visibility_off</span>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-slate-600">Remember me</span>
                </label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-btn w-full py-3.5 rounded-xl text-white font-semibold text-lg flex items-center justify-center gap-2">
                <span class="material-icons-outlined">login</span>
                <span>Login</span>
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggle-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility_off';
            }
        }
    </script>
</body>

</html>