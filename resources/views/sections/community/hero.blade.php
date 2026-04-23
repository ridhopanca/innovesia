<section class="relative overflow-hidden bg-white px-8 py-24 md:py-32">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="z-10" data-animate="fade-up">
            @if(isset($data['badge']))
            <span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-bold tracking-widest uppercase mb-6 font-label">{{ $data['badge'] }}</span>
            @endif
            @if(isset($data['title']))
            <h1 class="text-5xl md:text-7xl font-extrabold text-primary tracking-tighter leading-[0.9] mb-8">
                {{ $data['title'] }}
            </h1>
            @endif
            @if(isset($data['description']))
            <p class="text-xl md:text-2xl text-on-surface-variant leading-relaxed max-w-xl">
                {{ $data['description'] }}
            </p>
            @endif
            <div class="mt-12 flex flex-wrap gap-4">
                @if(isset($data['primary_button']))
                <button class="bg-gradient-to-br from-primary to-primary-container text-on-primary px-8 py-4 rounded-xl font-bold text-lg shadow-xl shadow-primary/10 hover:scale-105 transition-transform">
                    {{ $data['primary_button'] }}
                </button>
                @endif
                @if(isset($data['secondary_button']))
                <button class="px-8 py-4 rounded-xl border border-outline-variant text-primary font-bold text-lg hover:bg-surface-container-low transition-colors">
                    {{ $data['secondary_button'] }}
                </button>
                @endif
            </div>
        </div>
        @if(isset($data['image']))
        <div class="relative group" data-animate="fade-up">
            <div class="absolute -inset-4 bg-primary-container/5 rounded-3xl -rotate-2"></div>
            <img alt="Students collaborating in a workshop" class="relative rounded-xl shadow-2xl w-full object-cover aspect-[4/3]" src="{{ $data['image'] }}" />
        </div>
        @endif
    </div>
</section>