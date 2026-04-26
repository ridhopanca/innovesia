<section class="bg-surface-container-low py-16 md:py-24 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        @if(isset($data['title']))
        <h2 class="text-2xl md:text-3xl font-bold text-primary mb-8 md:mb-12">{{ $data['title'] }}</h2>
        @endif
        @php
        $images = $data['images'] ?? [];
        // Chunk images into groups of 4 for the bento grid layout
        $imageGroups = array_chunk($images, 4);
        @endphp
        @foreach($imageGroups as $groupIndex => $group)
        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-2 md:gap-4 h-[400px] md:h-[600px] {{ $groupIndex > 0 ? 'mt-4 md:mt-8' : '' }}">
            @foreach($group as $index => $image)
            @php
            $actualIndex = ($groupIndex * 4) + $index;
            $imageUrl = is_array($image) ? ($image['url'] ?? '') : $image;
            $imageTitle = is_array($image) ? ($image['title'] ?? '') : '';
            $imageAlt = $imageTitle ?: 'Gallery image ' . ($actualIndex + 1);
            @endphp
            <div class="md:col-span-{{ $index === 0 ? '2' : '1' }} md:row-span-{{ $index === 0 ? '2' : ($index === 2 ? '2' : '1') }} relative overflow-hidden rounded-xl group">
                <img class="object-cover w-full h-full hover:scale-105 transition-transform duration-700" src="{{ $imageUrl }}" alt="{{ $imageAlt }}" />
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>