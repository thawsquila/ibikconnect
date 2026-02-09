<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\BeiEvent;
use App\Models\BeiRegistration;

class BEIController extends Controller
{
    public function index()
    {
        return view('bei.home');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'nim' => ['nullable','string','max:50'],
            'email' => ['required','email','max:255'],
            'event' => ['required','string','max:255'],
        ]);

        // Cari event berdasarkan judul (opsional). Jika tidak ada, simpan hanya judul.
        $event = BeiEvent::where('title', $data['event'])->first();

        BeiRegistration::create([
            'event_id' => $event?->id,
            'name' => $data['name'],
            'nim' => $data['nim'] ?? null,
            'email' => $data['email'],
            'event_title' => $data['event'],
        ]);

        return back()->with('status', 'Pendaftaran terkirim. Terima kasih!');
    }
}
