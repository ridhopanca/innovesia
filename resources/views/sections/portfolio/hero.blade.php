<section class="max-w-7xl mx-auto px-8 mb-32">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
        <div class="md:col-span-8" data-animate="fade-up">
            @if(isset($data['badge']))
            <span class="font-label text-[10px] uppercase tracking-[0.2em] text-outline mb-4 block">{{ $data['badge'] }}</span>
            @endif
            @if(isset($data['subtitle']))
            <span class="font-label text-[10px] uppercase tracking-[0.2em] text-outline mb-4 block">{{ $data['subtitle'] }}</span>
            @endif
            @if(isset($data['title']))
            <h1 class="text-6xl md:text-8xl font-extrabold tracking-tighter text-primary leading-[0.9] mb-8">
                {{ $data['title'] }}
                @if(isset($data['title_highlight']))
                <span class="text-on-primary-container">{{ $data['title_highlight'] }}</span>
                @endif
            </h1>
            @endif
        </div>
        <div class="md:col-span-4 pb-4" data-animate="fade-up">
            @if(isset($data['description']))
            <p class="text-xl text-on-surface-variant leading-relaxed font-light italic border-l-4 border-primary-container pl-6">
                {{ $data['description'] }}
            </p>
            @endif
        </div>
    </div>
</section>