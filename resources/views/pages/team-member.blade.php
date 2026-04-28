@extends('layouts.app')

@section('main_classes', 'pt-24')
@section('footer_classes', 'w-full')

@section('content')
<!-- Hero Section -->
<section class="px-8 md:px-16 py-20 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row gap-12 items-start">
            <div class="w-full md:w-2/3">
                <span class="label-md uppercase tracking-[0.1em] font-label text-outline text-xs mb-4 block">{{ $member->category }}</span>
                <h1 class="text-6xl md:text-8xl font-extrabold text-primary font-headline tracking-tighter leading-[0.9] mb-8">
                    {{ $member->name }}
                </h1>
                <p class="text-xl md:text-2xl text-on-surface-variant font-light leading-relaxed max-w-2xl">
                    {{ $member->role }}
                </p>
            </div>
            <div class="w-full md:w-1/3 pt-12">
                <div class="bg-surface-container-low p-8 rounded-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                    <h3 class="font-bold text-primary mb-2">Expertise</h3>
                    <p class="text-sm text-on-secondary-container">{{ $member->category }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visual Anchor -->
@if($member->image)
<section class="px-8 md:px-16">
    <div class="max-w-7xl mx-auto rounded-xl overflow-hidden shadow-2xl h-[500px]">
        <img alt="{{ $member->name }}" class="w-full h-full object-cover" src="{{ $member->image }}" />
    </div>
</section>
@endif

<!-- Bio Section -->
<section class="px-8 md:px-16 py-32 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="prose prose-lg max-w-none">
            <p class="text-xl text-on-surface-variant leading-relaxed">
                {{ $member->bio }}
            </p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="px-8 md:px-16 py-32 bg-surface">
    <div class="max-w-5xl mx-auto text-center">
        <div class="inline-block p-1 bg-primary-container/10 rounded-full mb-8">
            <div class="bg-primary text-on-primary px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">Join Our Team</div>
        </div>
        <h2 class="text-5xl md:text-7xl font-extrabold text-primary font-headline tracking-tighter mb-8">
            Ready to make an impact?
        </h2>
        <p class="text-xl text-on-surface-variant mb-12 max-w-2xl mx-auto">
            Join our collective of innovators and help shape the future of human-centered design.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('contact') }}" class="bg-gradient-to-br from-primary to-primary-container text-on-primary px-10 py-5 rounded-xl text-lg font-bold hover:scale-105 transition-all duration-300 shadow-xl shadow-primary/20 inline-block">
                Get in Touch
            </a>
            <a href="{{ route('collective-structure') }}" class="border border-outline-variant text-primary px-10 py-5 rounded-xl text-lg font-bold hover:bg-surface-container-low transition-all duration-300 inline-block">
                Meet the Team
            </a>
        </div>
    </div>
</section>
@endsection
