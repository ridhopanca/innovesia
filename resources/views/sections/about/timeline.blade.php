<section class="bg-surface-container-low py-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-8">
        @if(isset($data['title']))
        <h2 class="text-4xl font-bold font-headline mb-20 text-center" data-animate="fade-up">
            {{ $data['title'] }}
        </h2>
        @endif
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gradient-to-b from-primary via-secondary to-tertiary"></div>

            @foreach(($data['milestones'] ?? []) as $index => $milestone)
            @if($index % 2 == 0)
            <!-- Left aligned -->
            <div class="relative flex items-center justify-between mb-16" data-animate="fade-up">
                <div class="w-5/12 text-right pr-8">
                    <h3 class="text-2xl font-bold font-headline mb-2">{{ $milestone['year'] ?? '' }}</h3>
                    <p class="text-on-surface-variant">{{ $milestone['description'] ?? '' }}</p>
                </div>
                <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-primary rounded-full border-4 border-surface-container-low"></div>
                <div class="w-5/12 pl-8"></div>
            </div>
            @else
            <!-- Right aligned -->
            <div class="relative flex items-center justify-between mb-16" data-animate="fade-up">
                <div class="w-5/12 pr-8"></div>
                <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-secondary rounded-full border-4 border-surface-container-low"></div>
                <div class="w-5/12 text-left pl-8">
                    <h3 class="text-2xl font-bold font-headline mb-2">{{ $milestone['year'] ?? '' }}</h3>
                    <p class="text-on-surface-variant">{{ $milestone['description'] ?? '' }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>