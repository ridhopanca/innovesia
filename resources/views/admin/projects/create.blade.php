@extends('layouts.admin')

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-3">
            <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-lg">add</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Add New Project
            </h1>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl overflow-hidden p-8">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Validation Errors -->
            @if($errors->any())
            <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                <div class="flex items-center gap-2 text-red-700 font-semibold mb-2">
                    <span class="material-icons-outlined">error</span>
                    <span>Validation Error</span>
                </div>
                <ul class="text-sm text-red-600 space-y-1">
                    @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Title -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Project Title</label>
                <input type="text" name="title" required
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Enter project title">
            </div>

            <!-- Slug -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Slug</label>
                <input type="text" name="slug" required
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="project-slug">
            </div>

            <!-- Category -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Category</label>
                <input type="text" name="category"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="e.g., Governance, Education, Enterprise">
            </div>

            <!-- Excerpt -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Excerpt</label>
                <textarea name="excerpt" rows="3"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Short description for project card"></textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Content</label>
                <textarea name="content" id="content-editor"
                    class="tinymce-editor w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono text-sm"
                    rows="12" placeholder="Full project content (HTML allowed)"></textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Image URL</label>
                <input type="text" name="image"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="https://example.com/image.jpg">
            </div>

            <!-- Stats -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="text-sm font-semibold text-slate-700">Stats (Optional)</label>
                    <button type="button" onclick="addStat()" class="text-sm text-purple-600 hover:text-purple-800 font-medium flex items-center gap-1">
                        <span class="material-icons-outlined text-sm">add</span> Add Stat
                    </button>
                </div>
                <div id="stats-container" class="grid grid-cols-2 gap-4">
                    <div class="stat-item">
                        <input type="text" name="stats[0][value]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="900+">
                        <input type="text" name="stats[0][label]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mt-2"
                            placeholder="Label">
                        <button type="button" onclick="removeStat(this)" class="text-xs text-red-500 hover:text-red-700 mt-1">Remove</button>
                    </div>
                </div>
            </div>

            <!-- Featured -->
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" class="w-5 h-5 text-purple-600 rounded">
                <label for="is_featured" class="text-sm font-semibold text-slate-700">Featured Project</label>
            </div>

            <!-- Status -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Status</label>
                <select name="status" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Order -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Order</label>
                <input type="number" name="order" value="0"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                <a href="{{ route('admin.projects.index') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
                    Cancel
                </a>
                <button type="submit" class="flex-1 py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all">
                    Create Project
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
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

    // Stats management
    let statIndex = 1;

    function addStat() {
        const container = document.getElementById('stats-container');
        const div = document.createElement('div');
        div.className = 'stat-item';
        div.innerHTML = `
            <input type="text" name="stats[${statIndex}][value]"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="Value">
            <input type="text" name="stats[${statIndex}][label]"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mt-2"
                placeholder="Label">
            <button type="button" onclick="removeStat(this)" class="text-xs text-red-500 hover:text-red-700 mt-1">Remove</button>
        `;
        container.appendChild(div);
        statIndex++;
    }

    function removeStat(btn) {
        const items = document.querySelectorAll('.stat-item');
        if (items.length > 1) {
            btn.closest('.stat-item').remove();
        } else {
            alert('At least one stat is required');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        initTinyMCE();
    });
</script>
@endpush