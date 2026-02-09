<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdcNews;
use App\Services\Cdc\CdcNewsService;
use Illuminate\Http\Request;

/**
 * CDC News Controller
 * 
 * Handles CRUD operations for news/articles in CDC admin panel
 */
class CdcNewsController extends Controller
{
    public function __construct(
        private CdcNewsService $newsService
    ) {}

    /**
     * Display a listing of news articles
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->get('search'),
            'category' => $request->get('category'),
            'is_published' => $request->get('is_published'),
        ];

        $news = $this->newsService->getPaginated($filters, 15);

        return view('cdc.admin.news.index', compact('news', 'filters'));
    }

    /**
     * Show the form for creating a new article
     */
    public function create()
    {
        return view('cdc.admin.news.create');
    }

    /**
     * Store a newly created article
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'category' => ['required', 'string', 'max:255'],
            'is_published' => ['boolean'],
        ]);

        try {
            $validated['author_id'] = auth()->id();
            
            if ($request->boolean('is_published')) {
                $validated['published_at'] = now();
            }

            $this->newsService->create($validated);

            return redirect()
                ->route('cdc.admin.news.index')
                ->with('success', 'Berita berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan berita: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified article
     */
    public function edit(CdcNews $news)
    {
        return view('cdc.admin.news.edit', compact('news'));
    }

    /**
     * Update the specified article
     */
    public function update(Request $request, CdcNews $news)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'category' => ['required', 'string', 'max:255'],
            'is_published' => ['boolean'],
        ]);

        try {
            if ($request->boolean('is_published') && !$news->is_published) {
                $validated['published_at'] = now();
            }

            $this->newsService->update($news, $validated);

            return redirect()
                ->route('cdc.admin.news.index')
                ->with('success', 'Berita berhasil diupdate!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal mengupdate berita: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified article
     */
    public function destroy(CdcNews $news)
    {
        try {
            $this->newsService->delete($news);

            return redirect()
                ->route('cdc.admin.news.index')
                ->with('success', 'Berita berhasil dihapus!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }

    /**
     * Publish an article
     */
    public function publish(CdcNews $news)
    {
        try {
            $this->newsService->publish($news);

            return back()->with('success', 'Berita berhasil dipublikasikan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mempublikasikan berita: ' . $e->getMessage());
        }
    }
}
