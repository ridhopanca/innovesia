@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">star</span>
            <h2 class="font-bold text-lg text-white">
                Home Hero Section
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

        <!-- Visibility Toggle -->
        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
            <div>
                <label class="text-sm font-semibold text-slate-700 block">Tampilkan Section</label>
                <p class="text-xs text-slate-500 mt-1">Hidupkan untuk menampilkan section ini di halaman</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="is_visible" class="sr-only peer"
                    {{ ($section->is_visible ?? true) ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
            </label>
        </div>

        <!-- Badge -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Badge Kecil</label>
            <input type="text" name="badge"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['badge'] ?? '' }}">
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
                placeholder="Contoh: Human Insight">
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
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Gambar Hero</label>

            <!-- Image Source Selection -->
            <div class="flex gap-4 mb-3">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="image_source" value="url" class="text-purple-600 focus:ring-purple-500"
                        {{ isset($data['image']) && !str_starts_with($data['image'], 'uploads/') ? 'checked' : '' }}
                        onchange="toggleImageSource(this, '{{ $section->id }}')">
                    <span class="text-sm text-slate-600">URL Link</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="image_source" value="upload" class="text-purple-600 focus:ring-purple-500"
                        {{ isset($data['image']) && str_starts_with($data['image'], 'uploads/') ? 'checked' : '' }}
                        onchange="toggleImageSource(this, '{{ $section->id }}')">
                    <span class="text-sm text-slate-600">Upload File</span>
                </label>
            </div>

            <!-- URL Input -->
            <div id="image-url-{{ $section->id }}" class="{{ isset($data['image']) && !str_starts_with($data['image'], 'uploads/') ? '' : 'hidden' }}">
                <input type="text" name="image" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    value="{{ isset($data['image']) && !str_starts_with($data['image'], 'uploads/') ? $data['image'] : '' }}"
                    placeholder="https://example.com/image.jpg">
            </div>

            <!-- File Input -->
            <div id="image-upload-{{ $section->id }}" class="{{ isset($data['image']) && !str_starts_with($data['image'], 'uploads/') ? 'hidden' : '' }}">
                <input type="file" name="image_file" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            @if(isset($data['image']))
            <p class="text-xs text-slate-500 mt-2">Draft: {{ $data['image'] }}</p>
            @endif
            @if($isPublished && isset($section->content['image']))
            <p class="text-xs text-green-600 mt-1">Published: {{ $section->content['image'] }}</p>
            @endif
        </div>

    </form>
</div>