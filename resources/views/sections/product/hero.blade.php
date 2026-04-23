<section class="relative min-h-[716px] flex items-center overflow-hidden bg-surface">
    <div class="max-w-7xl mx-auto px-8 w-full grid lg:grid-cols-2 gap-12 items-center">
        <div class="z-10" data-animate="fade-up">
            @if(isset($data['badge']))
            <span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container font-label text-xs font-bold tracking-widest uppercase mb-6">{{ $data['badge'] }}</span>
            @endif
            @if(isset($data['title']))
            <h1 class="text-6xl md:text-7xl font-extrabold text-primary tracking-tighter leading-[0.9] mb-8">
                {{ $data['title'] }}
            </h1>
            @endif
            @if(isset($data['description']))
            <p class="text-xl text-on-surface-variant max-w-xl leading-relaxed mb-10">
                {{ $data['description'] }}
            </p>
            @endif
        </div>
        @if(isset($data['image']))
        <div class="relative hidden lg:block" data-animate="fade-up">
            <div class="w-full aspect-square rounded-xl overflow-hidden shadow-2xl">
                <img class="w-full h-full object-cover" src="{{ $data['image'] }}" alt="Product hero image" />
            </div>
            @if(isset($data['quote']))
            <div class="absolute -bottom-10 -left-10 bg-primary-container p-8 rounded-xl shadow-xl max-w-xs">
                <p class="text-on-primary-container font-medium italic">"{{ $data['quote'] }}"</p>
            </div>
            @endif
        </div>
        @endif
    </div>
    <!-- Background Decorative Element -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-surface-container-low -z-10"></div>
</section>