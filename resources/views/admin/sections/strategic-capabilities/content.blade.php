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

        <!-- Dynamic Capabilities -->
        <div class="border-t border-slate-200 pt-6 mt-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                    <span class="material-icons-outlined text-purple-600">psychology</span>
                    Capabilities
                </h3>
            </div>

            <div id="capabilities-container" class="space-y-4">
                @php
                $capabilities = $data['capabilities'] ?? [];
                // Migrate old flat data to array if needed
                if (empty($capabilities) && isset($data['capability_1_title'])) {
                for ($i = 1; $i <= 9; $i++) {
                    if (!empty($data["capability_{$i}_title"])) {
                    $capabilities[]=[ 'icon'=> $data["capability_{$i}_icon"] ?? 'star',
                    'title' => $data["capability_{$i}_title"],
                    'description' => $data["capability_{$i}_description"] ?? '',
                    'visible_in_home' => false
                    ];
                    }
                    }
                    }
                    @endphp

                    @forelse($capabilities as $index => $capability)
                    <div class="capability-item border border-slate-200 rounded-xl bg-slate-50 p-4" data-index="{{ $index }}">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-slate-700">Capability {{ $index + 1 }}</span>
                            <button type="button" onclick="removeCapability(this)"
                                class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-colors">
                                <span class="material-icons-outlined text-base">delete</span>
                            </button>
                        </div>
                        <div class="space-y-3">
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="capabilities[{{ $index }}][icon]" value="{{ $capability['icon'] ?? 'star' }}"
                                    class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    placeholder="Icon (e.g., search)">
                                <input type="text" name="capabilities[{{ $index }}][title]" value="{{ $capability['title'] ?? '' }}"
                                    class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    placeholder="Title">
                            </div>
                            <textarea name="capabilities[{{ $index }}][description]" rows="2"
                                class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Description">{{ $capability['description'] ?? '' }}</textarea>

                            <!-- Visible in Home Toggle -->
                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons-outlined text-slate-500 text-sm">home</span>
                                    <span class="text-sm font-medium text-slate-700">Tampilkan di Beranda</span>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="capabilities[{{ $index }}][visible_in_home]" class="sr-only peer"
                                        {{ ($capability['visible_in_home'] ?? false) ? 'checked' : '' }}>
                                    <div class="w-9 h-5 bg-slate-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-slate-500 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                        <span class="material-icons-outlined text-3xl mb-2 block">add_circle_outline</span>
                        <p class="text-sm">No capabilities yet. Click "Add Capability" to start.</p>
                    </div>
                    @endforelse
            </div>

            <button type="button" onclick="addCapability()"
                class="w-full mt-4 px-4 py-2 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-700 transition-colors flex items-center justify-center gap-2">
                <span class="material-icons-outlined text-sm">add</span>
                Add Capability
            </button>
        </div>

        <script>
            function addCapability() {
                const container = document.getElementById('capabilities-container');
                const items = container.querySelectorAll('.capability-item');
                const index = items.length;

                // Remove empty state if exists
                const emptyState = container.querySelector('.text-center');
                if (emptyState) emptyState.remove();

                const div = document.createElement('div');
                div.className = 'capability-item border border-slate-200 rounded-xl bg-slate-50 p-4';
                div.setAttribute('data-index', index);
                div.innerHTML = `
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold text-slate-700">Capability ${index + 1}</span>
                        <button type="button" onclick="removeCapability(this)"
                            class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-colors">
                            <span class="material-icons-outlined text-sm">delete</span>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <input type="text" name="capabilities[${index}][icon]"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Icon (e.g., search)">
                            <input type="text" name="capabilities[${index}][title]"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Title">
                        </div>
                        <textarea name="capabilities[${index}][description]" rows="2"
                            class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="Description"></textarea>

                        <!-- Visible in Home Toggle -->
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                            <div class="flex items-center gap-2">
                                <span class="material-icons-outlined text-slate-500 text-sm">home</span>
                                <span class="text-sm font-medium text-slate-700">Tampilkan di Beranda</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="capabilities[${index}][visible_in_home]" class="sr-only peer">
                                <div class="w-9 h-5 bg-slate-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600"></div>
                            </label>
                        </div>
                    </div>
                `;
                container.appendChild(div);
            }

            function removeCapability(btn) {
                const item = btn.closest('.capability-item');
                item.remove();
                // Re-index remaining items
                const items = document.querySelectorAll('.capability-item');
                items.forEach((item, idx) => {
                    item.setAttribute('data-index', idx);
                    item.querySelector('.text-sm.font-semibold').textContent = `Capability ${idx + 1}`;
                    // Update input names
                    item.querySelectorAll('input, textarea').forEach(input => {
                        const name = input.getAttribute('name');
                        if (name) {
                            input.setAttribute('name', name.replace(/capabilities\[\d+\]/, `capabilities[${idx}]`));
                        }
                    });
                });
            }
        </script>

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