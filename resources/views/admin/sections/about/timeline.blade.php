@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">history</span>
            <h2 class="font-bold text-lg text-white">
                Timeline Section
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

        <!-- Milestones -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-slate-700">Milestones</h3>
            </div>

            <div id="milestones-container" class="space-y-4">
                @forelse(($data['milestones'] ?? []) as $index => $milestone)
                <div class="milestone-item border border-slate-200 p-4 rounded-xl bg-slate-50" data-index="{{ $index }}">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold text-slate-700">Milestone {{ $index + 1 }}</span>
                        <button type="button" onclick="removeMilestone(this)"
                            class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-colors">
                            <span class="material-icons-outlined text-base">delete</span>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Tahun</label>
                            <input type="text" name="milestones[{{ $index }}][year]"
                                value="{{ $milestone['year'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                            <input type="text" name="milestones[{{ $index }}][title]"
                                value="{{ $milestone['title'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                            <textarea name="milestones[{{ $index }}][description]"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                rows="3">{{ $milestone['description'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-slate-500 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                    <span class="material-icons-outlined text-3xl mb-2 block">add_circle_outline</span>
                    <p class="text-sm">No milestones yet. Click "Add Milestone" to start.</p>
                </div>
                @endforelse
            </div>

            <button type="button" onclick="addMilestone()"
                class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg text-sm font-semibold hover:bg-purple-700 transition-colors flex items-center justify-center gap-2">
                <span class="material-icons-outlined text-sm">add</span>
                Add Milestone
            </button>
        </div>

        <script>
            function addMilestone() {
                const container = document.getElementById('milestones-container');
                const items = container.querySelectorAll('.milestone-item');
                const index = items.length;

                // Remove empty state if exists
                const emptyState = container.querySelector('.text-center');
                if (emptyState) emptyState.remove();

                const div = document.createElement('div');
                div.className = 'milestone-item border border-slate-200 p-4 rounded-xl bg-slate-50';
                div.setAttribute('data-index', index);
                div.innerHTML = `
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold text-slate-700">Milestone ${index + 1}</span>
                        <button type="button" onclick="removeMilestone(this)"
                            class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-colors">
                            <span class="material-icons-outlined text-sm">delete</span>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Tahun</label>
                            <input type="text" name="milestones[${index}][year]"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Title</label>
                            <input type="text" name="milestones[${index}][title]"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                            <textarea name="milestones[${index}][description]"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                rows="3"></textarea>
                        </div>
                    </div>
                `;
                container.appendChild(div);
            }

            function removeMilestone(btn) {
                const item = btn.closest('.milestone-item');
                item.remove();
                // Re-index remaining items
                const items = document.querySelectorAll('.milestone-item');
                items.forEach((item, idx) => {
                    item.setAttribute('data-index', idx);
                    item.querySelector('.text-sm.font-semibold').textContent = `Milestone ${idx + 1}`;
                    // Update input names
                    item.querySelectorAll('input, textarea').forEach(input => {
                        const name = input.getAttribute('name');
                        if (name) {
                            input.setAttribute('name', name.replace(/milestones\[\d+\]/, `milestones[${idx}]`));
                        }
                    });
                });
            }
        </script>

    </form>
</div>