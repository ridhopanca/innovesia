@extends('layouts.app')

@section('main_classes', '')
@section('footer_classes', 'w-full')

@section('content')
<!-- Hero Section -->
@if($community->image || $community->badge || $community->title || $community->description)
<section class="relative overflow-hidden bg-white px-8 py-24 md:py-48">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Content -->
        <div class="z-10">
            @if($community->badge)
            <span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-bold tracking-widest uppercase mb-6 font-label">
                {{ $community->badge }}
            </span>
            @endif
            <h1 class="text-5xl md:text-7xl font-extrabold text-primary tracking-tighter leading-[0.9] mb-8">
                {{ $community->title }}
            </h1>
            <p class="text-xl md:text-2xl text-on-surface-variant leading-relaxed max-w-xl">
                {{ $community->description }}
            </p>
            <!-- Buttons -->
            @if($community->primary_button || $community->secondary_button)
            <div class="mt-12 flex flex-wrap gap-4">
                @if($community->primary_button)
                <a href="{{ route('contact') }}" class="bg-gradient-to-br from-primary to-primary-container text-on-primary px-8 py-4 rounded-xl font-bold text-lg shadow-xl shadow-primary/10 hover:scale-105 transition-transform">
                    {{ $community->primary_button }}
                </a>
                @endif
                @if($community->secondary_button)
                <a href="{{ route('community') }}" class="px-8 py-4 rounded-xl border border-outline-variant text-primary font-bold text-lg hover:bg-surface-container-low transition-colors">
                    {{ $community->secondary_button }}
                </a>
                @endif
            </div>
            @endif
        </div>
        <!-- Image -->
        @if($community->image)
        <div class="relative group">
            <div class="absolute -inset-4 bg-primary-container/5 rounded-3xl -rotate-2"></div>
            <img alt="{{ $community->title }}" class="relative rounded-xl shadow-2xl w-full object-cover aspect-[4/3]" src="{{ $community->image }}" />
        </div>
        @endif
    </div>
</section>
@endif

<!-- Program Section -->
@if($community->program_data)
<section class="bg-surface-container-low py-24 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-primary mb-4">{{ $community->program_data['title'] ?? 'Program Architecture' }}</h2>
            <div class="h-1 w-20 bg-primary-container rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($community->program_data['programs'] ?? [] as $program)
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
@endif

