@extends('layouts.app')

@section('main_classes', 'pt-32 pb-24 px-6 md:px-12 max-w-7xl mx-auto overflow-hidden')
@section('footer_classes', 'w-full')

@section('content')
<!-- Hero Section -->
<section class="mb-24">
    <div class="max-w-4xl">
        @if($project->category)
        <span class="inline-block text-on-secondary-container bg-secondary-container px-4 py-1.5 rounded-full font-label text-xs uppercase tracking-widest mb-6 font-semibold">{{ $project->category }}</span>
        @endif
        <h1 class="text-6xl md:text-8xl font-black text-primary hero-text-tight leading-[0.9] mb-8">
            {{ $project->title }}
        </h1>
        <p class="text-xl md:text-2xl text-on-surface-variant font-light leading-relaxed max-w-2xl">
            {{ $project->excerpt }}
        </p>
    </div>
</section>

<!-- Project Image -->
@if($project->image)
<section class="mb-24">
    <div class="relative w-full rounded-xl overflow-hidden shadow-[0_20px_40px_rgba(0,30,64,0.06)]">
        <img alt="{{ $project->title }}" class="w-full h-auto object-cover" src="{{ $project->image }}" />
    </div>
</section>
@endif

<!-- Stats Section -->
@if($project->stats)
<section class="mb-24">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($project->stats as $stat)
        <div>
            <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ $stat['value'] }}</div>
            <div class="text-sm text-on-surface-variant font-medium">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- Content Section -->
@if($project->content)
<section class="mb-24">
    <div class="max-w-4xl prose prose-lg text-on-surface-variant">
        {!! $project->content !!}
    </div>
</section>
@endif

<!-- Back to Projects -->
<section class="mb-20">
    <a href="{{ route('our-work') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-4 transition-all">
        <span class="material-symbols-outlined">arrow_back</span>
        <span>Back to All Projects</span>
    </a>
</section>
@endsection
