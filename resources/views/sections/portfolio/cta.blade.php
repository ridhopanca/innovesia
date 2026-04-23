<section class="max-w-7xl mx-auto px-8 py-40 text-center" data-animate="fade-up">
    @if(isset($data['title']))
    <h2 class="text-6xl font-black text-primary tracking-tighter mb-8">{{ $data['title'] }}</h2>
    @endif
    @if(isset($data['description']))
    <p class="text-on-surface-variant text-xl max-w-2xl mx-auto mb-12">{{ $data['description'] }}</p>
    @endif
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        @if(isset($data['primary_button']))
        <button class="bg-primary text-white px-10 py-4 rounded-xl font-bold shadow-xl hover:scale-105 transition-transform">{{ $data['primary_button'] }}</button>
        @endif
        @if(isset($data['secondary_button']))
        <button class="px-10 py-4 rounded-xl font-bold border border-outline-variant hover:bg-surface-container-high transition-colors">{{ $data['secondary_button'] }}</button>
        @endif
    </div>
</section>