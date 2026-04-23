@php
// Handle tags - could be array or comma-separated string from DB
$rawTags = $data['tags'] ?? [];
if (is_string($rawTags)) {
$tags = array_filter(array_map('trim', explode(',', $rawTags)));
} else {
$tags = $rawTags;
}
$activeFilter = request()->query('filter', $data['active_filter'] ?? 'all');
@endphp

<header class="mb-16" data-animate="fade-up">
    @if(isset($data['subtitle']))
    <span class="font-label text-xs uppercase tracking-[0.2em] text-outline mb-4 block">{{ $data['subtitle'] }}</span>
    @endif
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
        @if(isset($data['title']))
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter text-primary leading-none">
            {{ $data['title'] }}
            @if(isset($data['title_highlight']))
            <span class="text-on-primary-container">{{ $data['title_highlight'] }}</span>
            @endif
        </h1>
        @endif
        <div class="flex flex-wrap gap-2" id="tag-filters">
            <a href="{{ request()->url() }}"
                class="px-5 py-2 rounded-full text-sm font-medium transition-colors {{ $activeFilter === 'all' ? 'bg-primary text-white' : 'bg-secondary-container text-on-secondary-container hover:bg-surface-container-high' }}">
                All Insights
            </a>
            @foreach($tags as $tag)
            <a href="{{ request()->url() }}?filter={{ urlencode($tag) }}"
                class="px-5 py-2 rounded-full text-sm font-medium transition-colors {{ $activeFilter === $tag ? 'bg-primary text-white' : 'bg-secondary-container text-on-secondary-container hover:bg-surface-container-high' }}">
                {{ $tag }}
            </a>
            @endforeach
        </div>
    </div>
</header>