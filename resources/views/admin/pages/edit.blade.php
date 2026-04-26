@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-2 h-full transition-all duration-300 ease-in-out" id="main-grid">

    <!-- LEFT: EDITOR -->
    <div class="p-8 overflow-y-auto bg-white border-r border-slate-200">
        <div class="mb-8">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-3">
                    <a href="/cms" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                        <span class="material-icons-outlined">arrow_back</span>
                    </a>
                    <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                        <span class="material-icons-outlined text-white text-lg">edit</span>
                    </div>
                    <h1 class="text-2xl font-bold text-slate-800">
                        Edit: {{ $page->title }}
                    </h1>
                </div>
                <button onclick="togglePreview()" class="flex items-center gap-1 text-slate-500 hover:text-slate-700 transition-colors" title="Toggle Preview">
                    <span class="material-icons-outlined text-lg" id="editor-toggle-icon">visibility_off</span>
                </button>
            </div>
            <p class="text-slate-500 text-sm">Customize your page sections below</p>
        </div>

        @foreach($sections as $type => $section)
        @includeIf('admin.sections.' . $section->page_template . '.' . $type)
        @endforeach

        <div id="success-message" class="hidden mb-6 bg-green-50 border border-green-200 rounded-2xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">
                    <span class="material-icons-outlined text-green-600">check_circle</span>
                </div>
                <div>
                    <p class="font-semibold text-green-800">Berhasil!</p>
                    <p class="text-green-600 text-sm" id="success-text">Data berhasil disimpan.</p>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button onclick="saveAllDrafts()" class="flex-1 py-3 px-6 rounded-xl border-2 border-purple-500 text-purple-600 font-semibold hover:bg-purple-50 transition-all duration-200 flex items-center justify-center gap-2">
                <span class="material-icons-outlined">save</span>
                Save as Draft
            </button>
            <form id="publish-form" method="POST" action="/cms/pages/{{ $page->slug }}/publish" class="flex-1">
                @csrf
                <button type="button" onclick="publishPage()" class="w-full py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all duration-200 flex items-center justify-center gap-2">
                    <span class="material-icons-outlined">publish</span>
                    Publish Page
                </button>
            </form>

        </div>
    </div>

    <!-- RIGHT: PREVIEW -->
    <div class="bg-slate-50 transition-all duration-300 ease-in-out" id="preview-panel">
        <div class="h-12 bg-white border-b border-slate-200 flex items-center px-6 gap-2">
            <span class="material-icons-outlined text-slate-500">visibility</span>
            <span class="text-sm font-medium text-slate-600">Live Preview</span>
        </div>
        <iframe
            id="preview-frame"
            src="/preview/{{ $page->id }}"
            class="w-full h-[calc(100%-3rem)] bg-white">
        </iframe>
    </div>

</div>

@endsection

@push('scripts')
<script>
    function saveSection(id) {
        let form = document.querySelector(`form[data-id='${id}']`);
        if (!form) {
            console.error('Form not found for id:', id);
            return;
        }
        let data = new FormData(form);
        let urlInput = form.querySelector('input[name="image"]');
        let selectedSource = form.querySelector('input[name="image_source"]:checked');

        if (selectedSource && selectedSource.value === 'url') {
            data.set('image', urlInput.value);
        }

        return fetch(`/cms/sections/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: data
            })
            .then(res => {
                console.log('Response status:', res.status);
                return res.json();
            })
            .then(result => {
                console.log('Save result:', result);
            })
            .catch(error => {
                console.error('Save failed:', error);
            });
    }

    async function saveAllDrafts() {
        const forms = document.querySelectorAll('.section-form');
        const promises = [];

        forms.forEach(form => {
            const id = form.dataset.id;
            let data = new FormData(form);
            let urlInput = form.querySelector('input[name="image"]');
            let selectedSource = form.querySelector('input[name="image_source"]:checked');

            if (selectedSource && selectedSource.value === 'url') {
                data.set('image', urlInput.value);
            }

            promises.push(
                fetch(`/cms/sections/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: data
                })
                .then(res => res.json())
                .then(result => {
                    console.log('Saved section', id, result);
                })
                .catch(error => {
                    console.error('Save failed for section', id, error);
                })
            );
        });

        await Promise.all(promises);

        const iframe = document.getElementById('preview-frame');
        iframe.src = iframe.src + '?t=' + new Date().getTime();

        const successMessage = document.getElementById('success-message');
        const successText = document.getElementById('success-text');
        successText.textContent = 'All sections saved as draft!';
        successMessage.classList.remove('hidden');

        setTimeout(() => {
            successMessage.classList.add('hidden');
        }, 3000);
    }

    async function publishPage() {
        await saveAllDrafts();

        const successMessage = document.getElementById('success-message');
        const successText = document.getElementById('success-text');
        successText.textContent = 'Publishing page...';
        successMessage.classList.remove('hidden');

        document.getElementById('publish-form').submit();
    }

    function toggleImageSource(radio, sectionId) {
        const urlDiv = document.getElementById(`image-url-${sectionId}`);
        const uploadDiv = document.getElementById(`image-upload-${sectionId}`);
        const urlInput = urlDiv.querySelector('input[name="image"]');
        const fileInput = uploadDiv.querySelector('input[name="image_file"]');

        if (radio.value === 'url') {
            urlDiv.classList.remove('hidden');
            uploadDiv.classList.add('hidden');
        } else {
            urlDiv.classList.add('hidden');
            uploadDiv.classList.remove('hidden');
        }
    }

    function togglePreview() {
        const previewPanel = document.getElementById('preview-panel');
        const editorToggleIcon = document.getElementById('editor-toggle-icon');
        const mainGrid = document.getElementById('main-grid');

        if (previewPanel.classList.contains('hidden')) {
            // Show preview
            previewPanel.classList.remove('hidden');
            editorToggleIcon.textContent = 'visibility_off';
            mainGrid.classList.remove('grid-cols-1');
            mainGrid.classList.add('grid-cols-2');
        } else {
            // Hide preview
            previewPanel.classList.add('hidden');
            editorToggleIcon.textContent = 'visibility';
            mainGrid.classList.remove('grid-cols-2');
            mainGrid.classList.add('grid-cols-1');
        }
    }
</script>
@endpush