<section class="py-32 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="mb-20 text-center max-w-3xl mx-auto" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-4xl md:text-5xl font-bold font-headline mb-6 tracking-tight">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['description']))
            <p class="text-lg text-on-surface-variant font-light">{{ $data['description'] }}</p>
            @endif
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center" data-animate="fade-up">
            <div class="lg:col-span-5 space-y-12">
                @foreach(($data['approaches'] ?? []) as $approach)
                <div class="flex gap-6 items-start">
                    <div class="bg-primary-container text-white p-4 rounded-xl">
                        <span class="material-symbols-outlined text-2xl">{{ $approach['icon'] ?? 'psychology' }}</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold mb-3 font-headline">{{ $approach['title'] ?? '' }}</h3>
                        <p class="text-on-surface-variant leading-relaxed">{{ $approach['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="lg:col-span-7">
                @if(isset($data['image']))
                <div class="bg-surface-container p-4 rounded-2xl">
                    <div class="bg-surface-container-lowest rounded-xl overflow-hidden aspect-video shadow-inner">
                        <img class="w-full h-full object-cover" src="{{ $data['image'] }}" alt="Approach image" />
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>