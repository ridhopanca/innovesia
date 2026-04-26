@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);

// Default images if empty
if (empty($data['images'])) {
$data['images'] = [
['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBAesYK_Z7qXg-QWc4x8xHGyQtui4h4hZeRUnhNZOsXPvGsX1IwWVlNUscsnHPtKTDAeFSo3iZeh9mZMEbvnT1-BFgu-eUXELQH4m_39VQELDO7kwxxU9YIP-NEwylcJlYcLVLeYmgAxCH1naCvef8TjHYdxdX8-4mehFlX3b0zZVSEV5jZu6uVxNb6JS5NhCDTx7eCQAXcT6_pG3k6Pv9Z40PJAdCd96tfE0RN2pJAhDntzuvNdLJCX6iV-4jyWMub3egvbht9ke76', 'title' => 'Brainstorming Session'],
['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAPxivqlsqQWH_OYisaucKadme4sLFnuk8DpcWY-gvZrUDySjo8VyN6Y0e3p1OkrXFVtjkT8Tody68xOFsXAehy8-VkbIBKSqqNhapMDtGBrSV_AlCz1XIEIpzbqx8aWzQ-zQ7RXjrFpUM6y6onihKndzdUs1caXohfnii9kyDp_SpfPqrEevNMOlLInta-bebGrMHU4bMohONcx2cgdTApgHTLrl6yfJug14_0AkPy5aOhm5bdrcYCDPRAGt98ljubOrLNXNNE7qTV', 'title' => 'Classroom Activity'],
['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBD1_u4wrRcO-IhG-72UaWhyH1G3Z0pPHaLCXKDnpeC31LikbLbVuoJs6om7Qbl7Mb5DoVys-rqkf0XCy9CQZ4Mz5X6_7uXPLIpgnEE1t8PMF_N7S6DOKh_VyPhkHVlH9h4D9WKl6eOi2u4iuYzOBU8f-oO_7Lt38LZLjYIZE5qMmEqDK9arnZxlivWhqq5BW4_TNkfrH-Ob14Qp-6dZ3UZGGJIDqz6tkTQJdNAdDPl2ZdxELYdnBbQ6vvz9WUzJebhPv3lnUNcZi93', 'title' => 'Student Presentation'],
['url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC9amI9hB7HMxmrArOCGV47eS8aEkALfyjnvqmkICB8QMehH1_PDZTjiTUrzYZSyqab3RMs6GQg32OEdZ_PVGIbiMRG4IZi1HnzG-N39ufGiXrymlF9P8Dg2x8Hpmap2O99xIMpeGMvsnmQhJPLvpr_QT1O3t5HPt5gPX5U4zU-vV9MSeykr7iLdy6Anem4jaQk-To_wsTSXxFrpmhifxCbnztEm0tGDTdeDfufh7m4ZkXk5q72Ge-5Vcg5EZZY67btazjmxhYqPXz9', 'title' => 'Design Sketchbook']
];
}
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">description</span>
            <h2 class="font-bold text-lg text-white">
                Documentation Section
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
                value="{{ $data['title'] ?? 'In the Lab' }}">
        </div>

        <!-- Images -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-slate-700">Images</h3>
                <button type="button" onclick="addDocumentationImage()" class="text-sm bg-purple-100 text-purple-700 px-3 py-1.5 rounded-lg hover:bg-purple-200 transition-colors">
                    + Add Image
                </button>
            </div>
            <div id="images-container">
                @foreach(($data['images'] ?? []) as $index => $image)
                <div class="image-item border border-slate-200 p-4 mb-2 rounded-xl bg-slate-50 relative">
                    <button type="button" onclick="removeDocumentationImage(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-icons-outlined">close</span>
                    </button>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Image {{ $index + 1 }} URL</label>
                            <input type="text" name="images[{{ $index }}][url]"
                                value="{{ is_array($image) ? ($image['url'] ?? '') : $image }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Image {{ $index + 1 }} Title</label>
                            <input type="text" name="images[{{ $index }}][title]"
                                value="{{ is_array($image) ? ($image['title'] ?? '') : '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="e.g., Brainstorming Session">
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-500">
                            <span class="material-icons-outlined text-sm">info</span>
                            <span>Image {{ $index + 1 }}: {{ $index === 0 ? 'Large (2x2)' : ($index === 2 ? 'Tall (1x2)' : 'Standard (1x1)') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </form>
</div>

<script>
    let imageIndex = `{{ count($data['images'] ?? []) }}`;

    function addDocumentationImage() {
        const container = document.getElementById('images-container');
        const imageHtml = `
            <div class="image-item border border-slate-200 p-4 rounded-xl bg-slate-50 relative">
                <button type="button" onclick="removeDocumentationImage(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-icons-outlined">close</span>
                </button>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Image ${imageIndex + 1} URL</label>
                        <input type="text" name="images[${imageIndex}][url]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Image ${imageIndex + 1} Title</label>
                        <input type="text" name="images[${imageIndex}][title]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="e.g., Brainstorming Session">
                    </div>
                    <div class="flex items-center gap-2 text-xs text-slate-500">
                        <span class="material-icons-outlined text-sm">info</span>
                        <span>Image ${imageIndex + 1}: Standard (1x1)</span>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', imageHtml);
        imageIndex++;
    }

    function removeDocumentationImage(button) {
        button.closest('.image-item').remove();
    }
</script>