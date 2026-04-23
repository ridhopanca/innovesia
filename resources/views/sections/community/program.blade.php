<section class="bg-surface-container-low py-24 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="mb-16">
            @if(isset($data['title']))
            <h2 class="text-3xl font-bold text-primary mb-4">{{ $data['title'] }}</h2>
            @endif
            <div class="h-1 w-20 bg-primary-container rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-animate="stagger">
            @foreach(($data['programs'] ?? []) as $program)
            <div class="bg-surface-container-lowest p-10 rounded-xl hover:shadow-2xl transition-shadow duration-500">
                <div class="w-14 h-14 bg-secondary-container rounded-xl flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">{{ $program['icon'] ?? 'school' }}</span>
                </div>
                <h3 class="text-2xl font-bold text-primary mb-4">{{ $program['title'] ?? '' }}</h3>
                <p class="text-on-surface-variant leading-relaxed">
                    {{ $program['description'] ?? '' }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>