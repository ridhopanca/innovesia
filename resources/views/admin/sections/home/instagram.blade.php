@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($data);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">photo_camera</span>
            <h2 class="font-bold text-lg text-white">
                Instagram Section
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

        <!-- Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Judul Besar</label>
            <input type="text" name="title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['title'] ?? '' }}">
        </div>

        <!-- Subtitle -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Subtitle</label>
            <input type="text" name="subtitle"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['subtitle'] ?? '' }}">
        </div>

        <!-- Button Text -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Teks Tombol</label>
            <input type="text" name="button_text"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['button_text'] ?? '' }}">
        </div>

        <!-- Posts -->
        <div class="space-y-4">
            <h3 class="font-semibold text-slate-700">Posts</h3>
            @foreach(($data['posts'] ?? []) as $index => $post)
            <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                        <input type="text" name="posts[{{ $index }}][image]"
                            value="{{ $post['image'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Caption</label>
                        <textarea name="posts[{{ $index }}][caption]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            rows="3">{{ $post['caption'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Time</label>
                        <input type="text" name="posts[{{ $index }}][time]"
                            value="{{ $post['time'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </form>
</div>