<section class="max-w-7xl mx-auto px-4 md:px-8 py-20 md:py-40 text-center" data-animate="fade-up">
    @if(isset($data['title']))
    <h2 class="text-3xl md:text-4xl lg:text-6xl font-black text-primary tracking-tighter mb-6 md:mb-8">{{ $data['title'] }}</h2>
    @endif
    @if(isset($data['description']))
    <p class="text-on-surface-variant text-base md:text-xl max-w-2xl mx-auto mb-8 md:mb-12">{{ $data['description'] }}</p>
    @endif
    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
        @if(isset($data['primary_button']))
        <button class="bg-primary text-white px-6 md:px-10 py-3 md:py-4 rounded-xl font-bold text-base md:text-lg shadow-xl hover:scale-105 transition-transform w-full sm:w-auto">{{ $data['primary_button'] }}</button>
        @endif
        @if(isset($data['secondary_button']))
        <button class="px-6 md:px-10 py-3 md:py-4 rounded-xl font-bold text-base md:text-lg border border-outline-variant hover:bg-surface-container-high transition-colors w-full sm:w-auto">{{ $data['secondary_button'] }}</button>
        @endif
    </div>
</section>