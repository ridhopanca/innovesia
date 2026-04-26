<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function show($slug)
    {
        $cacheKey = "page_{$slug}";

        $page = Cache::remember($cacheKey, now()->addHours(24), function () use ($slug) {
            $page = Page::where('slug', $slug)->firstOrFail();

            $sections = $page->sections->mapWithKeys(function ($section) {
                return [$section->type => $section->content ?? []];
            });

            return compact('page', 'sections');
        });

        return view('pages.' . $page['page']->template, $page);
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

    /**
     * Show contact page with form
     */
    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact Us - Innovesia'
        ]);
    }

    /**
     * Handle contact form submission
     * TODO: Integrate with Google Sheets API to store submissions
     */
    public function submitContact(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:5000',
            'website' => 'nullable|string|max:255', // Honeypot field
        ]);

        // Honeypot check - if filled, it's likely spam
        if (!empty($validated['website'])) {
            return back()->with('success', 'Thank you for your message!');
        }

        // TODO: Send data to Google Sheets
        // Google Sheets Integration Steps:
        // 1. Create Google Cloud Project & enable Google Sheets API
        // 2. Create Service Account and download JSON credentials
        // 3. Share Google Sheet with service account email
        // 4. Use google/apiclient package to append data
        //
        // Example code structure:
        // $client = new Google_Client();
        // $client->setAuthConfig(storage_path('google-credentials.json'));
        // $client->addScope(Google_Service_Sheets::SPREADSHEETS);
        // $service = new Google_Service_Sheets($client);
        // $spreadsheetId = 'YOUR_SPREADSHEET_ID';
        // $range = 'Sheet1!A:G';
        // $values = [[$validated['name'], $validated['email'], ...]];
        // $service->spreadsheets_values->append($spreadsheetId, $range, new Google_Service_Sheets_ValueRange(['values' => $values]));

        // TODO: Send notification email (optional)
        // Mail::to('hello@innovesia.com')->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
