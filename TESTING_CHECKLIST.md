# Testing Checklist - BEI Admin CRUD

## Prerequisites
1. ✅ Server Laravel berjalan: `php artisan serve`
2. ✅ Database sudah di-migrate
3. ✅ User admin sudah dibuat (seeder)
4. ✅ Folder `public/galleries/bei/` sudah ada

## Login Test
- [ ] Buka `http://127.0.0.1:8000/login`
- [ ] Login dengan kredensial admin
- [ ] Redirect ke dashboard admin

## 1. CRUD Galeri BEI

### URL: `http://127.0.0.1:8000/admin-page/bei/galleries`

#### Create (Upload Foto)
- [ ] Klik tombol "Upload Foto"
- [ ] Form create muncul dengan field:
  - [ ] Judul (optional)
  - [ ] Upload foto (required)
- [ ] Upload foto tanpa judul → Berhasil
- [ ] Upload foto dengan judul → Berhasil
- [ ] Preview foto muncul sebelum submit
- [ ] Foto tersimpan di `public/galleries/bei/`
- [ ] Redirect ke index dengan success message

#### Read (List Galeri)
- [ ] Foto muncul di grid view
- [ ] Judul foto ditampilkan (jika ada)
- [ ] Pagination berfungsi (jika > 24 foto)
- [ ] Hover effect pada foto berfungsi

#### Update (Edit Foto)
- [ ] Klik tombol "Edit" pada foto
- [ ] Form edit muncul dengan data existing
- [ ] Foto saat ini ditampilkan
- [ ] Edit judul saja → Berhasil
- [ ] Ganti foto saja → Berhasil, foto lama terhapus
- [ ] Edit judul dan ganti foto → Berhasil
- [ ] Redirect ke index dengan success message

#### Delete (Hapus Foto)
- [ ] Klik tombol "Hapus"
- [ ] Konfirmasi dialog muncul
- [ ] Klik OK → Foto terhapus dari database dan storage
- [ ] Redirect ke index dengan success message

## 2. CRUD Edukasi BEI

### URL: `http://127.0.0.1:8000/admin-page/bei/educations`

#### Create (Tambah Materi)
- [ ] Klik tombol "Tambah Materi"
- [ ] Form create muncul dengan field:
  - [ ] Judul (required)
  - [ ] Konten (optional, textarea)
- [ ] Submit dengan judul saja → Berhasil
- [ ] Submit dengan judul dan konten → Berhasil
- [ ] Redirect ke index dengan success message

#### Read (List Materi)
- [ ] Materi muncul di table
- [ ] Kolom: Judul, Konten (preview), Tanggal, Aksi
- [ ] Konten di-truncate jika terlalu panjang
- [ ] Pagination berfungsi (jika > 15 materi)

#### Update (Edit Materi)
- [ ] Klik tombol "Edit" pada materi
- [ ] Form edit muncul dengan data existing
- [ ] Edit judul → Berhasil
- [ ] Edit konten → Berhasil
- [ ] Edit judul dan konten → Berhasil
- [ ] Redirect ke index dengan success message

#### Delete (Hapus Materi)
- [ ] Klik tombol "Hapus"
- [ ] Konfirmasi dialog muncul
- [ ] Klik OK → Materi terhapus
- [ ] Redirect ke index dengan success message

## 3. CRUD Event BEI

### URL: `http://127.0.0.1:8000/admin-page/bei/events`

#### Create (Tambah Event)
- [ ] Klik tombol "Tambah Event"
- [ ] Form create muncul dengan field:
  - [ ] Judul (required)
  - [ ] Deskripsi (optional)
  - [ ] Tanggal & Waktu (optional)
  - [ ] Lokasi (optional)
  - [ ] Kapasitas Maksimal (optional)
  - [ ] Banner Image (optional)
  - [ ] Checkbox: Publikasikan event
  - [ ] Checkbox: Buka pendaftaran
- [ ] Submit dengan judul saja → Berhasil
- [ ] Submit dengan semua field → Berhasil
- [ ] Upload banner → Berhasil
- [ ] Checkbox checked → is_published = true
- [ ] Checkbox unchecked → is_published = false
- [ ] Redirect ke index dengan success message

#### Read (List Event)
- [ ] Event muncul di table
- [ ] Kolom: Event, Tanggal, Lokasi, Peserta, Aksi
- [ ] Deskripsi di-truncate jika terlalu panjang
- [ ] Jumlah peserta ditampilkan
- [ ] Pagination berfungsi (jika > 15 event)

#### Update (Edit Event)
- [ ] Klik tombol "Edit" pada event
- [ ] Form edit muncul dengan data existing
- [ ] Banner saat ini ditampilkan (jika ada)
- [ ] Edit judul → Berhasil
- [ ] Edit semua field → Berhasil
- [ ] Ganti banner → Berhasil, banner lama terhapus
- [ ] Uncheck "Publikasikan" → is_published = false
- [ ] Uncheck "Buka pendaftaran" → is_registration_open = false
- [ ] Check kembali checkbox → is_published = true
- [ ] Redirect ke index dengan success message

#### Delete (Hapus Event)
- [ ] Klik tombol "Hapus"
- [ ] Konfirmasi dialog muncul
- [ ] Klik OK → Event terhapus, banner terhapus
- [ ] Redirect ke index dengan success message

## Error Handling Test

### Validation Errors
- [ ] Submit form kosong → Error validation muncul
- [ ] Upload file > max size → Error muncul
- [ ] Upload file format salah → Error muncul

### Permission Test
- [ ] Login sebagai CDC admin → Tidak bisa akses BEI admin
- [ ] Login sebagai BEI admin → Bisa akses BEI admin
- [ ] Login sebagai super admin → Bisa akses semua

## Success Criteria
✅ Semua checkbox di atas harus tercentang
✅ Tidak ada error di console browser
✅ Tidak ada error di Laravel log
✅ Data tersimpan dengan benar di database
✅ File upload tersimpan di folder yang benar
✅ File lama terhapus saat update/delete
