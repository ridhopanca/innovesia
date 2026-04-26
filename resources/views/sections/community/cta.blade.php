<section class="py-16 md:py-32 px-4 md:px-8 bg-white text-center relative">
    <div class="max-w-3xl mx-auto relative z-10">
        @if(isset($data['title']))
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-primary mb-6 md:mb-8 tracking-tighter">{{ $data['title'] }}</h2>
        @endif
        @if(isset($data['description']))
        <p class="text-lg md:text-xl text-on-surface-variant mb-8 md:mb-12 leading-relaxed">
            {{ $data['description'] }}
        </p>
        @endif
        <div class="flex flex-col md:flex-row gap-4 md:gap-6 justify-center">
            @if(isset($data['primary_button']))
            <button class="bg-primary text-on-primary px-6 md:px-10 py-4 md:py-5 rounded-xl font-bold text-base md:text-lg hover:scale-105 transition-transform flex items-center justify-center gap-3 w-full md:w-auto">
                <span class="material-symbols-outlined">mail</span>
                {{ $data['primary_button'] }}
            </button>
            @endif
            @if(isset($data['secondary_button']))
            <button class="border-2 border-primary text-primary px-6 md:px-10 py-4 md:py-5 rounded-xl font-bold text-base md:text-lg hover:bg-surface-container-low transition-colors flex items-center justify-center gap-3 w-full md:w-auto">
                {{ $data['secondary_button'] }}
            </button>
            @endif
        </div>
    </div>
    <!-- Decorative background element -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] md:w-[600px] md:h-[600px] bg-primary/5 rounded-full blur-[100px] -z-0"></div>
</section>