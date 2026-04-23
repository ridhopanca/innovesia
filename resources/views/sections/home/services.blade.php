@php
$services = $data['services'] ?? [
['icon' => 'biotech', 'title' => 'Design Research', 'description' => "Deep ethnographic studies and behavioral analysis to uncover the 'why' behind user actions."],
['icon' => 'strategy', 'title' => 'Innovation Strategy', 'description' => 'Future-proofing your organization with scalable innovation frameworks and roadmaps.'],
['icon' => 'co_present', 'title' => 'Human-Centered Design', 'description' => 'Creating digital and physical products that resonate with real people in real contexts.']
];
@endphp
<section class="py-32">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-20" data-animate="fade-up">
            <div class="max-w-2xl">
                <h2 class="text-5xl font-black font-headline text-primary tracking-tighter mb-6">{{ $data['title'] ?? 'Strategic Capabilities' }}</h2>
                <p class="text-lg text-on-surface-variant leading-relaxed">{{ $data['description'] ?? 'We bridge the gap between high-stakes corporate strategy and the fluid, empathetic energy of human-centered innovation.' }}</p>
            </div>
            <a class="group flex items-center gap-2 text-primary font-bold font-headline" href="#">
                {{ $data['link_text'] ?? 'View All Capabilities' }}
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-animate="stagger">
            @foreach($services as $service)
            <div class="group p-10 bg-surface-container-lowest rounded-2xl hover:bg-primary transition-all duration-500">
                <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center mb-8 group-hover:bg-on-primary-container transition-colors">
                    <span class="material-symbols-outlined text-primary group-hover:text-white">{{ $service['icon'] }}</span>
                </div>
                <h3 class="text-2xl font-bold font-headline text-primary mb-4 group-hover:text-white">{{ $service['title'] }}</h3>
                <p class="text-on-surface-variant group-hover:text-white/80 leading-relaxed mb-6">{{ $service['description'] }}</p>
                <div class="h-px w-full bg-outline-variant/20 group-hover:bg-white/20"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>