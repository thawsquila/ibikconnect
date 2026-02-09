<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeiRegistration;
use Illuminate\Http\Request;

/**
 * BEI Registration Management Controller
 * 
 * Handles member registrations from public form
 */
class BeiRegistrationController extends Controller
{
    /**
     * Display a listing of registrations
     */
    public function index()
    {
        $registrations = BeiRegistration::whereNull('event_id')
            ->orWhere('event_title', 'Pendaftaran Member Gallery BEI')
            ->latest()
            ->paginate(20);
        
        return view('bei.admin.registrations.index', compact('registrations'));
    }

    /**
     * Update registration status
     */
    public function updateStatus(Request $request, BeiRegistration $registration)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $registration->update(['status' => $validated['status']]);

        $statusText = [
            'approved' => 'disetujui',
            'rejected' => 'ditolak',
            'pending' => 'dikembalikan ke pending',
        ];

        return back()->with('success', 'Pendaftaran berhasil ' . $statusText[$validated['status']] . '!');
    }

    /**
     * Delete registration
     */
    public function destroy(BeiRegistration $registration)
    {
        try {
            $registration->delete();
            return back()->with('success', 'Pendaftaran berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus pendaftaran: ' . $e->getMessage());
        }
    }
}
