<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeiGallery;
use Illuminate\Http\Request;

/**
 * BEI Gallery Controller
 * 
 * Handles CRUD operations for BEI gallery photos
 */
class BeiGalleryController extends Controller
{
    /**
     * Display a listing of gallery photos
     */
    public function index()
    {
        $galleries = BeiGallery::latest()->paginate(24);
        return view('bei.admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery photo
     */
    public function create()
    {
        return view('bei.admin.galleries.create');
    }

    /**
     * Store a newly created gallery photo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image_path' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('bei/galleries', 'public');
            }

            BeiGallery::create($validated);

            return redirect()
                ->route('admin.bei.galleries.index')
                ->with('success', 'Foto berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan foto: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified gallery photo
     */
    public function edit(BeiGallery $gallery)
    {
        return view('bei.admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery photo
     */
    public function update(Request $request, BeiGallery $gallery)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        try {
            // Handle image upload if present
            if ($request->hasFile('image_path')) {
                // Delete old image
                if ($gallery->image_path) {
                    \Storage::disk('public')->delete($gallery->image_path);
                }
                $validated['image_path'] = $request->file('image_path')->store('bei/galleries', 'public');
            }

            $gallery->update($validated);

            return redirect()
                ->route('admin.bei.galleries.index')
                ->with('success', 'Foto berhasil diupdate!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal mengupdate foto: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified gallery photo
     */
    public function destroy(BeiGallery $gallery)
    {
        try {
            // Delete image
            if ($gallery->image_path) {
                \Storage::disk('public')->delete($gallery->image_path);
            }

            $gallery->delete();

            return redirect()
                ->route('admin.bei.galleries.index')
                ->with('success', 'Foto berhasil dihapus!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }
}
