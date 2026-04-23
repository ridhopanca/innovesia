<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Innovesia</title>
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{asset('apple-touch-icon.png')}}" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{asset('favicon-32x32.png')}}" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{asset('favicon-16x16.png')}}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">

    <!-- Top Bar -->
    <div class="h-16 glass-effect border-b border-slate-200 shadow-sm flex items-center px-8 justify-between sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <a href="/cms" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                <img src="{{ asset('logo.webp') }}" alt="Innovesia" class="h-14 -mt-1" />
            </a>
        </div>

        <div class="flex items-center gap-3">
            <!-- User Dropdown -->
            <div class="relative" id="user-menu">
                <button onclick="toggleUserMenu()" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-100 transition-colors">
                    <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center">
                        <span class="material-icons-outlined text-white text-sm">person</span>
                    </div>
                    <div class="text-left hidden sm:block">
                        <div class="text-sm font-medium text-slate-700">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
                    </div>
                    <span class="material-icons-outlined text-slate-400">expand_more</span>
                </button>

                <!-- Dropdown Menu -->
                <div id="user-dropdown" class="hidden absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50">
                    <div class="px-4 py-2 border-b border-slate-100 sm:hidden">
                        <div class="font-medium text-slate-700">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
                    </div>
                    <a href="/update-profile" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 transition-colors">
                        <span class="material-icons-outlined text-slate-400">lock_reset</span>
                        <span class="text-sm font-medium">Update Profile</span>
                    </a>
                    <div class="border-t border-slate-100 mt-2 pt-2">
                        <form method="POST" action="/logout" class="px-4">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 py-2 text-red-500 hover:text-red-600 transition-colors">
                                <span class="material-icons-outlined">logout</span>
                                <span class="text-sm font-medium">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="h-[calc(100vh-4rem)]">
        @yield('content')
    </div>

    @stack('scripts')

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('user-menu');
            const dropdown = document.getElementById('user-dropdown');
            if (menu && !menu.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>