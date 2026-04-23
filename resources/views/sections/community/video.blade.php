<section class="bg-primary-container py-24 px-8 overflow-hidden">
    <div class="max-w-5xl mx-auto text-center">
        @if(isset($data['title']))
        <h2 class="text-3xl font-bold text-on-primary-container mb-12">{{ $data['title'] }}</h2>
        @endif
        @if(isset($data['image']))
        <div class="relative aspect-video rounded-xl overflow-hidden shadow-2xl group cursor-pointer">
            <img class="object-cover w-full h-full brightness-75 group-hover:brightness-50 transition-all" src="{{ $data['image'] }}" alt="Video thumbnail" />
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                </div>
            </div>
            <div class="absolute bottom-8 left-8 text-left">
                @if(isset($data['video_title']))
                <p class="text-white font-bold text-xl">{{ $data['video_title'] }}</p>
                @endif
                @if(isset($data['video_subtitle']))
                <p class="text-on-primary-container text-sm">{{ $data['video_subtitle'] }}</p>
                @endif
            </div>
        </div>
        @endif
    </div>
</section>