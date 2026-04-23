<section class="bg-surface-container-low py-24 px-8">
    <div class="max-w-7xl mx-auto">
        @if(isset($data['title']))
        <h2 class="text-3xl font-bold text-primary mb-12">{{ $data['title'] }}</h2>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[600px]">
            @foreach(($data['images'] ?? []) as $index => $image)
            <div class="md:col-span-{{ $index === 0 ? '2' : '1' }} md:row-span-{{ $index === 2 ? '2' : '1' }} relative overflow-hidden rounded-xl">
                <img class="object-cover w-full h-full hover:scale-105 transition-transform duration-700" src="{{ $image }}" alt="Gallery image {{ $index + 1 }}" />
            </div>
            @endforeach
        </div>
    </div>
</section>