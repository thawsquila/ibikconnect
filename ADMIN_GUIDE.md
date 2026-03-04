# Panduan Admin - IBI Connect

## URL Admin Panel
```
http://127.0.0.1:8000/admin-page
```

## Login Admin
- URL: `http://127.0.0.1:8000/login`
- Gunakan kredensial admin yang sudah dibuat di database

## Fitur BEI Admin

### 1. Kelola Galeri
**URL:** `http://127.0.0.1:8000/admin-page/bei/galleries`

**Fitur:**
- ✅ Lihat semua foto galeri (Grid view dengan pagination)
- ✅ Upload foto baru (dengan preview)
- ✅ Edit judul foto
- ✅ Hapus foto
- ✅ Foto disimpan di: `public/galleries/bei/`

**Format File:**
- JPG, PNG, JPEG, WEBP
- Maksimal 5MB

### 2. Kelola Edukasi
**URL:** `http://127.0.0.1:8000/admin-page/bei/educations`

**Fitur:**
- ✅ Lihat semua materi edukasi
- ✅ Tambah materi baru
- ✅ Edit materi
- ✅ Hapus materi
- ✅ Support Markdown untuk konten

**Field:**
- Judul (required)
- Konten (optional, support Markdown)

### 3. Kelola Event
**URL:** `http://127.0.0.1:8000/admin-page/bei/events`

**Fitur:**
- ✅ Lihat semua event
- ✅ Tambah event baru
- ✅ Edit event
- ✅ Hapus event
- ✅ Upload banner event
- ✅ Atur status publikasi
- ✅ Buka/tutup pendaftaran
- ✅ Lihat daftar peserta terdaftar

**Field:**
- Judul (required)
- Deskripsi (optional)
- Tanggal & Waktu (optional)
- Lokasi (optional)
- Kapasitas Maksimal (optional, unlimited jika kosong)
- Banner Image (optional, max 3MB)
- Status Publikasi (checkbox)
- Status Pendaftaran (checkbox)

## Perubahan Penting

### Storage Galeri
Foto galeri sekarang disimpan langsung di folder `public/` bukan di `storage/app/public/`:
- Path: `public/galleries/bei/`
- URL: `http://127.0.0.1:8000/galleries/bei/nama-file.jpg`

### Boolean Checkbox
Checkbox untuk field boolean (is_published, is_registration_open) sudah diperbaiki:
- Checked = true
- Unchecked = false
- Menggunakan `$request->has()` untuk menangani checkbox

## Testing CRUD

### Test Galeri:
1. Buka `http://127.0.0.1:8000/admin-page/bei/galleries`
2. Klik "Upload Foto"
3. Pilih gambar dan isi judul (optional)
4. Submit form
5. Foto akan muncul di grid
6. Test edit dan hapus

### Test Edukasi:
1. Buka `http://127.0.0.1:8000/admin-page/bei/educations`
2. Klik "Tambah Materi"
3. Isi judul dan konten
4. Submit form
5. Test edit dan hapus

### Test Event:
1. Buka `http://127.0.0.1:8000/admin-page/bei/events`
2. Klik "Tambah Event"
3. Isi semua field
4. Upload banner (optional)
5. Centang checkbox publikasi dan pendaftaran
6. Submit form
7. Test edit dan hapus
8. Test uncheck checkbox untuk melihat perubahan status

## Troubleshooting

### Foto tidak muncul:
- Pastikan folder `public/galleries/bei/` ada
- Cek permission folder (755)
- Cek path di database

### Checkbox tidak berfungsi:
- Sudah diperbaiki di controller
- Menggunakan `$request->has()` untuk menangani checkbox

### Upload gagal:
- Cek max file size di php.ini
- Cek permission folder
- Cek format file yang diupload
