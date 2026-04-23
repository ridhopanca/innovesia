<section class="py-32 px-8 bg-white text-center relative">
    <div class="max-w-3xl mx-auto relative z-10">
        @if(isset($data['title']))
        <h2 class="text-4xl md:text-5xl font-black text-primary mb-8 tracking-tighter">{{ $data['title'] }}</h2>
        @endif
        @if(isset($data['description']))
        <p class="text-xl text-on-surface-variant mb-12 leading-relaxed">
            {{ $data['description'] }}
        </p>
        @endif
        <div class="flex flex-col md:flex-row gap-6 justify-center">
            @if(isset($data['primary_button']))
            <button class="bg-primary text-on-primary px-10 py-5 rounded-xl font-bold text-lg hover:scale-105 transition-transform flex items-center justify-center gap-3">
                <span class="material-symbols-outlined">mail</span>
                {{ $data['primary_button'] }}
            </button>
            @endif
            @if(isset($data['secondary_button']))
            <button class="border-2 border-primary text-primary px-10 py-5 rounded-xl font-bold text-lg hover:bg-surface-container-low transition-colors flex items-center justify-center gap-3">
                {{ $data['secondary_button'] }}
            </button>
            @endif
        </div>
    </div>
    <!-- Decorative background element -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[100px] -z-0"></div>
</section>