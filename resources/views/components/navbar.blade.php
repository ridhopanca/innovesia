<nav class="fixed top-0 w-full z-50 bg-white/70 dark:bg-slate-950/70 backdrop-blur-xl shadow-sm dark:shadow-none">
    <div class="max-w-7xl mx-auto px-4 md:px-8 flex justify-between items-center h-20">
        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter text-blue-950">
            <img src="{{asset('logo.webp')}}" alt="Innovesia" class="h-14 -mt-2.5" />
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center gap-8 font-manrope tracking-tight leading-relaxed">

            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Intro
            </a>

            <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Who We Are
            </a>

            <a href="{{ route('product') }}"
                class="{{ request()->routeIs('product')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Product & Service
            </a>

            <a href="{{ route('portfolio') }}"
                class="{{ request()->routeIs('portfolio')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Portfolio
            </a>

            <a href="{{ route('articles') }}"
                class="{{ request()->routeIs('articles')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Articles
            </a>

            <a href="{{ route('community') }}"
                class="{{ request()->routeIs('community')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Community
            </a>

        </div>

        <!-- Desktop Contact Button -->
        <a href="{{ route('contact') }}"
            class="hidden md:block bg-gradient-to-br from-primary to-primary-container text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:shadow-lg transition-all">
            Contact Us
        </a>

        <!-- Mobile Menu Button -->
        <button onclick="toggleMobileMenu()" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-slate-100 transition-colors">
            <span class="material-symbols-outlined text-2xl text-slate-700" id="mobile-menu-icon">menu</span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 dark:bg-slate-950/95 backdrop-blur-xl border-t border-slate-200 dark:border-slate-800 max-h-[calc(100vh-5rem)] overflow-y-auto">
        <div class="px-4 py-6 space-y-4 font-manrope">
            <a href="{{ route('home') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('home')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Intro
            </a>

            <a href="{{ route('about') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('about')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Who We Are
            </a>

            <a href="{{ route('product') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('product')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Product & Service
            </a>

            <a href="{{ route('portfolio') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('portfolio')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Portfolio
            </a>

            <a href="{{ route('articles') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('articles')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Articles
            </a>

            <a href="{{ route('community') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('community')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Community
            </a>

            <a href="{{ route('contact') }}"
                class="hidden md:block bg-gradient-to-br from-primary to-primary-container text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:shadow-lg transition-all">
                Contact Us
            </a>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('mobile-menu-icon');

        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            icon.textContent = 'close';
        } else {
            menu.classList.add('hidden');
            icon.textContent = 'menu';
        }
    }
</script>