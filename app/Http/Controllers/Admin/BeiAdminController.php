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
        $events = BeiEvent::orderBy('starts_at', 'asc')->get();
        $registrations = BeiRegistration::latest()->get();
        return view('bei.admin.dashboard', compact('events', 'registrations'));
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
