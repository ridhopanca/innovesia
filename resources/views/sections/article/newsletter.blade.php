@php
$subtitle = $data['subtitle'] ?? 'Intelligence delivered';
$title = $data['title'] ?? 'Never miss a strategic shift.';
$description = $data['description'] ?? 'Join 25,000+ industry leaders who receive our monthly "Human Architect" digest—a curated analysis of innovation, culture, and strategy.';
$buttonText = $data['button_text'] ?? 'Subscribe Now';
$placeholder = $data['placeholder'] ?? 'professional@email.com';
@endphp

<section class="mt-32 rounded-xl bg-primary text-on-primary p-12 md:p-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary-container to-transparent opacity-50"></div>
    <div class="relative z-10 max-w-2xl">
        <span class="font-label text-xs uppercase tracking-[0.2em] text-on-primary-container mb-6 block">{{ $subtitle }}</span>
        <h2 class="text-4xl md:text-5xl font-bold tracking-tighter mb-8 text-white leading-none">
            {!! nl2br(e($title)) !!}
        </h2>
        <p class="text-on-primary-container text-lg mb-10 leading-relaxed">
            {{ $description }}
        </p>
        <form class="flex flex-col sm:flex-row gap-4" action="{{ $data['form_action'] ?? '#' }}" method="POST">
            @csrf
            <input name="email" class="flex-grow px-6 py-4 rounded-xl bg-surface-container-lowest border-none text-primary focus:ring-2 focus:ring-on-primary-container transition-all" placeholder="{{ $placeholder }}" type="email" required />
            <button class="px-8 py-4 rounded-xl bg-on-primary-container text-white font-bold hover:scale-102 transition-transform shadow-lg" type="submit">
                {{ $buttonText }}
            </button>
        </form>
    </div>
</section>