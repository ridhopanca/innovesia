@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);

// Auto-generate tags from unique article categories
$allCategories = [];
foreach(($data['articles'] ?? []) as $article) {
if (!empty($article['category'])) {
$allCategories[] = $article['category'];
}
}
$autoTags = array_unique($allCategories);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">view_list</span>
            <h2 class="font-bold text-lg text-white">
                Article Grid Section
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

    <form class="section-form p-6 space-y-5" data-id="{{ $section->id }}" data-section-type="article-grid">

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

        <!-- Auto-generated Tags Preview -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Tags (Otomatis dari Kategori)</label>
            <div class="flex flex-wrap gap-2 p-3 bg-slate-50 rounded-xl border border-slate-200 min-h-[48px]">
                @forelse($autoTags as $tag)
                <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-sm font-medium">{{ $tag }}</span>
                @empty
                <span class="text-slate-400 text-sm italic">Tags akan muncul otomatis dari kategori artikel</span>
                @endforelse
            </div>
            <input type="hidden" name="tags" value="{{ implode(', ', $autoTags) }}">
        </div>

        <!-- Articles -->
        <div class="space-y-4" id="articles-container">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-slate-700">Articles</h3>
                <button type="button" onclick="addArticleItem()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors flex items-center gap-2 text-sm">
                    <span class="material-icons-outlined text-sm">add</span>
                    Tambah Artikel
                </button>
            </div>
            @foreach(($data['articles'] ?? []) as $index => $article)
            <div class="article-item border border-slate-200 p-4 rounded-xl bg-slate-50" data-index="{{ $index }}">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium text-slate-500">Artikel #<span class="article-number">{{ $index + 1 }}</span></span>
                    <button type="button" onclick="removeArticleItem(this)" class="text-red-500 hover:text-red-700 transition-colors">
                        <span class="material-icons-outlined">delete</span>
                    </button>
                </div>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Category</label>
                        <input type="text" name="articles[{{ $index }}][category]"
                            value="{{ $article['category'] ?? '' }}"
                            class="article-category w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            onchange="updateTags()">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Read Time</label>
                        <input type="text" name="articles[{{ $index }}][read_time]"
                            value="{{ $article['read_time'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                        <input type="text" name="articles[{{ $index }}][title]"
                            value="{{ $article['title'] ?? '' }}"
                            class="article-title w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            onchange="generateSlug(this)"
                            onblur="generateSlug(this)">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Slug (Auto-generated dari Title)</label>
                        <input type="text" name="articles[{{ $index }}][slug]"
                            value="{{ $article['slug'] ?? '' }}"
                            placeholder="/artikel/judul-artikel"
                            class="article-slug w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm font-mono text-slate-600"
                            readonly>
                        <p class="text-xs text-slate-400 mt-1">Slug otomatis dibuat dari judul artikel</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                        <textarea name="articles[{{ $index }}][description]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            rows="3">{{ $article['description'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Full Content</label>
                        <textarea name="articles[{{ $index }}][content]"
                            class="tinymce-editor w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono text-sm"
                            rows="12" placeholder="Isi lengkap artikel...">{{ $article['content'] ?? '' }}</textarea>
                        <p class="text-xs text-slate-400 mt-1">Konten lengkap untuk halaman detail artikel</p>
                    </div>

                    <!-- Author -->
                    <div class="border border-slate-200 p-4 rounded-xl bg-white">
                        <h4 class="font-medium text-slate-700 mb-3">Author</h4>
                        <div class="space-y-3">
                            <div>
                                <label class="text-xs font-medium text-slate-500 mb-1 block">Name</label>
                                <input type="text" name="articles[{{ $index }}][author][name]"
                                    value="{{ $article['author']['name'] ?? '' }}"
                                    class="w-full border border-slate-300 p-2.5 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-500 mb-1 block">Role</label>
                                <input type="text" name="articles[{{ $index }}][author][role]"
                                    value="{{ $article['author']['role'] ?? '' }}"
                                    class="w-full border border-slate-300 p-2.5 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-500 mb-1 block">Image (URL)</label>
                                <input type="text" name="articles[{{ $index }}][author][image]"
                                    value="{{ $article['author']['image'] ?? '' }}"
                                    class="w-full border border-slate-300 p-2.5 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm"
                                    placeholder="Kosongkan untuk pakai inisial nama">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                        <input type="text" name="articles[{{ $index }}][image]"
                            value="{{ $article['image'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Link (Slug URL untuk Baca Full Konten)</label>
                        <input type="text" name="articles[{{ $index }}][slug]"
                            value="{{ $article['slug'] ?? '' }}"
                            placeholder="contoh: /artikel/judul-artikel"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </form>
</div>

