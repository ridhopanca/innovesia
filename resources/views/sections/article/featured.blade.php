@php
$badge = $data['badge'] ?? 'Featured';
$readTime = $data['read_time'] ?? '12 min read';
$title = $data['title'] ?? 'The Architect of Change: Why Human-Centered Design is the New Corporate Strategy';
$description = $data['description'] ?? 'As algorithmic efficiency peaks, the next frontier of competitive advantage lies in deep empathy and the nuances of human experience.';
$image = $data['image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCoSDdjHr06Dif6cDbaPiUM4w6Y0qqWeUnj46EjbypDsqLWwswy6HykvBnSCTh1StfsqeEn6dWdrkQXxZEG_m6b2St73YcgKocULJoZ7U8BNY6gpnLViDNh--_61At7Ozl33R7rbJdJ8U2VbCunFZRGRGlWzpSXatxd1d1tkwnbBpklZzIhcQifUUydn7Ba12RxNTHg99M7FQ0x7JQvHCf6XbWmnxDxIvDfNA5oFM38tcMUht7I_dp6F31Aw2IHUT_vddLVSueqvaiu';
$slug = $data['slug'] ?? '';
// Auto-generate slug from title if not set or empty
if (empty($slug) && !empty($title)) {
$generatedSlug = strtolower(preg_replace('/[^a-z0-9]+/', '-', $title));
$generatedSlug = trim($generatedSlug, '-');
$slug = '/artikel/' . $generatedSlug;
}
$slug = $slug ?: '#';
$author = $data['author'] ?? [];
$authorName = $author['name'] ?? 'Dr. Marcus Chen';
$authorRole = $author['role'] ?? 'Lead Strategist, Innovesia';
$authorImage = $author['image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuCqXdXXrTSfglbLy97L_Na5IWNR1AldpQ7VM8qenKoNEQf-45hDzYjgnwKB6KY880rVMBHglKLuSc_azJAt5R9OTpshykNlmtR026_KIu_yZI3lsbtxNybeopM681UCsbU9DU6NFUFGliZZzBI5Jw0xdZ6jHkE1mUuOWPly1qK11wVJpcJXfnV5QttGY_ygW4uD-YwI0Dfaq71_gpnJGjEhPSZDziBlIakzyO7QO-hb8vAlsA4PaTzlMPM74fFBWzFLi256bAM2EK4m';
@endphp

<section class="mb-24">
    <a href="{{ $slug }}" class="group block">
        <div class="relative grid grid-cols-1 lg:grid-cols-12 gap-0 overflow-hidden rounded-xl bg-surface-container-lowest shadow-[0_20px_40px_rgba(0,30,64,0.04)] hover:shadow-[0_20px_50px_rgba(0,30,64,0.08)] transition-shadow duration-300" data-animate="fade-up">
            <div class="lg:col-span-7 relative h-[400px] lg:h-[600px] overflow-hidden">
                <img alt="{{ $title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $image }}" />
            </div>
            <div class="lg:col-span-5 p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                <div class="flex items-center gap-4 mb-8">
                    <span class="px-3 py-1 rounded-full bg-on-tertiary-fixed text-tertiary-fixed text-[10px] font-bold tracking-widest uppercase">{{ $badge }}</span>
                    <span class="text-sm text-outline flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">schedule</span> {{ $readTime }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-primary mb-6 leading-tight group-hover:text-on-primary-container transition-colors">
                    {{ $title }}
                </h2>
                <p class="text-lg text-on-surface-variant mb-10 leading-relaxed max-w-md">
                    {{ $description }}
                </p>
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-full bg-surface-container-high flex items-center justify-center overflow-hidden">
                        <img alt="{{ $authorName }}" class="w-full h-full object-cover" src="{{ $authorImage }}" />
                    </div>
                    <div>
                        <p class="text-sm font-bold text-primary">{{ $authorName }}</p>
                        <p class="text-xs text-outline">{{ $authorRole }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</section>