<!-- Timeline Section -->
@if($community->timeline_data)
<section class="px-8 md:px-16 py-24 bg-surface">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-bold text-primary tracking-tight">{{ $community->timeline_data['title'] ?? 'Timeline Roadmap' }}</h2>
            <p class="text-on-surface-variant mt-4">{{ $community->timeline_data['subtitle'] ?? 'Tracking our journey' }}</p>
        </div>
        <div class="relative space-y-12">
            <!-- Vertical Line (Subtle) -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-px bg-outline-variant/30 hidden md:block"></div>
            @foreach($community->timeline_data['events'] ?? $community->timeline_data['entries'] ?? [] as $index => $event)
            @php
            $status = $event['status'] ?? '';
            $isCompleted = in_array($status, ['completed', 'Completed']);
            $isNext = in_array($status, ['next', 'Next Session']);
            $isUpcoming = in_array($status, ['upcoming', 'Upcoming']);
            @endphp
            <div class="flex flex-col md:flex-row items-center gap-8 relative {{ $isCompleted ? '' : ($isNext ? '' : 'opacity-50') }}">
                <!-- Left Side Content (completed/next) -->
                <div class="flex-1 text-right hidden md:block">
                    @if($isCompleted)
                    <h4 class="text-xl font-bold text-primary">{{ $event['school'] ?? '' }}</h4>
                    <p class="text-sm text-on-surface-variant font-label uppercase tracking-widest">Completed</p>
                    @elseif($isNext)
                    <div class="bg-primary text-on-primary inline-block px-4 py-2 rounded-xl">
                        <h4 class="text-xl font-bold">{{ $event['school'] ?? '' }}</h4>
                        <p class="text-xs font-label uppercase tracking-widest opacity-80">Next Session</p>
                    </div>
                    @else
                    <h4 class="text-lg font-medium text-on-surface">{{ $event['school'] ?? '' }}</h4>
                    @endif
                </div>

                <!-- Center Dot/Icon -->
                <div class="w-12 h-12 rounded-full {{ $isCompleted ? 'bg-primary-container' : ($isNext ? 'bg-white border-4 border-primary-container animate-pulse' : 'bg-surface-variant') }} border-4 border-white shadow-lg z-10 flex items-center justify-center">
                    @if($isCompleted)
                    <span class="material-symbols-outlined text-white text-sm">check</span>
                    @elseif($isNext)
                    <div class="w-2 h-2 rounded-full bg-primary-container"></div>
                    @endif
                </div>

                <!-- Right Side Content -->
                <div class="flex-1 {{ $isCompleted ? 'bg-surface-container-low' : '' }} p-6 rounded-xl w-full">
                    <span class="text-xs font-bold text-primary-container uppercase tracking-tighter block mb-1">{{ $event['date'] ?? '' }}</span>
                    <h4 class="text-xl font-bold text-primary md:hidden">{{ $event['school'] ?? '' }}</h4>
                    <p class="text-on-surface-variant text-sm mt-2">{{ $event['description'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Documentation Section -->
@if($community->documentation_images)
@php
$docTitle = $community->documentation_data['title'] ?? 'In the Lab';
$images = $community->documentation_images;
@endphp
<section class="px-8 md:px-16 py-32 bg-surface">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-primary mb-12">{{ $docTitle }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($images as $index => $image)
            @php
            $imageUrl = is_array($image) ? ($image['url'] ?? '') : $image;
            $imageTitle = is_array($image) ? ($image['title'] ?? 'Documentation ' . ($index + 1)) : 'Documentation ' . ($index + 1);
            @endphp
            @if($imageUrl)
            <div class="group relative aspect-square rounded-xl overflow-hidden">
                <img src="{{ $imageUrl }}" alt="{{ $imageTitle }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <p class="text-white font-semibold text-sm">{{ $imageTitle }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Prototype Section -->
@if($community->prototype_projects)
<section class="px-8 md:px-16 py-32 bg-surface-container-low">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">{{ $community->prototype_projects['title'] ?? 'Prototype Showcase' }}</h2>
        <p class="text-on-surface-variant text-lg mb-12">{{ $community->prototype_projects['subtitle'] ?? 'Turning ideas into tangible solutions' }}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($community->prototype_projects['projects'] ?? [] as $project)
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow">
                <div class="h-48 relative overflow-hidden">
                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover" />
                </div>
                <div class="p-6">
                    <span class="inline-block px-2 py-1 rounded-full text-xs font-bold bg-secondary-container text-on-secondary-container mb-3">{{ $project['category'] }}</span>
                    <h4 class="text-lg font-bold text-primary mb-2">{{ $project['title'] }}</h4>
                    <p class="text-on-surface-variant text-sm">{{ $project['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Video Section -->
@if($community->video_image)
<section class="px-8 md:px-16 py-32 bg-surface">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-primary mb-12">{{ $community->video_data['title'] ?? 'Witness the Transformation' }}</h2>
        <div class="relative rounded-2xl overflow-hidden aspect-video group cursor-pointer">
            <img src="{{ $community->video_image }}" alt="{{ $community->video_title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex items-center justify-center">
                <div class="text-center text-white">
                    <div class="w-20 h-20 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mx-auto mb-4 group-hover:bg-white/30 transition-colors duration-300">
                        <span class="material-symbols-outlined text-5xl">play_arrow</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">{{ $community->video_title }}</h3>
                    <p class="text-lg opacity-90">{{ $community->video_subtitle }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
@if($community->cta_data['title'] ?? $community->cta_title)
<section class="px-8 md:px-16 py-32 bg-gradient-to-br from-surface-container-low to-surface">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-5xl md:text-7xl font-extrabold text-primary font-headline tracking-tighter mb-8">
            {{ $community->cta_data['title'] ?? $community->cta_title }}
        </h2>
        <p class="text-xl text-on-surface-variant mb-12 max-w-2xl mx-auto">
            {{ $community->cta_data['description'] ?? $community->cta_description }}
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            @if($community->cta_data['primary_button'] ?? $community->cta_primary_button)
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-br from-primary to-primary-container text-on-primary px-10 py-5 rounded-xl text-lg font-bold hover:scale-105 transition-all duration-300 shadow-xl shadow-primary/20">
                {{ $community->cta_data['primary_button'] ?? $community->cta_primary_button }}
            </a>
            @endif
            @if($community->cta_data['secondary_button'] ?? $community->cta_secondary_button)
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 border-2 border-outline-variant text-primary px-10 py-5 rounded-xl text-lg font-bold hover:bg-surface-container-low transition-all duration-300">
                {{ $community->cta_data['secondary_button'] ?? $community->cta_secondary_button }}
            </a>
            @endif
        </div>
    </div>
</section>
@endif
@endsection