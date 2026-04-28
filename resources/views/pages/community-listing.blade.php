@extends('layouts.app')

@section('main_classes', 'pt-32 pb-24')
@section('footer_classes', 'w-full')

@section('content')
<section class="px-8 md:px-16 py-20">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container font-label text-xs font-bold tracking-[0.1em] uppercase mb-6">COMMUNITY PROGRAMS</span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-primary mb-6 leading-[1.1]">
                Our Community Initiatives
            </h1>
            <p class="text-xl text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                Explore our diverse community programs designed to empower innovation and create meaningful impact across various sectors.
            </p>
        </div>

        @if($communities->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($communities as $community)
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,30,64,0.04)] hover:shadow-[0_20px_40px_rgba(0,30,64,0.08)] transition-all duration-300">
                <div class="h-64 relative overflow-hidden">
                    @if($community->image)
                    <img alt="{{ $community->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $community->image }}" />
                    @else
                    <div class="w-full h-full bg-surface-container-low flex items-center justify-center">
                        <span class="material-icons-outlined text-6xl text-slate-300">groups</span>
                    </div>
                    @endif
                    @if($community->badge)
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-primary-container/90 text-on-primary-container text-xs font-bold backdrop-blur-sm">{{ $community->badge }}</span>
                    </div>
                    @endif
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ $community->title }}</h3>
                    <p class="text-on-surface-variant text-md mb-6 leading-relaxed">
                        {{ $community->description }}
                    </p>
                    <a href="{{ route('community-detail', $community->slug) }}" class="inline-flex items-center gap-2 text-primary font-bold hover:text-primary/80 transition-colors">
                        <span>Learn More</span>
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20">
            <p class="text-on-surface-variant text-lg">No community programs available at the moment.</p>
        </div>
        @endif
    </div>
</section>
@endsection
