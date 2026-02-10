<?php

namespace App\Http\Controllers;

use App\Models\BeiEvent;
use App\Models\BeiEducation;
use App\Models\BeiGallery;
use App\Models\BeiRegistration;
use Illuminate\Http\Request;

class BEIController extends Controller
{
    /**
     * Landing page BEI
     */
    public function index()
    {
        // Get latest educations (3 items for home page)
        $educations = BeiEducation::latest()
            ->limit(3)
            ->get();

        // Get latest galleries (4 items for home page)
        $galleries = BeiGallery::latest()
            ->limit(4)
            ->get();

        return view('bei.home', compact('educations', 'galleries'));
    }

    /**
     * Profile page
     */
    public function profile()
    {
        return view('bei.profile');
    }

    /**
     * List all education materials
     */
    public function educations()
    {
        $educations = BeiEducation::latest()->paginate(12);
        return view('bei.educations.index', compact('educations'));
    }

    /**
     * Show education detail
     */
    public function educationDetail(BeiEducation $education)
    {
        $relatedEducations = BeiEducation::where('id', '!=', $education->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('bei.educations.detail', compact('education', 'relatedEducations'));
    }

    /**
     * List all events
     */
    public function events()
    {
        $events = BeiEvent::published()
            ->latest('starts_at')
            ->paginate(12);
        
        return view('bei.events.index', compact('events'));
    }

    /**
     * Show event detail
     */
    public function eventDetail(BeiEvent $event)
    {
        if (!$event->is_published) {
            abort(404);
        }

        $relatedEvents = BeiEvent::published()
            ->where('id', '!=', $event->id)
            ->latest('starts_at')
            ->limit(3)
            ->get();

        return view('bei.events.detail', compact('event', 'relatedEvents'));
    }

    /**
     * Register for event
     */
    public function registerEvent(Request $request, BeiEvent $event)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
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
        BeiRegistration::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'nim' => $validated['nim'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'event_title' => $event->title,
            'status' => 'pending',
        ]);

        // Increment registered count
        $event->increment('registered_count');

        return back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }

    /**
     * Gallery page
     */
    public function gallery()
    {
        $galleries = BeiGallery::latest()->paginate(24);
        return view('bei.gallery', compact('galleries'));
    }

    /**
     * Registration form page
     */
    public function registration()
    {
        return view('bei.registration');
    }

    /**
     * Submit registration
     */
    public function submitRegistration(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        BeiRegistration::create([
            'event_id' => null,
            'name' => $validated['name'],
            'nim' => $validated['nim'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'event_title' => 'Pendaftaran Member Gallery BEI',
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pendaftaran terkirim. Terima kasih! Tim kami akan menghubungi Anda segera.');
    }
}
