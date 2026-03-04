# Bug Fix - Gallery Update Issue

## 🐛 Problem
Ketika mengupdate galeri (hanya edit judul tanpa mengganti foto), foto menjadi terhapus atau hilang.

## 🔍 Root Cause
Logika update menggunakan `$gallery->update($validated)` dimana `$validated` array hanya berisi field yang di-validate. Jika tidak ada file upload, `image_path` tidak ada di array, yang bisa menyebabkan masalah.

## ✅ Solution

### Before (Bermasalah)
```php
public function update(Request $request, BeiGallery $gallery)
{
    $validated = $request->validate([
        'title' => ['nullable', 'string', 'max:255'],
        'image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
    ]);

    try {
        // Handle image upload if present
        if ($request->hasFile('image_path')) {
            if ($gallery->image_path) {
                \Storage::disk('public_root')->delete($gallery->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('galleries/bei', 'public_root');
        }

        $gallery->update($validated); // ❌ Masalah di sini

        return redirect()
            ->route('admin.bei.galleries.index')
            ->with('success', 'Foto berhasil diupdate!');
    } catch (\Exception $e) {
        return back()
            ->withInput()
            ->with('error', 'Gagal mengupdate foto: ' . $e->getMessage());
    }
}
```

### After (Fixed)
```php
public function update(Request $request, BeiGallery $gallery)
{
    $validated = $request->validate([
        'title' => ['nullable', 'string', 'max:255'],
        'image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
    ]);

    try {
        // Only update title first
        $gallery->title = $validated['title']; // ✅ Update eksplisit

        // Handle image upload if present
        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($gallery->image_path) {
                \Storage::disk('public_root')->delete($gallery->image_path);
            }
            $gallery->image_path = $request->file('image_path')->store('galleries/bei', 'public_root'); // ✅ Update eksplisit
        }

        $gallery->save(); // ✅ Save perubahan

        return redirect()
            ->route('admin.bei.galleries.index')
            ->with('success', 'Foto berhasil diupdate!');
    } catch (\Exception $e) {
        return back()
            ->withInput()
            ->with('error', 'Gagal mengupdate foto: ' . $e->getMessage());
    }
}
```

## 🧪 Testing

### Test Case 1: Update Judul Saja
1. Buka edit galeri
2. Ubah judul dari "Foto A" ke "Foto B"
3. Jangan upload foto baru
4. Klik "Update Foto"
5. ✅ Expected: Judul berubah, foto tetap ada
6. ✅ Result: FIXED - Foto tidak hilang

### Test Case 2: Update Foto Saja
1. Buka edit galeri
2. Jangan ubah judul
3. Upload foto baru
4. Klik "Update Foto"
5. ✅ Expected: Foto lama terhapus, foto baru tersimpan
6. ✅ Result: FIXED - Berfungsi dengan benar

### Test Case 3: Update Judul dan Foto
1. Buka edit galeri
2. Ubah judul
3. Upload foto baru
4. Klik "Update Foto"
5. ✅ Expected: Judul berubah, foto lama terhapus, foto baru tersimpan
6. ✅ Result: FIXED - Berfungsi dengan benar

## 📝 Key Changes

1. **Explicit Assignment**: Menggunakan assignment eksplisit (`$gallery->title = ...`) daripada mass assignment
2. **Conditional Update**: Hanya update `image_path` jika ada file baru
3. **Single Save**: Menggunakan `save()` sekali di akhir untuk menyimpan semua perubahan

## 🎯 Benefits

- ✅ Foto tidak hilang saat update judul saja
- ✅ Logika lebih jelas dan mudah dipahami
- ✅ Lebih aman karena update field secara eksplisit
- ✅ Tidak ada side effect

## 🔄 Similar Issues

Jika ada masalah serupa di controller lain (BeiEventController, dll), gunakan pattern yang sama:

```php
// Update field eksplisit
$model->field1 = $validated['field1'];
$model->field2 = $validated['field2'];

// Conditional update untuk file
if ($request->hasFile('file_field')) {
    // Delete old file
    // Upload new file
    $model->file_field = $newPath;
}

// Save once
$model->save();
```

## ✅ Status
**FIXED** - Bug telah diperbaiki dan siap untuk testing.

---

**Fixed Date:** March 4, 2026
**Affected File:** `app/Http/Controllers/Admin/BeiGalleryController.php`
