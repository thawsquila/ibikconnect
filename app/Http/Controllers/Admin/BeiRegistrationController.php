<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeiEvent;
use App\Models\BeiRegistration;
use Illuminate\Http\Request;

class BeiRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = BeiRegistration::with('event')->latest();

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $registrations = $query->paginate(20)->withQueryString();
        $events = BeiEvent::orderBy('starts_at', 'desc')->get();

        return view('bei.admin.registrations.index', compact('registrations', 'events'));
    }

    public function updateStatus(Request $request, BeiRegistration $registration)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $registration->update(['status' => $validated['status']]);

        $statusText = ['approved' => 'disetujui', 'rejected' => 'ditolak', 'pending' => 'dikembalikan ke pending'];

        return back()->with('success', 'Pendaftaran berhasil ' . $statusText[$validated['status']] . '!');
    }

    public function destroy(BeiRegistration $registration)
    {
        try {
            $registration->delete();
            return back()->with('success', 'Pendaftaran berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}
