@php
// Get featured project and latest project from database
$featuredProject = \App\Models\Project::published()->featured()->ordered()->first();
$latestProject = \App\Models\Project::published()
->when($featuredProject, function($query) use ($featuredProject) {
return $query->where('id', '!=', $featuredProject->id);
})
->ordered()
->first();
@endphp
<section class="py-16 md:py-32 bg-surface-container-high overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-black font-headline text-primary tracking-tighter mb-12 md:mb-20 text-center lg:text-left" data-animate="fade-up">{{ $data['title'] ?? 'Strategic Case Studies' }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-10" data-animate="stagger">
            @if($featuredProject)
            <div class="md:col-span-8 group relative rounded-3xl overflow-hidden aspect-[16/9] shadow-xl">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $featuredProject->title }}" src="{{ $featuredProject->image }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                <div class="absolute bottom-0 left-0 p-6 md:p-10">
                    <span class="text-white/70 text-[10px] md:text-xs font-bold font-label tracking-widest uppercase mb-2 block">{{ $featuredProject->category }}</span>
                    <h4 class="text-xl md:text-3xl font-bold text-white font-headline">{{ $featuredProject->title }}</h4>
                </div>
            </div>
            @endif
            @if($latestProject)
            <div class="md:col-span-4 group relative rounded-3xl overflow-hidden aspect-[1/1] md:aspect-auto shadow-xl">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $latestProject->title }}" src="{{ $latestProject->image }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                <div class="absolute bottom-0 left-0 p-6 md:p-8">
                    <span class="text-white/70 text-[10px] md:text-xs font-bold font-label tracking-widest uppercase mb-2 block">{{ $latestProject->category }}</span>
                    <h4 class="text-lg md:text-xl font-bold text-white font-headline">{{ $latestProject->title }}</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>