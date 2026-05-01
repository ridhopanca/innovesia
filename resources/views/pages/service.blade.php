@extends('layouts.app')

@section('main_classes', 'pt-24')
@section('footer_classes', 'w-full')

@section('content')
<!-- Hero Section -->
<section class="px-8 md:px-16 py-20 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-12 items-start">
            <div class="w-full md:w-2/3">
                <span class="label-md uppercase tracking-[0.1em] font-label text-outline text-xs mb-4 block">Service Excellence</span>
                <h1 class="text-6xl md:text-8xl font-extrabold text-primary font-headline tracking-tighter leading-[0.9] mb-8">
                    {{ $service->title }}
                </h1>
                <p class="text-xl md:text-2xl text-on-surface-variant font-light leading-relaxed max-w-2xl">
                    {{ $service->excerpt }}
                </p>
            </div>
            <div class="w-full md:w-1/3 pt-12">
                <div class="bg-surface-container-low p-8 rounded-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                    <h3 class="font-bold text-primary mb-2">Primary Objective</h3>
                    <p class="text-sm text-on-secondary-container">Transform abstract strategy into functional prototypes with high-fidelity validation cycles.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visual Anchor -->
@if($service->image)
<section class="px-8 md:px-16">
    <div class="max-w-7xl mx-auto rounded-xl overflow-hidden shadow-2xl h-full">
        <img alt="{{ $service->title }}" class="w-full h-full object-contain" src="{{ $service->image }}" />
    </div>
</section>
@endif

<!-- Content Section -->
<section class="px-8 md:px-16 py-32 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="prose prose-lg max-w-none">
            {!! $service->content !!}
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="px-8 md:px-16 py-32 bg-surface">
    <div class="max-w-5xl mx-auto text-center">
        <div class="inline-block p-1 bg-primary-container/10 rounded-full mb-8">
            <div class="bg-primary text-on-primary px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">Let's Build</div>
        </div>
        <h2 class="text-5xl md:text-7xl font-extrabold text-primary font-headline tracking-tighter mb-8">
            Ready to build the future?
        </h2>
        <p class="text-xl text-on-surface-variant mb-12 max-w-2xl mx-auto">
            Bring your most ambitious concepts to our {{ $service->title }} and let's validate them together.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('contact') }}" class="bg-gradient-to-br from-primary to-primary-container text-on-primary px-10 py-5 rounded-xl text-lg font-bold hover:scale-105 transition-all duration-300 shadow-xl shadow-primary/20 inline-block">
                Book a Session
            </a>
            <a href="{{ route('product') }}" class="border border-outline-variant text-primary px-10 py-5 rounded-xl text-lg font-bold hover:bg-surface-container-low transition-all duration-300 inline-block">
                Explore Other Services
            </a>
        </div>
    </div>
</section>
@endsection