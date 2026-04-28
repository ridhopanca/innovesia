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

        <!-- Button URL -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">URL Tombol</label>
            <input type="text" name="button_url"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['button_url'] ?? '' }}"
                placeholder="https://instagram.com/innovesia_id">
        </div>

        <!-- Posts -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-slate-700">Posts</h3>
                <button type="button" onclick="addInstagramPost()" class="text-sm bg-purple-100 text-purple-700 px-3 py-1.5 rounded-lg hover:bg-purple-200 transition-colors">
                    + Add Post
                </button>
            </div>
            <div id="posts-container">
                @foreach(($data['posts'] ?? []) as $index => $post)
                <div class="post-item border border-slate-200 p-4 mb-2 rounded-xl bg-slate-50 relative">
                    <button type="button" onclick="removeInstagramPost(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-icons-outlined">close</span>
                    </button>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                            <input type="text" name="posts[{{ $index }}][image]"
                                value="{{ $post['image'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Link (URL)</label>
                            <input type="text" name="posts[{{ $index }}][link]"
                                value="{{ $post['link'] ?? '#' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="https://instagram.com/p/...">
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
        </div>

    </form>
</div>

<script>
    let postIndex = `{{ count($data['posts'] ?? [])}}`;

    function addInstagramPost() {
        const container = document.getElementById('posts-container');
        const postHtml = `
            <div class="post-item border border-slate-200 p-4 rounded-xl bg-slate-50 relative">
                <button type="button" onclick="removeInstagramPost(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-icons-outlined">close</span>
                </button>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                        <input type="text" name="posts[${postIndex}][image]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Link (URL)</label>
                        <input type="text" name="posts[${postIndex}][link]"
                            value="#"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="https://instagram.com/p/...">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Caption</label>
                        <textarea name="posts[${postIndex}][caption]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            rows="3"></textarea>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Time</label>
                        <input type="text" name="posts[${postIndex}][time]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', postHtml);
        postIndex++;
    }

    function removeInstagramPost(button) {
        button.closest('.post-item').remove();
    }
</script>