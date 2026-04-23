@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">groups</span>
            <h2 class="font-bold text-lg text-white">
                Community Hero Section
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

        <!-- Badge -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Badge</label>
            <input type="text" name="badge"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['badge'] ?? '' }}">
        </div>

        <!-- Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Judul Besar</label>
            <input type="text" name="title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['title'] ?? '' }}">
        </div>

        <!-- Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Deskripsi</label>
            <textarea name="description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['description'] ?? '' }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Button Utama</label>
                <input type="text" name="primary_button"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    value="{{ $data['primary_button'] ?? '' }}">
            </div>

            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Button Kedua</label>
                <input type="text" name="secondary_button"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    value="{{ $data['secondary_button'] ?? '' }}">
            </div>
        </div>

        <!-- Image -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Gambar</label>
            <input type="text" name="image"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['image'] ?? '' }}">
        </div>

    </form>
</div>
