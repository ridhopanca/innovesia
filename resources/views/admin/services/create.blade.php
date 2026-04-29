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
            <a href="{{ route('admin.services.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            @endif
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-lg">add</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Add New Service
            </h1>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl overflow-hidden p-8">
        <form id="serviceForm" action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf
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
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Service Title</label>
                <input type="text" name="title" required
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Enter service title">
            </div>

            <!-- Slug (Hidden) -->
            <input type="hidden" name="slug" id="slug" value="">

            <!-- Category -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Category</label>
                <input type="text" name="category"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="e.g., Lab, Policy, Workshops">
            </div>

            <!-- Excerpt -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Excerpt</label>
                <textarea name="excerpt" rows="3"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Short description for service card"></textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Content</label>
                <textarea name="content" id="content-editor"
                    class="tinymce-editor w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all font-mono text-sm"
                    rows="12" placeholder="Full service content (HTML allowed)"></textarea>
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
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Stats (Optional)</label>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="stats[0][value]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="900+">
                        <input type="text" name="stats[0][label]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mt-2"
                            placeholder="Label">
                    </div>
                    <div>
                        <input type="text" name="stats[1][value]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="45%">
                        <input type="text" name="stats[1][label]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all mt-2"
                            placeholder="Label">
                    </div>
                </div>
            </div>

            <!-- Featured -->
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" class="w-5 h-5 text-purple-600 rounded">
                <label for="is_featured" class="text-sm font-semibold text-slate-700">Featured Service</label>
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
                @if(request('referrer'))
                <a href="{{ request('referrer') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
                    Cancel
                </a>
                @else
                <a href="{{ route('admin.services.index') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
                    Cancel
                </a>
                @endif
                <button type="button" id="submitBtn" class="flex-1 py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all">
                    Create Service
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    (function() {
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput = document.getElementById('slug');
        const form = document.getElementById('serviceForm');
        const submitBtn = document.getElementById('submitBtn');

        function generateSlug(text) {
            if (!text) return '';
            return text.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '')
                .substring(0, 100);
        }

        if (form && submitBtn && titleInput) {
            submitBtn.addEventListener('click', function() {
                if (titleInput.value.trim()) {
                    slugInput.value = generateSlug(titleInput.value.trim());
                }
                // Save TinyMCE content
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }
                form.submit();
            });
        }
    })();

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

    document.addEventListener('DOMContentLoaded', function() {
        initTinyMCE();
    });
</script>
@endpush