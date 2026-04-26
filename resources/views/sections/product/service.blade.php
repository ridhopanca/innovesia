<section class="py-16 md:py-32 bg-surface">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="mb-12 md:mb-16" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-3xl md:text-4xl font-bold text-primary tracking-tighter mb-4">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['description']))
            <p class="text-on-surface-variant text-base md:text-lg max-w-2xl">{{ $data['description'] }}</p>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4 md:gap-6" data-animate="stagger">
            @foreach(($data['services'] ?? []) as $index => $service)
            @if($index === 0)
            <div class="md:col-span-3 bg-surface-container-lowest p-6 md:p-10 rounded-xl flex flex-col justify-between hover:shadow-xl transition-all duration-500 border border-transparent hover:border-outline-variant/20">
                <div>
                    <div class="w-12 h-12 bg-secondary-container rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <span class="material-symbols-outlined text-on-secondary-container">{{ $service['icon'] ?? 'insights' }}</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-primary mb-4">{{ $service['title'] ?? '' }}</h3>
                    <p class="text-on-surface-variant mb-6 md:mb-8 leading-relaxed">{{ $service['description'] ?? '' }}</p>
                </div>
                <a class="flex items-center text-primary font-bold gap-2 group" href="#">
                    Explore Service <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
            @elseif($index === 1)
            <div class="md:col-span-3 bg-primary-container p-6 md:p-10 rounded-xl flex flex-col justify-between text-on-primary-container shadow-lg">
                <div>
                    <div class="w-12 h-12 bg-on-primary-container/20 rounded-lg flex items-center justify-center mb-4 md:mb-6">
                        <span class="material-symbols-outlined text-white">{{ $service['icon'] ?? 'science' }}</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-white mb-4">{{ $service['title'] ?? '' }}</h3>
                    <p class="text-on-primary-container mb-6 md:mb-8 leading-relaxed">{{ $service['description'] ?? '' }}</p>
                </div>
                <a class="flex items-center text-white font-bold gap-2 group" href="#">
                    Book a Session <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
            @else
            <div class="md:col-span-2 bg-surface-container-low p-6 md:p-8 rounded-xl hover:bg-surface-container-lowest transition-colors border border-transparent hover:border-outline-variant/20">
                <span class="material-symbols-outlined text-primary-container text-3xl md:text-4xl mb-4 md:mb-6">{{ $service['icon'] ?? 'groups' }}</span>
                <h3 class="text-lg md:text-xl font-bold text-primary mb-3">{{ $service['title'] ?? '' }}</h3>
                <p class="text-xs md:text-sm text-on-surface-variant mb-4 md:mb-6">{{ $service['description'] ?? '' }}</p>
                <a class="text-xs md:text-sm font-bold text-primary underline underline-offset-4" href="#">Learn More</a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>