@extends('layouts.app')

@section('main_classes', 'pt-32 pb-24 px-6 md:px-12 max-w-7xl mx-auto overflow-hidden')
@section('footer_classes', 'w-full')

@section('content')
<!-- Hero Section -->
<section class="mb-24 md:mb-32">
    <div class="max-w-4xl">
        <span class="inline-block text-on-secondary-container bg-secondary-container px-4 py-1.5 rounded-full font-label text-xs uppercase tracking-widest mb-6 font-semibold">Our Portfolio</span>
        <h1 class="text-6xl md:text-8xl font-black text-primary hero-text-tight leading-[0.9] mb-8">
            {{ $sections['content']['hero_title'] ?? 'Our Work & Impact' }}
        </h1>
        <p class="text-xl md:text-2xl text-on-surface-variant font-light leading-relaxed max-w-2xl">
            {{ $sections['content']['hero_description'] ?? 'Explore how Innovesia translates complex insight into real-world impact, bridging the gap between strategic institutional vision and human-centric design.' }}
        </p>
    </div>
</section>

<!-- Featured Project: Desaku Maju – GERCEP -->
@if($featuredProject)
<section class="mb-24">
    <div class="relative w-full rounded-xl overflow-hidden bg-surface-container-lowest shadow-[0_20px_40px_rgba(0,30,64,0.06)] flex flex-col lg:flex-row min-h-[600px]">
        <div class="lg:w-1/2 p-12 md:p-16 flex flex-col justify-center">
            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 1;">public</span>
                <span class="text-on-surface-variant font-label text-sm font-bold tracking-widest uppercase">{{ $featuredProject->category }}</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-primary mb-6 leading-tight">{{ $featuredProject->title }}</h2>
            <p class="text-lg text-on-surface-variant mb-10 leading-relaxed">
                {{ $featuredProject->excerpt }}
            </p>
            @if($featuredProject->stats)
            <div class="grid grid-cols-2 gap-8 mb-12">
                @foreach($featuredProject->stats as $stat)
                <div>
                    <div class="text-4xl font-black text-primary mb-1">{{ $stat['value'] }}</div>
                    <div class="text-sm text-on-surface-variant font-medium">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
            @endif
            <div class="flex gap-4">
                <a href="{{ route('project-detail', $featuredProject->slug) }}" class="bg-primary-gradient text-white px-8 py-3.5 rounded-xl font-bold hover:scale-[1.02] transition-all inline-block">View Case Study</a>
            </div>
        </div>
        <div class="lg:w-1/2 relative min-h-[400px] lg:min-h-full">
            <img alt="{{ $featuredProject->title }}" class="absolute inset-0 w-full h-full object-cover" src="{{ $featuredProject->image }}" />
            <div class="absolute inset-0 bg-primary/10 mix-blend-overlay"></div>
        </div>
    </div>
</section>
@endif

<!-- Project Grid -->
@if($projects && $projects->count() > 0)
<section class="mb-32">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <div class="group bg-surface-container-lowest rounded-lg overflow-hidden flex flex-col shadow-[0_4px_20px_rgba(0,30,64,0.04)] hover:shadow-[0_20px_40px_rgba(0,30,64,0.08)] transition-all duration-300">
            <div class="h-64 relative overflow-hidden">
                <img alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $project->image }}" />
            </div>
            <div class="p-8 flex flex-col flex-grow">
                @if($project->category)
                <div class="text-xs font-bold text-on-secondary-container bg-secondary-container px-3 py-1 rounded-full w-fit mb-4">{{ $project->category }}</div>
                @endif
                <h3 class="text-2xl font-bold text-primary mb-3">{{ $project->title }}</h3>
                <p class="text-on-surface-variant text-md mb-8 leading-relaxed">
                    {{ $project->excerpt }}
                </p>
                <a href="{{ route('project-detail', $project->slug) }}" class="mt-auto pt-6 border-t border-surface-variant/30 flex items-center justify-between">
                    <span class="text-sm font-bold text-primary hover:text-primary/80 transition-colors">Read Impact</span>
                    <span class="material-symbols-outlined text-primary group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="bg-primary p-12 md:p-24 rounded-xl relative overflow-hidden text-center md:text-left">
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none">
        <div class="w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary-container to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-2xl">
        <h2 class="text-4xl md:text-6xl font-black text-white mb-8 leading-tight">{{ $sections['content']['cta_title'] ?? "Let's Create Impact Together" }}</h2>
        <p class="text-xl text-primary-fixed-dim/80 mb-12 font-light leading-relaxed">
            {{ $sections['content']['cta_description'] ?? 'Ready to transform your institutional challenges into human-centered solutions? Our strategy team is standing by to architect your next breakthrough.' }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('contact') }}" class="bg-surface-container-lowest text-primary px-10 py-4 rounded-xl font-bold text-lg hover:scale-[1.02] transition-all shadow-xl inline-block">
                Start a Project
            </a>
            <a href="{{ route('contact') }}" class="bg-transparent text-white border border-white/20 px-10 py-4 rounded-xl font-bold text-lg hover:bg-white/5 transition-all inline-block">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection