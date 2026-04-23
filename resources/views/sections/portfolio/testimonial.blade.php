<section class="bg-surface-container-low py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-start mb-20" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-5xl font-black text-primary tracking-tighter mb-8 md:mb-0">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['subtitle']))
            <div class="max-w-md">
                <p class="text-on-surface-variant text-lg">{{ $data['subtitle'] }}</p>
            </div>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12" data-animate="stagger">
            @foreach(($data['testimonials'] ?? []) as $testimonial)
            <div class="relative bg-surface-container-lowest p-12 rounded-xl">
                <span class="text-9xl font-serif text-primary-container/10 absolute -top-4 left-4 select-none">"</span>
                <p class="text-2xl text-primary font-medium leading-relaxed relative z-10 mb-8 italic">
                    {{ $testimonial['quote'] ?? '' }}
                </p>
                <div class="flex items-center gap-4">
                    <img class="w-14 h-14 rounded-full object-cover grayscale" src="{{ $testimonial['image'] ?? '' }}" alt="{{ $testimonial['name'] ?? '' }}" />
                    <div>
                        <span class="block font-bold text-primary">{{ $testimonial['name'] ?? '' }}</span>
                        <span class="text-xs text-on-surface-variant font-label">{{ $testimonial['role'] ?? '' }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>