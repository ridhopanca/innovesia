<section class="bg-surface-container-low py-16 md:py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start gap-6 md:gap-8 mb-12 md:mb-20" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-primary tracking-tighter mb-6 md:mb-0">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['subtitle']))
            <div class="max-w-md">
                <p class="text-on-surface-variant text-base md:text-lg">{{ $data['subtitle'] }}</p>
            </div>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12" data-animate="stagger">
            @foreach(($data['testimonials'] ?? []) as $testimonial)
            <div class="relative bg-surface-container-lowest p-6 md:p-12 rounded-xl">
                <span class="text-6xl md:text-9xl font-serif text-primary-container/10 absolute -top-4 left-4 select-none">"</span>
                <p class="text-lg md:text-2xl text-primary font-medium leading-relaxed relative z-10 mb-6 md:mb-8 italic">
                    {{ $testimonial['quote'] ?? '' }}
                </p>
                <div class="flex items-center gap-4">
                    <img class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover grayscale" src="{{ $testimonial['image'] ?? '' }}" alt="{{ $testimonial['name'] ?? '' }}" />
                    <div>
                        <span class="block font-bold text-primary text-sm md:text-base">{{ $testimonial['name'] ?? '' }}</span>
                        <span class="text-[10px] md:text-xs text-on-surface-variant font-label">{{ $testimonial['role'] ?? '' }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>