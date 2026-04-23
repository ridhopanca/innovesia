<section class="py-24 px-8 bg-surface">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-20" data-animate="fade-up">
            @if(isset($data['title']))
            <h2 class="text-4xl font-bold text-primary tracking-tight">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['subtitle']))
            <p class="text-on-surface-variant mt-4">{{ $data['subtitle'] }}</p>
            @endif
        </div>
        <div class="relative space-y-12" data-animate="stagger">
            <!-- Vertical Line (Subtle) -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-px bg-outline-variant/30 hidden md:block"></div>
            @foreach(($data['events'] ?? []) as $index => $event)
            <div class="flex flex-col md:flex-row items-center gap-8 relative {{ $event['status'] === 'completed' ? '' : ($event['status'] === 'next' ? '' : 'opacity-50') }}">
                <div class="flex-1 text-right hidden md:block">
                    @if($event['status'] === 'completed')
                    <h4 class="text-xl font-bold text-primary">{{ $event['school'] ?? '' }}</h4>
                    <p class="text-sm text-on-surface-variant font-label uppercase tracking-widest">Completed</p>
                    @elseif($event['status'] === 'next')
                    <div class="bg-primary text-on-primary inline-block px-4 py-2 rounded-xl">
                        <h4 class="text-xl font-bold">{{ $event['school'] ?? '' }}</h4>
                        <p class="text-xs font-label uppercase tracking-widest opacity-80">Next Session</p>
                    </div>
                    @else
                    <h4 class="text-lg font-medium text-on-surface">{{ $event['school'] ?? '' }}</h4>
                    @endif
                </div>
                <div class="w-12 h-12 rounded-full {{ $event['status'] === 'completed' ? 'bg-primary-container' : ($event['status'] === 'next' ? 'bg-white border-4 border-primary-container animate-pulse' : 'bg-surface-variant') }} border-4 border-white shadow-lg z-10 flex items-center justify-center">
                    @if($event['status'] === 'completed')
                    <span class="material-symbols-outlined text-white text-sm">check</span>
                    @elseif($event['status'] === 'next')
                    <div class="w-2 h-2 rounded-full bg-primary-container"></div>
                    @endif
                </div>
                <div class="flex-1 {{ $event['status'] === 'completed' ? 'bg-surface-container-low' : '' }} p-6 rounded-xl w-full">
                    <span class="text-xs font-bold text-primary-container uppercase tracking-tighter block mb-1">{{ $event['date'] ?? '' }}</span>
                    <h4 class="text-xl font-bold text-primary md:hidden">{{ $event['school'] ?? '' }}</h4>
                    <p class="text-on-surface-variant text-sm mt-2">{{ $event['description'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>