@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($data);
$isPublished = !empty($section->content);

// Default metrics if empty
if (empty($data['items'])) {
$data['items'] = [
['label' => 'Global Impact', 'value' => '500+', 'desc' => 'Innovation Projects'],
['label' => 'Network', 'value' => '120+', 'desc' => 'Corporate Partners'],
['label' => 'Footprint', 'value' => '15', 'desc' => 'Major Hub Cities'],
['label' => 'Success Rate', 'value' => '92%', 'desc' => 'Client Satisfaction']
];
}
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">analytics</span>
            <h2 class="font-bold text-lg text-white">
                Metrics Section
            </h2>
        </div>
        <div class="flex gap-2">
            @if($isPublished)
            <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-100 text-xs font-semibold">Published</span>
            @endif
            @if($hasDraft)
            <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-100 text-xs font-semibold">Draft</span>
            @endif
        </div>
    </div>

    <form class="section-form p-6 space-y-5" data-id="{{ $section->id }}">

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-slate-700">Metrics</h3>
                <button type="button" onclick="addMetric()" class="text-sm bg-purple-100 text-purple-700 px-3 py-1.5 rounded-lg hover:bg-purple-200 transition-colors">
                    + Add Metric
                </button>
            </div>
            <div id="metrics-container">
                @foreach(($data['items'] ?? []) as $index => $item)
                <div class="metric-item border border-slate-200 p-4 mb-2 rounded-xl bg-slate-50 relative">
                    <button type="button" onclick="removeMetric(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-icons-outlined">close</span>
                    </button>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Label</label>
                            <input type="text" name="items[{{ $index }}][label]"
                                value="{{ $item['label'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Value</label>
                            <input type="text" name="items[{{ $index }}][value]"
                                value="{{ $item['value'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                            <input type="text" name="items[{{ $index }}][desc]"
                                value="{{ $item['desc'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </form>
</div>

<script>
    let metricIndex = `{{ count($data['items'] ?? [])}}`;

    function addMetric() {
        const container = document.getElementById('metrics-container');
        const metricHtml = `
            <div class="metric-item border border-slate-200 p-4 rounded-xl bg-slate-50 relative">
                <button type="button" onclick="removeMetric(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-icons-outlined">close</span>
                </button>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Label</label>
                        <input type="text" name="items[${metricIndex}][label]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Value</label>
                        <input type="text" name="items[${metricIndex}][value]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                        <input type="text" name="items[${metricIndex}][desc]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', metricHtml);
        metricIndex++;
    }

    function removeMetric(button) {
        button.closest('.metric-item').remove();
    }
</script>