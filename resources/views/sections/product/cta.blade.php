<section class="py-24">
    <div class="max-w-7xl mx-auto px-8">
        <div class="relative rounded-xl overflow-hidden min-h-[400px] flex items-center justify-center p-12">
            @if(isset($data['image']))
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ $data['image'] }}" alt="Background" />
            @endif
            <div class="absolute inset-0 bg-primary/40 backdrop-blur-[2px]"></div>
            <div class="relative z-10 text-center max-w-3xl" data-animate="fade-up">
                @if(isset($data['title']))
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight">{{ $data['title'] }}</h2>
                @endif
                @if(isset($data['description']))
                <p class="text-white/90 text-lg mb-10 leading-relaxed">{{ $data['description'] }}</p>
                @endif
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    @if(isset($data['primary_button']))
                    <button class="bg-white text-primary px-10 py-4 rounded-xl font-bold text-lg hover:bg-surface-container-lowest transition-all scale-102 active:scale-95 shadow-xl">
                        {{ $data['primary_button'] }}
                    </button>
                    @endif
                    @if(isset($data['secondary_button']))
                    <button class="bg-transparent border-2 border-white/30 text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-white/10 backdrop-blur-md transition-all">
                        {{ $data['secondary_button'] }}
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>