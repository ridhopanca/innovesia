@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">edit_note</span>
            <h2 class="font-bold text-lg text-white">
                Strategic Capabilities Content
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

        <!-- Hero Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Hero Title</label>
            <input type="text" name="hero_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['hero_title'] ?? 'Strategic Capabilities' }}">
        </div>

        <!-- Hero Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Hero Description</label>
            <textarea name="hero_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['hero_description'] ?? 'Innovesia bridges the gap between complex strategic challenges and human-centered innovation, transforming insights into actionable impact.' }}</textarea>
        </div>

        <!-- Approach Section Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Approach Section Title</label>
            <input type="text" name="approach_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['approach_title'] ?? 'Our Approach' }}">
        </div>

        <!-- Approach Section Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Approach Section Description</label>
            <textarea name="approach_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="4">{{ $data['approach_description'] ?? 'Our methodology combines rigorous research with creative exploration to deliver solutions that resonate with users and drive business impact.' }}</textarea>
        </div>

        <!-- Capabilities Section Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capabilities Section Title</label>
            <input type="text" name="capabilities_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capabilities_title'] ?? 'Built for Modern Transformation' }}">
        </div>

        <!-- Capabilities Section Subtitle -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capabilities Section Subtitle</label>
            <textarea name="capabilities_subtitle"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="2">{{ $data['capabilities_subtitle'] ?? 'Our core disciplines are designed to address the multifaceted nature of contemporary business and social ecosystems.' }}</textarea>
        </div>

        <!-- Capability 1 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 1 Title</label>
            <input type="text" name="capability_1_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_1_title'] ?? 'Design Research' }}">
        </div>

        <!-- Capability 1 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 1 Description</label>
            <textarea name="capability_1_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_1_description'] ?? 'Deep-dive ethnographic studies and trend analysis to uncover the \'why\' behind user behaviors and market shifts.' }}</textarea>
        </div>

        <!-- Capability 2 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 2 Title</label>
            <input type="text" name="capability_2_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_2_title'] ?? 'Innovation Strategy' }}">
        </div>

        <!-- Capability 2 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 2 Description</label>
            <textarea name="capability_2_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_2_description'] ?? 'Developing long-term roadmaps that align business objectives with emerging opportunities and disruptive technologies.' }}</textarea>
        </div>

        <!-- Capability 3 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 3 Title</label>
            <input type="text" name="capability_3_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_3_title'] ?? 'Human-Centered Design' }}">
        </div>

        <!-- Capability 3 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 3 Description</label>
            <textarea name="capability_3_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_3_description'] ?? 'Prioritizing human needs and experiences at every stage of the design process to ensure resonant, intuitive solutions.' }}</textarea>
        </div>

        <!-- Capability 4 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 4 Title</label>
            <input type="text" name="capability_4_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_4_title'] ?? 'Design Thinking Workshop' }}">
        </div>

        <!-- Capability 4 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 4 Description</label>
            <textarea name="capability_4_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_4_description'] ?? 'Expertly moderated sessions that foster collaborative problem-solving and rapid ideation across diverse teams.' }}</textarea>
        </div>

        <!-- Capability 5 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 5 Title</label>
            <input type="text" name="capability_5_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_5_title'] ?? 'InnoVocation Lab' }}">
        </div>

        <!-- Capability 5 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 5 Description</label>
            <textarea name="capability_5_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_5_description'] ?? 'A specialized sandbox for prototyping and testing high-risk, high-reward concepts in a controlled, creative environment.' }}</textarea>
        </div>

        <!-- Capability 6 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 6 Title</label>
            <input type="text" name="capability_6_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_6_title'] ?? 'Public Sector & Policy' }}">
        </div>

        <!-- Capability 6 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 6 Description</label>
            <textarea name="capability_6_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_6_description'] ?? 'Applying innovation methodologies to civic challenges, governance systems, and complex policy development frameworks.' }}</textarea>
        </div>

        <!-- Capability 7 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 7 Title</label>
            <input type="text" name="capability_7_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_7_title'] ?? 'Digital & Platform' }}">
        </div>

        <!-- Capability 7 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 7 Description</label>
            <textarea name="capability_7_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_7_description'] ?? 'Building resilient digital architectures and seamless platform experiences that scale with user growth and technical complexity.' }}</textarea>
        </div>

        <!-- Capability 8 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 8 Title</label>
            <input type="text" name="capability_8_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_8_title'] ?? 'Insightism (Data Analysis)' }}">
        </div>

        <!-- Capability 8 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 8 Description</label>
            <textarea name="capability_8_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_8_description'] ?? 'Synthesizing quantitative data with qualitative insights to create a comprehensive view of performance and potential.' }}</textarea>
        </div>

        <!-- Capability 9 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 9 Title</label>
            <input type="text" name="capability_9_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['capability_9_title'] ?? 'Program & Ecosystem' }}">
        </div>

        <!-- Capability 9 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Capability 9 Description</label>
            <textarea name="capability_9_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['capability_9_description'] ?? 'Orchestrating broad networks of stakeholders to drive systemic change and sustainable community-led innovation.' }}</textarea>
        </div>

        <!-- Why It Matters Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Section Title</label>
            <input type="text" name="why_it_matters_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['why_it_matters_title'] ?? 'Why Our Capabilities Matter' }}">
        </div>

        <!-- Why It Matters Point 1 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Point 1 Title</label>
            <input type="text" name="why_point_1_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['why_point_1_title'] ?? 'Bridging Strategy & Execution' }}">
        </div>

        <!-- Why It Matters Point 1 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Point 1 Description</label>
            <textarea name="why_point_1_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['why_point_1_description'] ?? 'Vision without implementation is a hallucination. We provide the architectural framework and technical expertise to move from abstract strategy to tangible market impact.' }}</textarea>
        </div>

        <!-- Why It Matters Point 2 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Point 2 Title</label>
            <input type="text" name="why_point_2_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['why_point_2_title'] ?? 'Data & Human Insight' }}">
        </div>

        <!-- Why It Matters Point 2 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Point 2 Description</label>
            <textarea name="why_point_2_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['why_point_2_description'] ?? 'We decode complexity by layering quantitative data with qualitative human narratives, ensuring decisions are informed by both logic and empathy.' }}</textarea>
        </div>

        <!-- Why It Matters Point 3 Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Point 3 Title</label>
            <input type="text" name="why_point_3_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['why_point_3_title'] ?? 'Policy & Real-world Impact' }}">
        </div>

        <!-- Why It Matters Point 3 Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Why It Matters Point 3 Description</label>
            <textarea name="why_point_3_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['why_point_3_description'] ?? 'Our approach scales from individual product interactions to nation-wide policy shifts, maintaining fidelity to the user\'s needs at every level.' }}</textarea>
        </div>

        <!-- CTA Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Section Title</label>
            <input type="text" name="cta_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['cta_title'] ?? 'Turn Insight Into Impact' }}">
        </div>

        <!-- CTA Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Section Description</label>
            <textarea name="cta_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="4">{{ $data['cta_description'] ?? 'Join the ranks of forward-thinking organizations scaling their innovation potential with Innovesia\'s strategic guidance.' }}</textarea>
        </div>

        <!-- <div class="flex gap-3">
            <button type="button" onclick="saveSection(`{{ $section->id }}`)" class="flex-1 py-3 px-6 rounded-xl border-2 border-purple-500 text-purple-600 font-semibold hover:bg-purple-50 transition-all duration-200 flex items-center justify-center gap-2">
                <span class="material-icons-outlined">save</span>
                Save Draft
            </button>
        </div> -->
    </form>
</div>