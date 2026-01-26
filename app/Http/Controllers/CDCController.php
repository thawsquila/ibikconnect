<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CDCController extends Controller
{
    public function index()
    {
        return view('cdc.home');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'nim' => ['required', 'string', 'max:50'],
            'event' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        // Here you can save to database or send email
        // For now, we'll just return success message
        
        return back()->with('status', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }
}
