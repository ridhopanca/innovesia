@php
$articles = $data['articles'] ?? [];
$filter = request()->query('filter', 'all');

// Filter articles by category
$filteredArticles = $filter === 'all'
? $articles
: array_filter($articles, fn($a) => ($a['category'] ?? '') === $filter);

// Reset array keys after filtering
$filteredArticles = array_values($filteredArticles);
@endphp

<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12" data-animate="stagger" id="articles-grid">
    @forelse($filteredArticles as $index => $article)
    @php
    // Generate article URL - use slug if available, otherwise use index-based URL
    $articleSlug = $article['slug'] ?? '';
    if (empty($articleSlug) && !empty($article['title'])) {
    // Auto-generate slug from title if not set
    $generatedSlug = strtolower(preg_replace('/[^a-z0-9]+/', '-', $article['title']));
    $generatedSlug = trim($generatedSlug, '-');
    $articleSlug = '/artikel/' . $generatedSlug;
    }
    $articleUrl = $articleSlug ?: route('article.detail', ['slug' => 'article-' . $index]);
    @endphp
    <article class="article-card flex flex-col" data-category="{{ $article['category'] ?? '' }}">
        <a href="{{ $articleUrl }}" class="group block">
            <div class="aspect-[4/3] rounded-xl overflow-hidden mb-6 bg-surface-container-low">
                <img alt="{{ $article['title'] ?? 'Article Image' }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    src="{{ $article['image'] ?? 'https://placehold.co/600x400/e2e8f0/94a3b8?text=No+Image' }}" />
            </div>
        </a>
        <div class="flex items-center justify-between mb-4">
            <span class="text-[11px] font-bold tracking-widest uppercase text-on-secondary-container px-2 py-0.5 bg-secondary-container rounded">
                {{ $article['category'] ?? 'Uncategorized' }}
            </span>
            <span class="text-xs text-outline font-label">{{ $article['read_time'] ?? '5 min read' }}</span>
        </div>
        <a href="{{ $articleUrl }}" class="group block">
            <h3 class="text-xl font-bold text-primary mb-3 leading-snug group-hover:text-on-primary-container transition-colors">
                {{ $article['title'] ?? 'Untitled Article' }}
            </h3>
        </a>
        <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">
            {{ $article['description'] ?? 'No description available.' }}
        </p>
    </article>
    @empty
    <div class="col-span-full text-center py-16">
        <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">article</span>
        <p class="text-slate-500 text-lg">Tidak ada artikel untuk kategori ini.</p>
        <a href="{{ request()->url() }}" class="inline-block mt-4 px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
            Lihat Semua Artikel
        </a>
    </div>
    @endforelse
</section>