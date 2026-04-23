<section class="max-w-7xl mx-auto px-8 mb-40">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-animate="stagger">
        <!-- Large Feature Card -->
        @if(isset($data['featured']))
        <div class="md:col-span-2 group relative overflow-hidden rounded-xl bg-surface-container-lowest transition-all hover:shadow-2xl">
            <div class="h-[500px] w-full overflow-hidden">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $data['featured']['image'] ?? '' }}" alt="{{ $data['featured']['title'] ?? '' }}" />
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent p-10 flex flex-col justify-end text-white">
                <span class="bg-secondary-container/20 backdrop-blur-md text-on-secondary-fixed text-xs px-3 py-1 rounded-full w-fit mb-4 font-label">{{ $data['featured']['category'] ?? '' }}</span>
                <h3 class="text-4xl font-bold mb-2">{{ $data['featured']['title'] ?? '' }}</h3>
                <p class="text-on-primary-container max-w-md mb-6 opacity-90">{{ $data['featured']['description'] ?? '' }}</p>
                <div class="flex gap-12">
                    @foreach(($data['featured']['metrics'] ?? []) as $metric)
                    <div>
                        <span class="block text-2xl font-bold">{{ $metric['value'] ?? '' }}</span>
                        <span class="text-[10px] uppercase tracking-widest opacity-70">{{ $metric['label'] ?? '' }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!-- Secondary Cards -->
        @foreach(($data['cases'] ?? []) as $index => $case)
        @if($index === 0)
        <div class="bg-surface-container-lowest rounded-xl overflow-hidden group hover:shadow-xl transition-all">
            <div class="h-64 overflow-hidden">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ $case['image'] ?? '' }}" alt="{{ $case['title'] ?? '' }}" />
            </div>
            <div class="p-8">
                <span class="text-xs font-label text-on-secondary-container mb-2 block">{{ $case['category'] ?? '' }}</span>
                <h4 class="text-2xl font-bold text-primary mb-3">{{ $case['title'] ?? '' }}</h4>
                <p class="text-sm text-on-surface-variant leading-relaxed mb-6">{{ $case['description'] ?? '' }}</p>
                <div class="pt-6 border-t border-surface-container flex justify-between items-center">
                    <span class="text-xs font-bold uppercase tracking-tighter">View Case Study</span>
                    <span class="material-symbols-outlined text-primary text-lg">arrow_forward</span>
                </div>
            </div>
        </div>
        @elseif($index === 1)
        <div class="bg-primary-container rounded-xl p-8 flex flex-col justify-between group cursor-pointer hover:bg-primary transition-colors">
            <div>
                <span class="material-symbols-outlined text-on-primary-container text-4xl mb-6">rocket_launch</span>
                <h4 class="text-2xl font-bold text-white mb-4">{{ $case['title'] ?? '' }}</h4>
                <p class="text-on-primary-container/80 text-sm leading-relaxed">{{ $case['description'] ?? '' }}</p>
            </div>
        </div>
        @endif
        @endforeach
        <!-- Highlight -->
        @if(isset($data['highlight']))
        <div class="md:col-span-2 bg-surface-container-low rounded-xl overflow-hidden flex flex-col md:flex-row group border-none">
            <div class="md:w-1/2 p-10 flex flex-col justify-center">
                <span class="font-label text-xs text-on-secondary-container mb-4">HIGHLIGHT</span>
                <h3 class="text-3xl font-bold text-primary mb-4 leading-tight">{{ $data['highlight']['title'] ?? '' }}</h3>
                <p class="text-on-surface-variant text-sm leading-loose mb-8">{{ $data['highlight']['description'] ?? '' }}</p>
                <button class="w-fit px-6 py-2 border border-outline-variant rounded-full text-xs font-bold hover:bg-primary hover:text-white transition-all">READ FULL STORY</button>
            </div>
            <div class="md:w-1/2 h-full min-h-[300px]">
                <img class="w-full h-full object-cover" src="{{ $data['highlight']['image'] ?? '' }}" alt="{{ $data['highlight']['title'] ?? '' }}" />
            </div>
        </div>
        @endif
    </div>
</section>