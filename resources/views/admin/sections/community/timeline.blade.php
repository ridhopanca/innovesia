@php
$data = $section->draft_content ?? $section->content ?? [];
$hasDraft = !empty($section->draft_content);
$isPublished = !empty($section->content);

// Default events if empty
if (empty($data['events'])) {
$data['events'] = [
[
'school' => 'SMKN 25 Jakarta',
'status' => 'completed',
'date' => 'April Week 4',
'description' => 'Focused on sustainable product design and eco-entrepreneurship.'
],
[
'school' => 'SMKN 20 Jakarta',
'status' => 'next',
'date' => 'May Week 1',
'description' => 'Digital workflow optimization and user-experience prototyping.'
],
[
'school' => 'SMKN 57 Jakarta',
'status' => 'upcoming',
'date' => 'May Week 3',
'description' => 'Advanced manufacturing techniques and smart factory concepts.'
]
];
}
@endphp

<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">event_note</span>
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

        <!-- Title -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Judul Besar</label>
            <input type="text" name="title"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="{{ $data['title'] ?? 'Timeline Roadmap' }}">
        </div>

        <!-- Subtitle -->
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Subtitle</label>
            <textarea name="subtitle"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                rows="3">{{ $data['subtitle'] ?? 'Tracking our journey across vocational hubs' }}</textarea>
        </div>

        <!-- Events -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-slate-700">Events</h3>
                <button type="button" onclick="addTimelineEvent()" class="text-sm bg-purple-100 text-purple-700 px-3 py-1.5 rounded-lg hover:bg-purple-200 transition-colors">
                    + Add Event
                </button>
            </div>
            <div id="events-container">
                @foreach(($data['events'] ?? []) as $index => $event)
                <div class="event-item border border-slate-200 p-4 rounded-xl bg-slate-50 relative">
                    <button type="button" onclick="removeTimelineEvent(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-icons-outlined">close</span>
                    </button>
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">School</label>
                            <input type="text" name="events[{{ $index }}][school]"
                                value="{{ $event['school'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Status</label>
                            <div class="relative">
                                <select name="events[{{ $index }}][status]"
                                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all appearance-none bg-white cursor-pointer">
                                    <option value="completed" {{ ($event['status'] ?? '') === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="next" {{ ($event['status'] ?? '') === 'next' ? 'selected' : '' }}>Next Session</option>
                                    <option value="upcoming" {{ ($event['status'] ?? '') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                </select>
                                <span class="material-icons-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Date</label>
                            <input type="text" name="events[{{ $index }}][date]"
                                value="{{ $event['date'] ?? '' }}"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                            <textarea name="events[{{ $index }}][description]"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                rows="3">{{ $event['description'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </form>
</div>

<script>
    let eventIndex = `{{ count($data['events'] ?? [])}}`;

    function addTimelineEvent() {
        const container = document.getElementById('events-container');
        const eventHtml = `
            <div class="event-item border border-slate-200 p-4 rounded-xl bg-slate-50 relative">
                <button type="button" onclick="removeTimelineEvent(this)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-icons-outlined">close</span>
                </button>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">School</label>
                        <input type="text" name="events[${eventIndex}][school]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Status</label>
                        <div class="relative">
                            <select name="events[${eventIndex}][status]"
                                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all appearance-none bg-white cursor-pointer">
                                <option value="upcoming">Upcoming</option>
                                <option value="next">Next Session</option>
                                <option value="completed">Completed</option>
                            </select>
                            <span class="material-icons-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Date</label>
                        <input type="text" name="events[${eventIndex}][date]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-slate-600 mb-1 block">Description</label>
                        <textarea name="events[${eventIndex}][description]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            rows="3"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', eventHtml);
        eventIndex++;
    }

    function removeTimelineEvent(button) {
        button.closest('.event-item').remove();
    }
</script>