@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden" data-hide-from-preview="true">
    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">work</span>
            <h2 class="font-bold text-lg text-white">
                Our Work Content
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
        <!-- Hero Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Hero Title</label>
            <input type="text" name="hero_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['hero_title'] ?? 'Our Work & Impact' }}">
        </div>

        <!-- Hero Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Hero Description</label>
            <textarea name="hero_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['hero_description'] ?? 'Explore how Innovesia translates complex insight into real-world impact, bridging the gap between strategic institutional vision and human-centric design.' }}</textarea>
        </div>

        <!-- CTA Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Section Title</label>
            <input type="text" name="cta_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['cta_title'] ?? "Let's Create Impact Together" }}">
        </div>

        <!-- CTA Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Section Description</label>
            <textarea name="cta_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="4">{{ $data['cta_description'] ?? 'Ready to transform your institutional challenges into human-centered solutions? Our strategy team is standing by to architect your next breakthrough.' }}</textarea>
        </div>

        <!-- <div class="flex gap-3">
            <button type="button" onclick="saveSection(`{{ $section->id }}`)" class="flex-1 py-3 px-6 rounded-xl border-2 border-purple-500 text-purple-600 font-semibold hover:bg-purple-50 transition-all duration-200 flex items-center justify-center gap-2">
                <span class="material-icons-outlined">save</span>
                Save Draft
            </button>
        </div> -->
    </form>
</div>