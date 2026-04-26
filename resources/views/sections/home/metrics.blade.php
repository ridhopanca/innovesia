@php
$items = $data['items'] ?? [
['label' => 'Global Impact', 'value' => '500+', 'desc' => 'Innovation Projects'],
['label' => 'Network', 'value' => '120+', 'desc' => 'Corporate Partners'],
['label' => 'Footprint', 'value' => '15', 'desc' => 'Major Hub Cities'],
['label' => 'Success Rate', 'value' => '92%', 'desc' => 'Client Satisfaction']
];
@endphp
<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8" data-animate="stagger">
            @foreach($items as $item)
            <div class="p-8 bg-surface-container-lowest rounded-2xl transition-all hover:translate-y-[-4px]">
                <div class="text-xs font-bold text-outline uppercase tracking-widest mb-2 font-label">{{ $item['label'] }}</div>
                <div class="text-4xl font-black text-primary font-headline">{{ $item['value'] }}</div>
                <div class="text-sm text-on-surface-variant mt-1">{{ $item['desc'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>