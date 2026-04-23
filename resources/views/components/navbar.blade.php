<nav class="fixed top-0 w-full z-50 bg-white/70 dark:bg-slate-950/70 backdrop-blur-xl shadow-sm dark:shadow-none">
    <div class="max-w-7xl mx-auto px-8 flex justify-between items-center h-20">
        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter text-blue-950">
            <img src="{{asset('logo.webp')}}" alt="Innovesia" class="h-14 -mt-2.5" />
        </a>
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
        <button class="bg-gradient-to-br from-primary to-primary-container text-white px-6 py-2.5 rounded-xl text-sm font-bold">
            Contact Us
        </button>
</nav>