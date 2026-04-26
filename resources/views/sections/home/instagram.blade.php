@php
$posts = $data['posts'];
@endphp
<section class="py-16 md:py-32">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 md:gap-8 mb-8 md:mb-16" data-animate="fade-up">
            <div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black font-headline text-primary tracking-tight">{{ $data['title'] ?? 'Latest from Innovesia' }}</h2>
                <p class="text-on-surface-variant mt-2 text-sm md:text-base">{{ $data['subtitle'] ?? 'Join our conversation on @innovesia_id' }}</p>
            </div>
            <a href="{{ $data['button_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 px-4 md:px-6 py-2 rounded-full border border-outline-variant text-xs md:text-sm font-bold hover:bg-surface-container-low transition-colors">
                <span class="material-symbols-outlined text-lg">camera</span>
                {{ $data['button_text'] ?? 'Follow Us' }}
            </a>
        </div>
        <!-- Instagram Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6" data-animate="stagger">
            @foreach($posts as $post)
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all">
                <div class="aspect-square relative overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Instagram post" src="{{ $post['image'] }}" />
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-3xl">favorite</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-xs md:text-sm text-on-surface line-clamp-2 leading-relaxed mb-4">{{ $post['caption'] }}</p>
                    <div class="flex justify-between items-center text-[10px] font-bold text-outline font-label uppercase tracking-widest">
                        <span>{{ $post['time'] }}</span>
                        <span>Innovesia ID</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>