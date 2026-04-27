@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">groups</span>
            <h2 class="font-bold text-lg text-white">
                Collective Structure Content
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
                value="{{ $data['hero_title'] ?? 'The Minds Behind the Innovation.' }}">
        </div>

        <!-- Hero Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Hero Description</label>
            <textarea name="hero_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['hero_description'] ?? 'Innovesia is built as a collective of strategists, researchers, and creators—working together to design solutions that create meaningful and lasting impact.' }}</textarea>
        </div>

        <!-- Editorial Section Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Editorial Section Title</label>
            <input type="text" name="editorial_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['editorial_title'] ?? 'A Collaborative Ecosystem' }}">
        </div>

        <!-- Editorial Section Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Editorial Section Description</label>
            <textarea name="editorial_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="4">{{ $data['editorial_description'] ?? 'At Innovesia, we dismantle traditional corporate silos. Our model is built on an editorialized framework where strategy, insight, and execution flow as a single narrative. We are a synergy of independent thinkers bound by a shared commitment to human-centered excellence.' }}</textarea>
        </div>

        <!-- Team Section Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Team Section Title</label>
            <input type="text" name="team_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['team_title'] ?? 'The Collective Mindset' }}">
        </div>

        <!-- Team Section Subtitle -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Team Section Subtitle</label>
            <input type="text" name="team_subtitle"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['team_subtitle'] ?? 'A collective of diverse thinkers and builders' }}">
        </div>

        <!-- Director Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Director Title</label>
            <input type="text" name="director_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['director_title'] ?? 'Director' }}">
        </div>

        <!-- Director Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Director Description</label>
            <textarea name="director_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['director_description'] ?? 'Architects of vision, leading strategic direction and high-level global partnerships to ensure Innovesia\'s trajectory remains at the frontier of innovation.' }}</textarea>
        </div>

        <!-- Strategy Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Strategy Title</label>
            <input type="text" name="strategy_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['strategy_title'] ?? 'Innovation Strategy' }}">
        </div>

        <!-- Strategy Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Strategy Description</label>
            <textarea name="strategy_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['strategy_description'] ?? 'Designing the frameworks and long-term roadmaps that define how businesses evolve.' }}</textarea>
        </div>

        <!-- Research Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Research Title</label>
            <input type="text" name="research_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['research_title'] ?? 'Design Research & Insight' }}">
        </div>

        <!-- Research Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Research Description</label>
            <textarea name="research_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['research_description'] ?? 'Deep cultural immersion and data-backed validation to uncover what truly matters to humans.' }}</textarea>
        </div>

        <!-- Design Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Design Title</label>
            <input type="text" name="design_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['design_title'] ?? 'Human-Centered Design' }}">
        </div>

        <!-- Design Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Design Description</label>
            <textarea name="design_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['design_description'] ?? 'Transforming abstract insights into tangible, intuitive solutions designed for the user.' }}</textarea>
        </div>

        <!-- Creative Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Creative Title</label>
            <input type="text" name="creative_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['creative_title'] ?? 'Creative & Communication' }}">
        </div>

        <!-- Creative Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Creative Description</label>
            <textarea name="creative_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['creative_description'] ?? 'Crafting visual identities and narratives that resonate across every human touchpoint.' }}</textarea>
        </div>

        <!-- Program Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Program Title</label>
            <input type="text" name="program_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['program_title'] ?? 'Program & Ecosystem' }}">
        </div>

        <!-- Program Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Program Description</label>
            <textarea name="program_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['program_description'] ?? 'Scaling impact through education, UMKM support, and public sector innovation programs.' }}</textarea>
        </div>

        <!-- Community Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Community Title</label>
            <input type="text" name="community_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['community_title'] ?? 'Community & Engagement' }}">
        </div>

        <!-- Community Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Community Description</label>
            <textarea name="community_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['community_description'] ?? 'The InnoVocation Lab: Activating communities through collaborative learning and creative expression.' }}</textarea>
        </div>

        <!-- Lab Focus 1 -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Lab Focus 1</label>
            <input type="text" name="lab_focus_1"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['lab_focus_1'] ?? 'Skill-building Workshops' }}">
        </div>

        <!-- Lab Focus 2 -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Lab Focus 2</label>
            <input type="text" name="lab_focus_2"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['lab_focus_2'] ?? 'Ecosystem Networking' }}">
        </div>

        <!-- Methodology Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Methodology Section Title</label>
            <input type="text" name="methodology_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['methodology_title'] ?? 'The Methodology of Movement' }}">
        </div>

        <!-- CTA Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Section Title</label>
            <input type="text" name="cta_title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['cta_title'] ?? 'Be Part of the Collective' }}">
        </div>

        <!-- CTA Description -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Section Description</label>
            <textarea name="cta_description"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="4">{{ $data['cta_description'] ?? 'We are constantly seeking brilliant strategists, empathetic researchers, and visionary creators to join our mission of designing a better future.' }}</textarea>
        </div>

        <!-- <div class="flex gap-3">
            <button type="button" onclick="saveSection(`{{ $section->id }}`)" class="flex-1 py-3 px-6 rounded-xl border-2 border-purple-500 text-purple-600 font-semibold hover:bg-purple-50 transition-all duration-200 flex items-center justify-center gap-2">
                <span class="material-icons-outlined">save</span>
                Save Draft
            </button>
        </div> -->
    </form>
</div>