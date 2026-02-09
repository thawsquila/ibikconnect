<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeiEvent;
use App\Models\BeiRegistration;
use Illuminate\Http\Request;

class BeiAdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_events' => BeiEvent::count(),
            'total_registrations' => BeiRegistration::count(),
            'total_educations' => \App\Models\BeiEducation::count(),
            'total_galleries' => \App\Models\BeiGallery::count(),
        ];

        $events = BeiEvent::latest('starts_at')->limit(5)->get();
        $registrations = BeiRegistration::latest()->limit(10)->get();
        
        return view('bei.admin.dashboard', compact('stats', 'events', 'registrations'));
    }

    public function storeEvent(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'starts_at' => ['nullable','date'],
            'location' => ['nullable','string','max:255'],
        ]);
        BeiEvent::create($data);
        return back()->with('status', 'Event berhasil dibuat');
    }

    public function deleteEvent(BeiEvent $event)
    {
        $event->delete();
        return back()->with('status', 'Event dihapus');
    }
}
