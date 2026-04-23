<section class="py-32 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-20" data-animate="fade-up">
            <div class="max-w-2xl">
                @if(isset($data['subtitle']))
                <span class="text-sm font-bold tracking-widest text-primary/60 font-label uppercase mb-4 block">{{ $data['subtitle'] }}</span>
                @endif
                @if(isset($data['title']))
                <h2 class="text-4xl md:text-5xl font-bold font-headline">{{ $data['title'] }}</h2>
                @endif
            </div>
            @if(isset($data['button_text']))
            <button class="flex items-center gap-2 text-primary font-bold hover:gap-4 transition-all">
                {{ $data['button_text'] }} <span class="material-symbols-outlined">arrow_forward</span>
            </button>
            @endif
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12" data-animate="stagger">
            @foreach(($data['members'] ?? []) as $member)
            <div class="group">
                <div class="aspect-[4/5] bg-surface-container rounded-xl overflow-hidden mb-6">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 scale-105 group-hover:scale-100" src="{{ $member['image'] ?? '' }}" alt="{{ $member['name'] ?? '' }}" />
                </div>
                <h4 class="text-xl font-bold font-headline mb-1">{{ $member['name'] ?? '' }}</h4>
                <p class="text-primary font-medium text-sm mb-4">{{ $member['role'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>