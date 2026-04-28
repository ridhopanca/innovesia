@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">visibility</span>
            <h2 class="font-bold text-lg text-white">
                Vision & Mission Section
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

        <!-- Mission -->
        <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
            <h3 class="font-semibold text-slate-700 mb-3">Mission</h3>

            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Icon</label>
                    <input type="text" name="mission[icon]"
                        value="{{ $data['mission']['icon'] ?? 'rocket_launch' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                    <input type="text" name="mission[title]"
                        value="{{ $data['mission']['title'] ?? '' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                    <textarea name="mission[description]"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        rows="3">{{ $data['mission']['description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Vision -->
        <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
            <h3 class="font-semibold text-slate-700 mb-3">Vision</h3>

            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Icon</label>
                    <input type="text" name="vision[icon]"
                        value="{{ $data['vision']['icon'] ?? 'visibility' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                    <input type="text" name="vision[title]"
                        value="{{ $data['vision']['title'] ?? '' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                    <textarea name="vision[description]"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        rows="3">{{ $data['vision']['description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

    </form>
</div>