@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">cases</span>
            <h2 class="font-bold text-lg text-white">
                Case Section
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

        <!-- Featured -->
        <div class="border p-4 rounded bg-white">
            <h3 class="font-semibold mb-3">Featured Project</h3>

            <div class="space-y-3">
                <div>
                    <label class="text-sm">Category</label>
                    <input type="text" name="featured[category]"
                        value="{{ $data['featured']['category'] ?? '' }}"
                        class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="text-sm">Title</label>
                    <input type="text" name="featured[title]"
                        value="{{ $data['featured']['title'] ?? '' }}"
                        class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="text-sm">Description</label>
                    <textarea name="featured[description]"
                        class="w-full border p-2 rounded"
                        rows="3">{{ $data['featured']['description'] ?? '' }}</textarea>
                </div>

                <div>
                    <label class="text-sm">Image</label>
                    <input type="text" name="featured[image]"
                        value="{{ $data['featured']['image'] ?? '' }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm">Metric 1 Value</label>
                        <input type="text" name="featured[metrics][0][value]"
                            value="{{ $data['featured']['metrics'][0]['value'] ?? '' }}"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="text-sm">Metric 1 Label</label>
                        <input type="text" name="featured[metrics][0][label]"
                            value="{{ $data['featured']['metrics'][0]['label'] ?? '' }}"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="text-sm">Metric 2 Value</label>
                        <input type="text" name="featured[metrics][1][value]"
                            value="{{ $data['featured']['metrics'][1]['value'] ?? '' }}"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="text-sm">Metric 2 Label</label>
                        <input type="text" name="featured[metrics][1][label]"
                            value="{{ $data['featured']['metrics'][1]['label'] ?? '' }}"
                            class="w-full border p-2 rounded">
                    </div>
                </div>
            </div>
        </div>

        <!-- Cases -->
        <div class="space-y-4">
            <h3 class="font-semibold text-slate-700">Other Cases</h3>
            @foreach(($data['cases'] ?? []) as $index => $case)
            <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Category</label>
                        <input type="text" name="cases[{{ $index }}][category]"
                            value="{{ $case['category'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                        <input type="text" name="cases[{{ $index }}][title]"
                            value="{{ $case['title'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                        <textarea name="cases[{{ $index }}][description]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            rows="3">{{ $case['description'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                        <input type="text" name="cases[{{ $index }}][image]"
                            value="{{ $case['image'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Highlight -->
        <div class="space-y-4">
            <h3 class="font-semibold text-slate-700">Highlight</h3>
            <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
                <div class="space-y-3">
                    <div>
                        <label class="text-sm">Title</label>
                        <input type="text" name="highlight[title]"
                            value="{{ $data['highlight']['title'] ?? '' }}"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="text-sm">Description</label>
                        <textarea name="highlight[description]"
                            class="w-full border p-2 rounded"
                            rows="3">{{ $data['highlight']['description'] ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm">Metric Value</label>
                            <input type="text" name="highlight[metric]"
                                value="{{ $data['highlight']['metric'] ?? '' }}"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label class="text-sm">Metric Label</label>
                            <input type="text" name="highlight[metric_label]"
                                value="{{ $data['highlight']['metric_label'] ?? '' }}"
                                class="w-full border p-2 rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>