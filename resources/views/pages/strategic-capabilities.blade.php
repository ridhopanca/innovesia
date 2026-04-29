@extends('layouts.app')

@section('main_classes', 'pt-24')
@section('footer_classes', 'w-full')

@section('content')
@if(isset($sections['content']))
<!-- Hero Section -->
<section class="relative min-h-[716px] flex items-center overflow-hidden px-8 md:px-16 py-20 bg-surface">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-secondary-container/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] bg-primary-container/10 rounded-full blur-[100px]"></div>
    </div>
    <div class="relative z-10 max-w-4xl">
        <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] uppercase text-on-primary-container bg-primary-fixed rounded-full">
            Expertise &amp; Methodology
        </span>
        <h1 class="text-6xl md:text-8xl font-extrabold tracking-tighter text-primary mb-8 leading-[0.9]">
            {{ $sections['content']['hero_title'] ?? "Strategic Capabilities" }}
        </h1>
        <p class="text-xl md:text-2xl text-on-surface-variant max-w-2xl font-light leading-relaxed mb-12">
            {{ $sections['content']['hero_description'] ?? "Innovesia bridges the gap between complex strategic challenges and human-centered innovation, transforming insights into actionable impact." }}
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="#our-approach" class="bg-primary-container text-white px-8 py-4 rounded-xl text-lg font-bold hover:scale-[1.02] transition-transform shadow-[0_20px_40px_rgba(0,30,64,0.12)] inline-block">
                Explore Our Approach
            </a>
            <a href="{{ route('portfolio') }}" class="bg-surface-container-low text-primary px-8 py-4 rounded-xl text-lg font-bold hover:bg-surface-container-high transition-colors inline-block">
                View Portfolio
            </a>
        </div>
    </div>
</section>

<!-- Capabilities Grid -->
<section class="py-32 px-8 md:px-16 bg-surface-container-low">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-bold text-primary tracking-tight mb-6">{{ $sections['content']['capabilities_title'] ?? "Built for Modern Transformation" }}</h2>
                <p class="text-on-surface-variant text-lg">{{ $sections['content']['capabilities_subtitle'] ?? "Our core disciplines are designed to address the multifaceted nature of contemporary business and social ecosystems." }}</p>
            </div>
            <div class="hidden md:block h-[2px] flex-grow bg-outline-variant/30 mb-6 mx-12"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $capabilities = $sections['content']['capabilities'] ?? [];
            // Migrate old flat data if needed
            if (empty($capabilities)) {
            for ($i = 1; $i <= 9; $i++) {
                if (!empty($sections['content']["capability_{$i}_title"])) {
                $capabilities[]=[ 'icon'=> $sections['content']["capability_{$i}_icon"] ?? 'star',
                'title' => $sections['content']["capability_{$i}_title"],
                'description' => $sections['content']["capability_{$i}_description"] ?? ''
                ];
                }
                }
                }
                @endphp
                @foreach($capabilities as $capability)
                <div class="bg-surface-container-lowest p-8 rounded-lg group hover:translate-y-[-8px] transition-all duration-500 shadow-[0_20px_40px_rgba(0,30,64,0.04)]">
                    <span class="material-symbols-outlined text-4xl text-primary mb-6">{{ $capability['icon'] ?? 'star' }}</span>
                    <h3 class="text-xl font-bold text-primary mb-3">{{ $capability['title'] }}</h3>
                    <div class="w-12 h-[1px] bg-primary/20 mb-4 transition-all group-hover:w-full"></div>
                    <p class="text-on-surface-variant leading-relaxed">{{ $capability['description'] }}</p>
                </div>
                @endforeach
        </div>
    </div>
</section>

<!-- Approach Section -->
<section id="our-approach" class="py-32 px-8 md:px-16 bg-surface">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">{{ $sections['content']['approach_title'] ?? "Our Approach" }}</h2>
        <p class="text-on-surface-variant text-lg mb-20 max-w-2xl mx-auto">{{ $sections['content']['approach_description'] ?? "Our methodology combines rigorous research with creative exploration to deliver solutions that resonate with users and drive business impact." }}</p>
        <div class="flex flex-col md:flex-row justify-between items-center relative gap-12 md:gap-0">
            <!-- Connecting Line -->
            <div class="hidden md:block absolute top-[2.5rem] left-[10%] right-[10%] h-[1px] bg-outline-variant/30 z-0"></div>
            <div class="relative z-10 flex flex-col items-center group">
                <div class="w-20 h-20 bg-surface-container-lowest rounded-full flex items-center justify-center mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl" data-icon="favorite">favorite</span>
                </div>
                <h4 class="font-bold text-primary mb-2">Empathize</h4>
                <p class="text-xs uppercase tracking-widest text-on-surface-variant">Step 01</p>
            </div>
            <div class="relative z-10 flex flex-col items-center group">
                <div class="w-20 h-20 bg-surface-container-lowest rounded-full flex items-center justify-center mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl" data-icon="filter_center_focus">filter_center_focus</span>
                </div>
                <h4 class="font-bold text-primary mb-2">Define</h4>
                <p class="text-xs uppercase tracking-widest text-on-surface-variant">Step 02</p>
            </div>
            <div class="relative z-10 flex flex-col items-center group">
                <div class="w-20 h-20 bg-surface-container-lowest rounded-full flex items-center justify-center mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl" data-icon="lightbulb">lightbulb</span>
                </div>
                <h4 class="font-bold text-primary mb-2">Ideate</h4>
                <p class="text-xs uppercase tracking-widest text-on-surface-variant">Step 03</p>
            </div>
            <div class="relative z-10 flex flex-col items-center group">
                <div class="w-20 h-20 bg-surface-container-lowest rounded-full flex items-center justify-center mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl" data-icon="construction">construction</span>
                </div>
                <h4 class="font-bold text-primary mb-2">Prototype</h4>
                <p class="text-xs uppercase tracking-widest text-on-surface-variant">Step 04</p>
            </div>
            <div class="relative z-10 flex flex-col items-center group">
                <div class="w-20 h-20 bg-surface-container-lowest rounded-full flex items-center justify-center mb-6 shadow-sm border border-outline-variant/20 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-3xl" data-icon="fact_check">fact_check</span>
                </div>
                <h4 class="font-bold text-primary mb-2">Test</h4>
                <p class="text-xs uppercase tracking-widest text-on-surface-variant">Step 05</p>
            </div>
        </div>
    </div>
