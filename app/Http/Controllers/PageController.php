<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $sections = $page->sections->mapWithKeys(function ($section) {
            return [$section->type => $section->content ?? []];
        });

        return view('pages.' . $page->template, compact('page', 'sections'));
    }

    public function articleDetail($slug)
    {
        // Find the articles page
        $page = Page::where('slug', 'articles')->firstOrFail();

        // Get all sections
        $sections = $page->sections->mapWithKeys(function ($section) {
            return [$section->type => $section->content ?? []];
        });

        // Find the article from article grid section
        $articleData = $sections['article'] ?? [];
        $articles = $articleData['articles'] ?? [];

        // Helper function to generate slug from title
        $generateSlug = function ($title) {
            $slug = strtolower(preg_replace('/[^a-z0-9]+/', '-', $title));
            return trim($slug, '-');
        };

        // Find article by slug (exact match or auto-generated from title)
        $article = null;
        $searchSlug = $slug;

        foreach ($articles as $index => $a) {
            $articleSlug = $a['slug'] ?? '';

            // Check exact slug match
            if ($articleSlug === '/artikel/' . $searchSlug || $articleSlug === $searchSlug) {
                $article = $a;
                $article['id'] = $index;
                break;
            }

            // Check auto-generated slug from title
            if (!empty($a['title'])) {
                $generatedSlug = $generateSlug($a['title']);
                if ($generatedSlug === $searchSlug) {
                    $article = $a;
                    $article['id'] = $index;
                    break;
                }
            }
        }

        // If not found, check featured section
        if (!$article) {
            $featured = $sections['featured'] ?? [];
            $featuredSlug = $featured['slug'] ?? '';
            $featuredTitleSlug = !empty($featured['title']) ? $generateSlug($featured['title']) : '';

            if (
                $featuredSlug === '/artikel/' . $searchSlug ||
                $featuredSlug === $searchSlug ||
                $featuredTitleSlug === $searchSlug
            ) {
                $article = [
                    'id' => 'featured',
                    'title' => $featured['title'] ?? '',
                    'description' => $featured['description'] ?? '',
                    'image' => $featured['image'] ?? '',
                    'category' => $featured['badge'] ?? 'Featured',
                    'read_time' => $featured['read_time'] ?? '',
                    'slug' => $featured['slug'] ?? '',
                    'content' => $featured['content'] ?? '<p>Konten lengkap artikel akan ditampilkan di sini.</p>',
                    'author' => $featured['author'] ?? [],
                    'published_at' => $featured['published_at'] ?? now()->format('d M Y'),
                ];
            }
        }

        // Article not found
        if (!$article) {
            abort(404, 'Artikel tidak ditemukan');
        }

        // Ensure article has a slug for URL generation
        if (empty($article['slug']) && !empty($article['title'])) {
            $article['slug'] = '/artikel/' . $generateSlug($article['title']);
        }

        // Find related articles (same category, excluding current)
        $relatedArticles = [];
        $articleCategory = $article['category'] ?? '';
        $currentSlug = $article['slug'] ?? '';

        foreach ($articles as $a) {
            if (($a['category'] ?? '') === $articleCategory && ($a['slug'] ?? '') !== $currentSlug) {
                // Ensure related articles have slugs
                if (empty($a['slug']) && !empty($a['title'])) {
                    $a['slug'] = '/artikel/' . $generateSlug($a['title']);
                }
                $relatedArticles[] = $a;
                if (count($relatedArticles) >= 3) {
                    break;
                }
            }
        }

        $data = [
            'article' => $article,
            'related_articles' => $relatedArticles,
        ];

        return view('pages.article-detail', compact('page', 'data'));
    }
}
