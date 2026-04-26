@extends('layouts.admin')

@section('content')

<div class="p-8 max-w-4xl mx-auto bg-white mt-12 rounded">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 rounded-2xl gradient-bg flex items-center justify-center icon-glow">
                <span class="material-icons-outlined text-white text-2xl">info</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold gradient-text">Edit General Information</h1>
                <p class="text-slate-500 mt-1">Manage your contact information and social links</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl p-8">
        <form method="POST" action="{{ route('admin.general-information.update') }}" class="space-y-6">
            @method('PUT')
            @csrf

            <!-- Items -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Links & Information</label>
                <div id="items-container" class="space-y-4">
                    @php
                    $items = old('items', $generalInfo->items ?? []);
                    if (empty($items)) {
                    $items = [['svg' => '', 'url' => '#', 'label' => '', 'sublabel' => '']];
                    }
                    @endphp
                    @foreach($items as $index => $item)
                    <div class="item-row p-4 rounded-xl border border-slate-200 bg-slate-50">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Label</label>
                                <input type="text" name="items[{{ $index }}][label]" required
                                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                                    value="{{ $item['label'] ?? '' }}"
                                    placeholder="Website">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">URL</label>
                                <input type="text" name="items[{{ $index }}][url]" required
                                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                                    value="{{ $item['url'] ?? '' }}"
                                    placeholder="https://example.com">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Sublabel (optional)</label>
                                <input type="text" name="items[{{ $index }}][sublabel]"
                                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                                    value="{{ $item['sublabel'] ?? '' }}"
                                    placeholder="Additional info">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">SVG Icon (optional)</label>
                                <input type="text" name="items[{{ $index }}][svg]"
                                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                                    value="{{ $item['svg'] ?? '' }}"
                                    placeholder="<svg>...</svg>">
                            </div>
                        </div>
                        @if($index > 0 || count($items) > 1)
                        <button type="button" onclick="removeItem(this)" class="mt-3 text-sm text-red-600 hover:text-red-700 font-medium">
                            <span class="material-icons-outlined text-sm align-middle">delete</span>
                            Remove
                        </button>
                        @endif
                    </div>
                    @endforeach
                </div>
                <button type="button" onclick="addItem()" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold bg-indigo-100 text-indigo-700 hover:bg-indigo-200 transition-all">
                    <span class="material-icons-outlined text-lg">add</span>
                    <span>Add Item</span>
                </button>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-200">
                <a href="/cms" class="px-6 py-3 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-800 font-semibold transition-all border border-slate-200">
                    Cancel
                </a>
                <button type="submit"
                    class="py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all duration-200 flex items-center justify-center gap-2">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let itemIndex = `{{ count($items) }}`;

    function addItem() {
        const container = document.getElementById('items-container');
        const newItem = document.createElement('div');
        newItem.className = 'item-row p-4 rounded-xl border border-slate-200 bg-slate-50';
        newItem.innerHTML = `
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Label</label>
                <input type="text" name="items[${itemIndex}][label]" required
                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                    placeholder="Website">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">URL</label>
                <input type="text" name="items[${itemIndex}][url]" required
                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                    placeholder="https://example.com">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Sublabel (optional)</label>
                <input type="text" name="items[${itemIndex}][sublabel]"
                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                    placeholder="Additional info">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">SVG Icon (optional)</label>
                <input type="text" name="items[${itemIndex}][svg]"
                    class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all bg-white"
                    placeholder="<svg>...</svg>">
            </div>
        </div>
        <button type="button" onclick="removeItem(this)" class="mt-3 text-sm text-red-600 hover:text-red-700 font-medium">
            <span class="material-icons-outlined text-sm align-middle">delete</span>
            Remove
        </button>
    `;
        container.appendChild(newItem);
        itemIndex++;
    }

    function removeItem(button) {
        const row = button.closest('.item-row');
        row.remove();
    }
</script>

@endsection