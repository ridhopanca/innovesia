@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($data);
$isPublished = !empty($section->content);
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

        @foreach($data['items'] ?? [] as $index => $item)
        <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">

            <label class="text-sm font-medium text-slate-600 mb-2 block">Label</label>
            <input type="text" name="items[{{ $index }}][label]"
                value="{{ $item['label'] ?? '' }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mb-3">

            <label class="text-sm font-medium text-slate-600 mb-2 block">Value</label>
            <input type="text" name="items[{{ $index }}][value]"
                value="{{ $item['value'] ?? '' }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mb-3">

            <label class="text-sm font-medium text-slate-600 mb-2 block">Deskripsi</label>
            <input type="text" name="items[{{ $index }}][desc]"
                value="{{ $item['desc'] ?? '' }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">

        </div>
        @endforeach

    </form>
</div>