<script>
    function addArticleItem() {
        const container = document.getElementById('articles-container');
        const items = container.querySelectorAll('.article-item');
        const newIndex = items.length;

        const template = `
        <div class="article-item border border-slate-200 p-4 rounded-xl bg-slate-50" data-index="${newIndex}">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-slate-500">Artikel #<span class="article-number">${newIndex + 1}</span></span>
                <button type="button" onclick="removeArticleItem(this)" class="text-red-500 hover:text-red-700 transition-colors">
                    <span class="material-icons-outlined">delete</span>
                </button>
            </div>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Category</label>
                    <input type="text" name="articles[${newIndex}][category]"
                        class="article-category w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        onchange="updateTags()">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Read Time</label>
                    <input type="text" name="articles[${newIndex}][read_time]"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                    <input type="text" name="articles[${newIndex}][title]"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                    <textarea name="articles[${newIndex}][description]"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        rows="3"></textarea>
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Full Content</label>
                    <textarea name="articles[${newIndex}][content]"
                        class="tinymce-editor w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono text-sm"
                        rows="12" placeholder="Isi lengkap artikel..."></textarea>
                    <p class="text-xs text-slate-400 mt-1">Konten lengkap untuk halaman detail artikel</p>
                </div>

                <!-- Author -->
                <div class="border border-slate-200 p-4 rounded-xl bg-white">
                    <h4 class="font-medium text-slate-700 mb-3">Author</h4>
                    <div class="space-y-3">
                        <div>
                            <label class="text-xs font-medium text-slate-500 mb-1 block">Name</label>
                            <input type="text" name="articles[${newIndex}][author][name]"
                                class="w-full border border-slate-300 p-2.5 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-slate-500 mb-1 block">Role</label>
                            <input type="text" name="articles[${newIndex}][author][role]"
                                class="w-full border border-slate-300 p-2.5 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-slate-500 mb-1 block">Image (URL)</label>
                            <input type="text" name="articles[${newIndex}][author][image]"
                                class="w-full border border-slate-300 p-2.5 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm"
                                placeholder="Kosongkan untuk pakai inisial nama">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Image</label>
                    <input type="text" name="articles[${newIndex}][image]"
                        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600 mb-1 block">Slug (Auto-generated dari Title)</label>
                    <input type="text" name="articles[${newIndex}][slug]"
                        placeholder="/artikel/judul-artikel"
                        class="article-slug w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-sm font-mono text-slate-600"
                        readonly>
                    <p class="text-xs text-slate-400 mt-1">Slug otomatis dibuat dari judul artikel</p>
                </div>
            </div>
        </div>
    `;

        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = template;
        container.appendChild(tempDiv.firstElementChild);
        updateArticleNumbers();
    }

    function removeArticleItem(btn) {
        const item = btn.closest('.article-item');
        item.remove();
        updateArticleNumbers();
        reindexArticles();
        updateTags();
    }

    function updateArticleNumbers() {
        const items = document.querySelectorAll('.article-item');
        items.forEach((item, idx) => {
            item.querySelector('.article-number').textContent = idx + 1;
        });
    }

    function reindexArticles() {
        const items = document.querySelectorAll('.article-item');
        items.forEach((item, newIndex) => {
            item.setAttribute('data-index', newIndex);
            item.querySelectorAll('input, textarea').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    const newName = name.replace(/articles\[\d+\]/, `articles[${newIndex}]`);
                    input.setAttribute('name', newName);
                }
            });
        });
    }

    function updateTags() {
        const categories = document.querySelectorAll('.article-category');
        const uniqueTags = new Set();
        categories.forEach(cat => {
            if (cat.value.trim()) {
                uniqueTags.add(cat.value.trim());
            }
        });

        const tagsContainer = document.querySelector('#articles-container').previousElementSibling.querySelector('.flex-wrap');
        const tagsInput = document.querySelector('input[name="tags"]');

        if (uniqueTags.size > 0) {
            tagsContainer.innerHTML = Array.from(uniqueTags).map(tag =>
                `<span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-sm font-medium">${tag}</span>`
            ).join('');
            tagsInput.value = Array.from(uniqueTags).join(', ');
        } else {
            tagsContainer.innerHTML = '<span class="text-slate-400 text-sm italic">Tags akan muncul otomatis dari kategori artikel</span>';
            tagsInput.value = '';
        }
    }

    // Collect all existing slugs from the form
    function getExistingSlugs() {
        const slugs = [];
        document.querySelectorAll('.article-slug').forEach(input => {
            if (input.value) {
                slugs.push(input.value);
            }
        });
        return slugs;
    }

    // Generate slug from title
    function generateSlug(titleInput) {
        const articleItem = titleInput.closest('.article-item');
        const slugInput = articleItem.querySelector('.article-slug');
        const title = titleInput.value.trim();

        if (!title) return;

        // Generate base slug
        let baseSlug = title
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Remove special chars
            .replace(/\s+/g, '-') // Replace spaces with dashes
            .replace(/-+/g, '-') // Remove consecutive dashes
            .replace(/^-|-$/g, ''); // Remove leading/trailing dashes

        // Get all existing slugs (excluding current)
        const existingSlugs = [];
        document.querySelectorAll('.article-slug').forEach(input => {
            if (input !== slugInput && input.value) {
                existingSlugs.push(input.value.replace(/^\/artikel\//, ''));
            }
        });

        // Ensure uniqueness
        let slug = baseSlug;
        let counter = 1;
        while (existingSlugs.includes(slug)) {
            slug = `${baseSlug}-${counter}`;
            counter++;
        }

        slugInput.value = '/artikel/' + slug;
    }

    // Initialize TinyMCE editors
    function initTinyMCE() {
        tinymce.init({
            selector: '.tinymce-editor',
            height: 400,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic forecolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Inter,sans-serif; font-size:16px }',
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initTinyMCE();
    });

    // Reinitialize TinyMCE after adding new article
    const originalAddArticleItem = addArticleItem;
    addArticleItem = function() {
        originalAddArticleItem();
        tinymce.remove();
        initTinyMCE();
    };
</script>