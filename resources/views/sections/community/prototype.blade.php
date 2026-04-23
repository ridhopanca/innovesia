<section class="py-24 px-8 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-end mb-16">
            <div>
                @if(isset($data['title']))
                <h2 class="text-4xl font-bold text-primary tracking-tight">{{ $data['title'] }}</h2>
                @endif
                @if(isset($data['subtitle']))
                <p class="text-on-surface-variant mt-2">{{ $data['subtitle'] }}</p>
                @endif
            </div>
            <div class="hidden md:block">
                <span class="text-sm font-label font-bold text-primary-container">SCROLL TO EXPLORE →</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" data-animate="stagger">
            @foreach(($data['projects'] ?? []) as $project)
            <div class="group">
                <div class="relative overflow-hidden rounded-xl aspect-video mb-6">
                    <img class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500" src="{{ $project['image'] ?? '' }}" alt="{{ $project['title'] ?? '' }}" />
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                <h4 class="text-xl font-bold text-primary">{{ $project['title'] ?? '' }}</h4>
                <p class="text-on-surface-variant mt-2 leading-relaxed">{{ $project['description'] ?? '' }}</p>
                <div class="mt-4 flex gap-2">
                    @if(isset($project['category']))
                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-bold rounded-full uppercase tracking-widest">{{ $project['category'] }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>