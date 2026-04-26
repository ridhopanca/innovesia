<section class="bg-surface-container-low py-16 md:py-24 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        @if(isset($data['title']))
        <h2 class="text-2xl md:text-3xl font-bold text-primary mb-8 md:mb-12">{{ $data['title'] }}</h2>
        @endif
        <div class="grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-2 md:gap-4 h-[400px] md:h-[600px]">
            @foreach(($data['images'] ?? []) as $index => $image)
            <div class="md:col-span-{{ $index === 0 ? '2' : '1' }} md:row-span-{{ $index === 2 ? '2' : '1' }} relative overflow-hidden rounded-xl">
                <img class="object-cover w-full h-full hover:scale-105 transition-transform duration-700" src="{{ $image }}" alt="Gallery image {{ $index + 1 }}" />
            </div>
            @endforeach
        </div>
    </div>
</section>