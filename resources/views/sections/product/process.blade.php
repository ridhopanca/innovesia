<section class="py-16 md:py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="text-center mb-12 md:mb-20" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-2xl md:text-3xl font-bold text-primary tracking-tight mb-4">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['description']))
            <p class="text-on-surface-variant max-w-2xl mx-auto text-sm md:text-base">{{ $data['description'] }}</p>
            @endif
        </div>
        <div class="flex flex-wrap justify-between items-start gap-6 md:gap-8 relative" data-animate="stagger">
            <!-- Progress Line (Desktop) -->
            <div class="absolute top-10 left-0 w-full h-[1px] bg-outline-variant hidden md:block"></div>
            @foreach(($data['steps'] ?? []) as $step)
            <div class="flex-1 min-w-[150px] md:min-w-[200px] group relative z-10">
                <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-surface-container-lowest flex items-center justify-center mb-4 md:mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary transition-colors">
                    <span class="material-symbols-outlined text-primary group-hover:text-white text-2xl md:text-3xl">{{ $step['icon'] ?? 'visibility' }}</span>
                </div>
                <h4 class="font-bold text-base md:text-lg mb-2">{{ $step['title'] ?? '' }}</h4>
                <p class="text-xs md:text-sm text-on-surface-variant">{{ $step['description'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>