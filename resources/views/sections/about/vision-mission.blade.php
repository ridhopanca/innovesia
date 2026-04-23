<section class="bg-surface-container-low py-32">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-animate="stagger">
            <!-- Mission -->
            <div class="bg-surface p-8 rounded-2xl">
                <div class="w-16 h-16 bg-primary-container rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-4xl text-white">{{ $data['mission']['icon'] ?? 'rocket_launch' }}</span>
                </div>
                <h3 class="text-2xl font-bold font-headline mb-4">{{ $data['mission']['title'] ?? 'Our Mission' }}</h3>
                <p class="text-on-surface-variant leading-relaxed">{{ $data['mission']['description'] ?? '' }}</p>
            </div>

            <!-- Vision -->
            <div class="bg-surface p-8 rounded-2xl">
                <div class="w-16 h-16 bg-secondary-container rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-4xl text-on-secondary-container">{{ $data['vision']['icon'] ?? 'visibility' }}</span>
                </div>
                <h3 class="text-2xl font-bold font-headline mb-4">{{ $data['vision']['title'] ?? 'Our Vision' }}</h3>
                <p class="text-on-surface-variant leading-relaxed">{{ $data['vision']['description'] ?? '' }}</p>
            </div>
        </div>
    </div>
</section>