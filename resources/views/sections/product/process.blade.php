<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-20" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-3xl font-bold text-primary tracking-tight mb-4">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['description']))
            <p class="text-on-surface-variant max-w-2xl mx-auto">{{ $data['description'] }}</p>
            @endif
        </div>
        <div class="flex flex-wrap justify-between items-start gap-8 relative" data-animate="stagger">
            <!-- Progress Line (Desktop) -->
            <div class="absolute top-10 left-0 w-full h-[1px] bg-outline-variant hidden md:block"></div>
            @foreach(($data['steps'] ?? []) as $step)
            <div class="flex-1 min-w-[200px] group relative z-10">
                <div class="w-20 h-20 rounded-full bg-surface-container-lowest flex items-center justify-center mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary transition-colors">
                    <span class="material-symbols-outlined text-primary group-hover:text-white">{{ $step['icon'] ?? 'visibility' }}</span>
                </div>
                <h4 class="font-bold text-lg mb-2">{{ $step['title'] ?? '' }}</h4>
                <p class="text-sm text-on-surface-variant">{{ $step['description'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>