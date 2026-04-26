@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);

// Handle tags - could be array or comma-separated string
$rawTags = $data['tags'] ?? [];
if (is_string($rawTags)) {
$tags = array_filter(array_map('trim', explode(',', $rawTags)));
} else {
$tags = $rawTags;
}
$activeFilter = $data['active_filter'] ?? 'all';
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">article</span>
            <h2 class="font-bold text-lg text-white">
                Article Header Section
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

    <form class="section-form p-6 space-y-5" data-id="{{ $section->id }}" data-section-type="article-header">

        <!-- Subtitle -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Subtitle</label>
            <input type="text" name="subtitle"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['subtitle'] ?? '' }}">
        </div>

        <!-- Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Judul Utama</label>
            <input type="text" name="title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['title'] ?? '' }}">
        </div>

        <!-- Title Highlight (bagian berwarna) -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Judul Highlight (bagian berwarna)</label>
            <input type="text" name="title_highlight"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['title_highlight'] ?? '' }}"
                placeholder="Contoh: Insights">
        </div>

        <!-- Tags -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Tags (comma separated)</label>
            <input type="text" name="tags" id="tags-input"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ implode(', ', $tags) }}"
                placeholder="Teknologi, Bisnis, Marketing, dll">
            <input type="hidden" name="active_filter" id="active-filter" value="{{ $activeFilter }}">
            <p class="text-xs text-slate-400 mt-2">
                <span class="material-icons-outlined text-xs align-middle">info</span>
                Tag yang diisi di atas akan otomatis muncul sebagai filter di halaman utama.
            </p>
        </div>

    </form>
</div>