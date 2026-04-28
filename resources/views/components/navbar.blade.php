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

            <a href="{{ route('our-work') }}"
                class="{{ request()->routeIs('our-work')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Our Work
            </a>

            <a href="{{ route('articles') }}"
                class="{{ request()->routeIs('articles')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                Articles
            </a>

            <!-- Community Dropdown -->
            @php
            $navbarCommunities = \App\Models\Community::published()->ordered()->get();
            @endphp
            <div class="relative group">
                <button class="flex items-center gap-1 {{ request()->routeIs('community*')
                    ? 'text-blue-900 font-bold border-b-2 border-blue-900 pb-1'
                    : 'text-slate-600 hover:text-blue-900' }}">
                    Community
                    <span class="material-symbols-outlined text-sm transition-transform group-hover:rotate-180">expand_more</span>
                </button>
                <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="{{ route('community') }}" class="block px-4 py-3 hover:bg-slate-50 rounded-t-xl text-slate-700 hover:text-blue-900">All Programs</a>
                    @foreach($navbarCommunities as $navCommunity)
                    <a href="{{ route('community-detail', $navCommunity->slug) }}" class="block px-4 py-3 hover:bg-slate-50 {{ $loop->last ? 'rounded-b-xl' : '' }} text-slate-700 hover:text-blue-900">{{ $navCommunity->title }}</a>
                    @endforeach
                </div>
            </div>

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

            <a href="{{ route('our-work') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('our-work')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Our Work
            </a>

            <a href="{{ route('articles') }}"
                class="block py-3 px-4 rounded-lg {{ request()->routeIs('articles')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                Articles
            </a>

            <!-- Mobile Community Dropdown -->
            <div class="space-y-2">
                <button onclick="toggleMobileCommunity()" class="w-full flex items-center justify-between py-3 px-4 rounded-lg {{ request()->routeIs('community*')
                    ? 'bg-blue-100 text-blue-900 font-bold'
                    : 'text-slate-600 hover:bg-slate-100' }}">
                    Community
                    <span class="material-symbols-outlined text-sm transition-transform" id="mobile-community-icon">expand_more</span>
                </button>
                <div id="mobile-community-menu" class="hidden pl-4 space-y-1">
                    <a href="{{ route('community') }}" class="block py-2 px-4 rounded-lg text-slate-600 hover:bg-slate-100">All Programs</a>
                    @foreach($navbarCommunities as $navCommunity)
                    <a href="{{ route('community-detail', $navCommunity->slug) }}" class="block py-2 px-4 rounded-lg text-slate-600 hover:bg-slate-100">{{ $navCommunity->title }}</a>
                    @endforeach
                </div>
            </div>

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

    function toggleMobileCommunity() {
        const menu = document.getElementById('mobile-community-menu');
        const icon = document.getElementById('mobile-community-icon');

        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            menu.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    }
</script>