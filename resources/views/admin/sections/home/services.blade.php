@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($data);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">business_center</span>
            <h2 class="font-bold text-lg text-white">
                Services Section
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

        <!-- Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Deskripsi</label>
            <textarea name="description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['description'] ?? '' }}</textarea>
        </div>

        <!-- Link Text -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Teks Link</label>
            <input type="text" name="link_text"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['link_text'] ?? '' }}">
        </div>

        <!-- Services -->
        <div class="space-y-4">
            <h3 class="font-semibold text-slate-700">Services</h3>
            <!-- @foreach(($data['services'] ?? []) as $index => $service)
            <div class="border border-slate-200 p-4 rounded-xl bg-slate-50">
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Icon</label>
                        <input type="text" name="services[{{ $index }}][icon]"
                            value="{{ $service['icon'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                        <input type="text" name="services[{{ $index }}][title]"
                            value="{{ $service['title'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                        <textarea name="services[{{ $index }}][description]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            rows="3">{{ $service['description'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            @endforeach -->
            <div class="p-4 bg-indigo-50 rounded-xl border border-indigo-200">
                <div class="flex items-start gap-3">
                    <span class="material-icons-outlined text-indigo-600">auto_awesome</span>
                    <div>
                        <h4 class="text-sm font-semibold text-indigo-900">Strategic Capabilities Otomatis dari Database</h4>
                        <p class="text-xs text-indigo-700 mt-1">
                            Section ini menampilkan strategic capabilities secara otomatis:<br>
                            • <strong>Strategic capabilities</strong> akan muncul dihalaman utama apabila memilih / klik checkbox "Tampilkan dari beranda"<br>
                            Kelola strategic capabilities di menu <a href="/cms/pages/strategic-capabilities" class="font-semibold underline hover:text-indigo-900">Strategic Capabilities</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>