</section>

<!-- Why It Matters Section -->
<section class="py-32 px-8 md:px-16 bg-surface-container-low overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="order-2 lg:order-1">
            <h2 class="text-4xl md:text-5xl font-bold text-primary mb-8">{{ $sections['content']['why_it_matters_title'] ?? "Why Our Capabilities Matter" }}</h2>
            <div class="space-y-8">
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center text-white">
                        <span class="material-symbols-outlined" data-icon="trending_up">trending_up</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">{{ $sections['content']['why_point_1_title'] ?? "Bridging Strategy &amp; Execution" }}</h4>
                        <p class="text-on-surface-variant leading-relaxed">{{ $sections['content']['why_point_1_description'] ?? "Vision without implementation is a hallucination. We provide the architectural framework and technical expertise to move from abstract strategy to tangible market impact." }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center text-white">
                        <span class="material-symbols-outlined" data-icon="psychology">psychology</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">{{ $sections['content']['why_point_2_title'] ?? "Data &amp; Human Insight" }}</h4>
                        <p class="text-on-surface-variant leading-relaxed">{{ $sections['content']['why_point_2_description'] ?? "We decode complexity by layering quantitative data with qualitative human narratives, ensuring decisions are informed by both logic and empathy." }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary-container rounded-lg flex items-center justify-center text-white">
                        <span class="material-symbols-outlined" data-icon="public">public</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">{{ $sections['content']['why_point_3_title'] ?? "Policy &amp; Real-world Impact" }}</h4>
                        <p class="text-on-surface-variant leading-relaxed">{{ $sections['content']['why_point_3_description'] ?? "Our approach scales from individual product interactions to nation-wide policy shifts, maintaining fidelity to the user's needs at every level." }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-1 lg:order-2">
            <div class="relative rounded-lg overflow-hidden shadow-2xl">
                <img alt="Collaboration" class="w-full h-full object-cover aspect-[4/3]" data-alt="Modern collaborative workshop with diverse professionals discussing strategy in a bright minimalist office with large windows and city view" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkxphVfFaAvXX3BvSQTWc9u7xsOGluq03mjJGOqrM5LWjzSUc3qxe-ErJBHgYQM-9AlFGUpbqwf-HoubYJjynHfc6boNuJojvfsL695NDqMTDTAwPyeyHGfhBPxLDgKutji_6AArsDnpUXqBjLzNaqB5aQZts92YlshFrfwgaSEmJWSTfF5yTtEqkI3hJHBmd_LuPllH0D_vD1IhsXRq3c60S4Y8x_wJugU_WdhjBfnpZYRHpEnp5P1A6AoGV_iYzvPPo8dSBiWR05" />
                <div class="absolute inset-0 bg-primary/10 mix-blend-overlay"></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 px-8 md:px-16 bg-primary text-white text-center">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-4xl md:text-6xl font-extrabold tracking-tighter mb-8">{{ $sections['content']['cta_title'] ?? "Turn Insight Into Impact" }}</h2>
        <p class="text-xl text-on-primary-container mb-12 font-light">{{ $sections['content']['cta_description'] ?? "Join the ranks of forward-thinking organizations scaling their innovation potential with Innovesia's strategic guidance." }}</p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="{{ route('contact') }}" class="bg-white text-primary px-10 py-4 rounded-xl text-lg font-bold hover:bg-slate-100 transition-all duration-300 inline-block">
                Discuss Your Challenge
            </a>
            <a href="{{ route('our-work') }}" class="bg-transparent border-2 border-white/20 text-white px-10 py-4 rounded-xl text-lg font-bold hover:bg-white/10 transition-all duration-300 inline-block">
                Explore Our Work
            </a>
        </div>
    </div>
</section>
@endif
@endsection