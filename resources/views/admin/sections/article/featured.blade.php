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
                Featured Article Section
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

        <!-- Read Time -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Read Time</label>
            <input type="text" name="read_time"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['read_time'] ?? '' }}">
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

        <!-- Full Content -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Full Content</label>
            <textarea name="content"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono text-sm"
                rows="8" placeholder="Isi lengkap artikel (HTML atau plain text). Default: Lorem ipsum...">{{ $data['content'] ?? '' }}</textarea>
            <p class="text-xs text-slate-400 mt-1">Konten lengkap untuk halaman detail artikel</p>
        </div>

        <!-- Image -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Gambar</label>
            <input type="text" name="image"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['image'] ?? '' }}">
        </div>

        <!-- Slug -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Slug (Auto-generated dari Title)</label>
            <input type="text" name="slug"
                value="{{ $data['slug'] ?? '' }}"
                placeholder="/artikel/judul-artikel"
                class="slug-field w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm font-mono text-slate-600"
                readonly>
            <p class="text-xs text-slate-400 mt-1">Slug otomatis dibuat dari judul artikel</p>
        </div>

        <!-- Author -->
        <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
            <h3 class="font-semibold text-slate-700 mb-3">Author</h3>

            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Name</label>
                    <input type="text" name="author[name]"
                        value="{{ $data['author']['name'] ?? '' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Role</label>
                    <input type="text" name="author[role]"
                        value="{{ $data['author']['role'] ?? '' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                    <input type="text" name="author[image]"
                        value="{{ $data['author']['image'] ?? '' }}"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>
            </div>
        </div>

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[data-id="{{ $section->id }}"]');
        if (!form) return;

        const titleInput = form.querySelector('input[name="title"]');
        const slugInput = form.querySelector('input[name="slug"]');
        let slugEditedManually = false;

        function generateSlug(text) {
            if (!text) return '';
            return '/artikel/' + text.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '')
                .substring(0, 100);
        }

        if (titleInput && slugInput) {
            // Generate slug on input
            titleInput.addEventListener('input', function() {
                if (!slugEditedManually && this.value.trim()) {
                    slugInput.value = generateSlug(this.value.trim());
                }
            });

            // Generate slug on blur (when leaving field)
            titleInput.addEventListener('blur', function() {
                if (!slugEditedManually && this.value.trim()) {
                    slugInput.value = generateSlug(this.value.trim());
                }
            });

            // Mark as manually edited if user types in slug field
            slugInput.addEventListener('input', function() {
                slugEditedManually = true;
            });

            // Initial generation if title exists but slug is empty
            if (titleInput.value.trim() && !slugInput.value.trim()) {
                slugInput.value = generateSlug(titleInput.value.trim());
            }
        }
    });
</script>