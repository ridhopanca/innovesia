@extends('layouts.admin')

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-3">
            @if(request('referrer'))
            <a href="{{ request('referrer') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            @else
            <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            @endif
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-lg">edit</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Project
            </h1>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl overflow-hidden p-8">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @if(request('referrer'))
            <input type="hidden" name="referrer" value="{{ request('referrer') }}">
            @endif

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
                <input type="text" name="title" required value="{{ $project->title }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Slug -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Slug</label>
                <input type="text" name="slug" required value="{{ $project->slug }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Category -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Category</label>
                <input type="text" name="category" value="{{ $project->category }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Excerpt -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Excerpt</label>
                <textarea name="excerpt" rows="3"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">{{ $project->excerpt }}</textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Content</label>
                <textarea name="content" id="content-editor"
                    class="tinymce-editor w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono text-sm"
                    rows="12">{{ $project->content }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Image URL</label>
                <input type="text" name="image" value="{{ $project->image }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                @if($project->image)
                <div class="mt-2">
                    <img src="{{ $project->image }}" alt="Preview" class="h-32 rounded-lg object-cover">
                </div>
                @endif
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
                    @if($project->stats && count($project->stats) > 0)
                    @foreach($project->stats as $index => $stat)
                    <div class="stat-item">
                        <input type="text" name="stats[{{ $index }}][value]" value="{{ $stat['value'] }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="Value">
                        <input type="text" name="stats[{{ $index }}][label]" value="{{ $stat['label'] }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mt-2"
                            placeholder="Label">
                        <button type="button" onclick="removeStat(this)" class="text-xs text-red-500 hover:text-red-700 mt-1">Remove</button>
                    </div>
                    @endforeach
                    @else
                    <div class="stat-item">
                        <input type="text" name="stats[0][value]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="900+">
                        <input type="text" name="stats[0][label]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mt-2"
                            placeholder="Label">
                        <button type="button" onclick="removeStat(this)" class="text-xs text-red-500 hover:text-red-700 mt-1">Remove</button>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Featured -->
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" {{ $project->is_featured ? 'checked' : '' }} class="w-5 h-5 text-purple-600 rounded">
                <label for="is_featured" class="text-sm font-semibold text-slate-700">Featured Project</label>
            </div>

            <!-- Status -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Status</label>
                <select name="status" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-white">
                    <option value="draft" {{ $project->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $project->status === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <!-- Order -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Order</label>
                <input type="number" name="order" value="{{ $project->order }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                @if(request('referrer'))
                <a href="{{ request('referrer') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
                    Cancel
                </a>
                @else
                <a href="{{ route('admin.projects.index') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
                    Cancel
                </a>
                @endif
                <button type="submit" class="flex-1 py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all">
                    Update Project
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
    let statIndex = `{{ ($project->stats && count($project->stats) > 0) ? count($project->stats) : 1 }}`;

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