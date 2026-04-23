@extends('layouts.app')

@section('main_classes', 'pt-32 pb-24 max-w-4xl mx-auto px-8')
@section('footer_classes', 'w-full border-t border-slate-200/50 dark:border-slate-800/50 bg-slate-50 dark:bg-slate-950')

@section('content')

@php
$article = $data['article'] ?? [];
$title = $article['title'] ?? 'Artikel Tidak Ditemukan';
$description = $article['description'] ?? '';
$image = $article['image'] ?? '';
$category = $article['category'] ?? '';
$readTime = $article['read_time'] ?? '';
$slug = $article['slug'] ?? '';
$content = $article['content'] ?? '<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
<p class="mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>';
$author = $article['author'] ?? [];
$authorName = $author['name'] ?? 'Tim Innovesia';
$authorRole = $author['role'] ?? 'Editor';
$authorImage = $author['image'] ?? '';
$publishedAt = $article['published_at'] ?? now()->format('d M Y');
@endphp

<!-- Back Link -->
<a href="{{ route('articles') }}{{ $category ? '?filter='.urlencode($category) : '' }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-primary transition-colors mb-8">
    <span class="material-symbols-outlined">arrow_back</span>
    Back to article {{ $category ? '· '.$category : '' }}
</a>

<!-- Article Header -->
<header class="mb-12" data-animate="fade-up">
    @if($category)
    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] font-bold tracking-widest uppercase text-on-secondary-container px-3 py-1.5 bg-secondary-container rounded">
            {{ $category }}
        </span>
        @if($readTime)
        <span class="text-sm text-outline flex items-center gap-1">
            <span class="material-symbols-outlined text-base">schedule</span> {{ $readTime }}
        </span>
        @endif
    </div>
    @endif

    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tighter text-primary leading-tight mb-6">
        {{ $title }}
    </h1>

    @if($description)
    <p class="text-xl text-on-surface-variant leading-relaxed max-w-2xl">
        {{ $description }}
    </p>
    @endif
</header>

<!-- Featured Image -->
@if($image)
<div class="mb-12 rounded-2xl overflow-hidden bg-surface-container-low" data-animate="fade-up">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-auto object-cover max-h-[500px]" />
</div>
@endif

<!-- Author Info -->
<div class="flex items-center gap-4 mb-12 p-6 bg-surface-container-lowest rounded-xl" data-animate="fade-up">
    <div class="h-14 w-14 rounded-full bg-primary-container flex items-center justify-center overflow-hidden flex-shrink-0">
        @if($authorImage)
        <img alt="{{ $authorName }}" class="w-full h-full object-cover" src="{{ $authorImage }}" />
        @else
        <span class="text-lg font-bold text-on-primary-container">{{ substr($authorName, 0, 2) }}</span>
        @endif
    </div>
    <div>
        <p class="font-bold text-primary">{{ $authorName }}</p>
        <p class="text-sm text-outline">{{ $authorRole }} · {{ $publishedAt }}</p>
    </div>
</div>

<!-- Article Content -->
<article class="prose prose-lg max-w-none prose-headings:text-primary prose-p:text-on-surface-variant prose-a:text-primary hover:prose-a:text-on-primary-container prose-strong:text-primary" data-animate="fade-up">
    {!! $content !!}
</article>

<!-- Share Section -->
<div class="mt-16 pt-8 border-t border-surface-container-high" data-animate="fade-up">
    <p class="text-sm font-medium text-slate-500 mb-4">Bagikan artikel ini</p>
    <div class="flex gap-3">
        <button onclick="shareArticle('twitter')" class="p-3 rounded-full bg-surface-container-low hover:bg-surface-container-high transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
            </svg>
        </button>
        <button onclick="shareArticle('facebook')" class="p-3 rounded-full bg-surface-container-low hover:bg-surface-container-high transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
            </svg>
        </button>
        <button onclick="shareArticle('linkedin')" class="p-3 rounded-full bg-surface-container-low hover:bg-surface-container-high transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
            </svg>
        </button>
        <button onclick="copyLink()" class="p-3 rounded-full bg-surface-container-low hover:bg-surface-container-high transition-colors" title="Copy Link">
            <span class="material-symbols-outlined">link</span>
        </button>
    </div>
</div>

<!-- Related Articles -->
@if(!empty($data['related_articles']))
<div class="mt-20" data-animate="fade-up">
    <h2 class="text-2xl font-bold text-primary mb-8">Artikel Terkait</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($data['related_articles'] as $related)
        <a href="{{ $related['slug'] ?? '#' }}" class="group block">
            <div class="aspect-[4/3] rounded-xl overflow-hidden mb-4 bg-surface-container-low">
                <img src="{{ $related['image'] ?? 'https://placehold.co/600x400/e2e8f0/94a3b8?text=No+Image' }}"
                    alt="{{ $related['title'] ?? '' }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            </div>
            <h3 class="font-bold text-primary group-hover:text-on-primary-container transition-colors line-clamp-2">
                {{ $related['title'] ?? 'Untitled' }}
            </h3>
        </a>
        @endforeach
    </div>
</div>
@endif

<script>
    function shareArticle(platform) {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        let shareUrl = '';

        switch (platform) {
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                break;
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                break;
            case 'linkedin':
                shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                break;
        }

        if (shareUrl) {
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    }

    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link berhasil disalin!');
        }).catch(() => {
            // Fallback
            const input = document.createElement('input');
            input.value = window.location.href;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            alert('Link berhasil disalin!');
        });
    }
</script>

@endsection