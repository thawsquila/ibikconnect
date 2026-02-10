<?php

namespace App\Http\Controllers;

use App\Models\CdcJobListing;
use App\Models\CdcEvent;
use App\Models\CdcNews;
use App\Models\CdcEventRegistration;
use Illuminate\Http\Request;

class CDCController extends Controller
{
    /**
     * Landing page CDC
     */
    public function index()
    {
        // Get latest jobs (6 items for home page)
        $jobs = CdcJobListing::active()
            ->latest()
            ->limit(6)
            ->get();

        // Get upcoming events (4 items for home page)
        $events = CdcEvent::active()
            ->where('starts_at', '>=', now())
            ->orderBy('starts_at', 'asc')
            ->limit(4)
            ->get();

        // Get latest news (6 items for home page)
        $news = CdcNews::published()
            ->latest('published_at')
            ->limit(6)
            ->get();

        return view('cdc.home', compact('jobs', 'events', 'news'));
    }

    /**
     * List all job listings
     */
    public function jobs()
    {
        $jobs = CdcJobListing::active()
            ->latest()
            ->paginate(12);
        
        return view('cdc.jobs.index', compact('jobs'));
    }

    /**
     * Show job detail
     */
    public function jobDetail(CdcJobListing $job)
    {
        if (!$job->is_active) {
            abort(404);
        }

        $relatedJobs = CdcJobListing::active()
            ->where('id', '!=', $job->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('cdc.jobs.detail', compact('job', 'relatedJobs'));
    }

    /**
     * List all events
     */
    public function events()
    {
        $events = CdcEvent::published()
            ->latest('start_date')
            ->paginate(12);
        
        return view('cdc.events.index', compact('events'));
    }

    /**
     * Show event detail
     */
    public function eventDetail(CdcEvent $event)
    {
        if (!$event->is_published) {
            abort(404);
        }

        $relatedEvents = CdcEvent::published()
            ->where('id', '!=', $event->id)
            ->latest('start_date')
            ->limit(3)
            ->get();

        return view('cdc.events.detail', compact('event', 'relatedEvents'));
    }

    /**
     * Register for event
     */
    public function registerEvent(Request $request, CdcEvent $event)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'nim' => ['required', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        // Check if registration is open
        if (!$event->is_registration_open) {
            return back()->with('error', 'Pendaftaran untuk event ini sudah ditutup.');
        }

        // Check if event is full
        if ($event->max_participants && $event->registered_count >= $event->max_participants) {
            return back()->with('error', 'Maaf, kuota peserta sudah penuh.');
        }

        // Create registration
        CdcEventRegistration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'nim' => $validated['nim'],
            'message' => $validated['message'] ?? null,
            'registered_at' => now(),
            'status' => 'pending',
        ]);

        // Increment registered count
        $event->increment('registered_count');

        return back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }

    /**
     * List all news
     */
    public function news()
    {
        $news = CdcNews::published()
            ->latest('published_at')
            ->paginate(12);
        
        return view('cdc.news.index', compact('news'));
    }

    /**
     * Show news detail
     */
    public function newsDetail(CdcNews $news)
    {
        if (!$news->is_published) {
            abort(404);
        }

        $relatedNews = CdcNews::published()
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('cdc.news.detail', compact('news', 'relatedNews'));
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('cdc.contact');
    }
}
