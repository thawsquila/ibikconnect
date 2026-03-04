# Quick Start Guide - BEI Admin CRUD

## 🚀 Langkah Cepat untuk Testing

### 1. Persiapan
```bash
# Pastikan server berjalan
php artisan serve

# Buka browser
http://127.0.0.1:8000
```

### 2. Login Admin
```
URL: http://127.0.0.1:8000/login

Kredensial (sesuaikan dengan seeder Anda):
- Email: admin@ibik.ac.id
- Password: password
```

### 3. Test Galeri BEI

#### URL: `http://127.0.0.1:8000/admin-page/bei/galleries`

**Test Create:**
1. Klik "Upload Foto"
2. Pilih gambar (JPG/PNG, max 5MB)
3. Isi judul (optional)
4. Klik "Upload Foto"
5. ✅ Foto muncul di grid

**Test Edit:**
1. Klik "Edit" pada foto
2. Ubah judul atau ganti foto
3. Klik "Update Foto"
4. ✅ Perubahan tersimpan

**Test Delete:**
1. Klik "Hapus" pada foto
2. Konfirmasi dialog
3. ✅ Foto terhapus

### 4. Test Edukasi BEI

#### URL: `http://127.0.0.1:8000/admin-page/bei/educations`

**Test Create:**
1. Klik "Tambah Materi"
2. Isi judul: "Pengenalan Pasar Modal"
3. Isi konten: "Materi tentang dasar-dasar pasar modal..."
4. Klik "Simpan Materi"
5. ✅ Materi muncul di table

**Test Edit:**
1. Klik "Edit" pada materi
2. Ubah judul atau konten
3. Klik "Update Materi"
4. ✅ Perubahan tersimpan

**Test Delete:**
1. Klik "Hapus" pada materi
2. Konfirmasi dialog
3. ✅ Materi terhapus

### 5. Test Event BEI

#### URL: `http://127.0.0.1:8000/admin-page/bei/events`

**Test Create:**
1. Klik "Tambah Event"
2. Isi form:
   - Judul: "Workshop Trading Saham"
   - Deskripsi: "Belajar trading saham untuk pemula"
   - Tanggal: Pilih tanggal
   - Lokasi: "Lab Trading Gallery BEI"
   - Kapasitas: 30
   - Upload banner (optional)
   - ✅ Centang "Publikasikan event"
   - ✅ Centang "Buka pendaftaran"
3. Klik "Simpan Event"
4. ✅ Event muncul di table

**Test Edit:**
1. Klik "Edit" pada event
2. Ubah field apapun
3. Test checkbox:
   - Uncheck "Publikasikan" → Save → ✅ Status berubah
   - Check kembali → Save → ✅ Status berubah
4. ✅ Perubahan tersimpan

**Test Delete:**
1. Klik "Hapus" pada event
2. Konfirmasi dialog
3. ✅ Event terhapus

---

## ✅ Success Indicators

### Galeri
- ✅ Foto muncul di grid dengan thumbnail
- ✅ Foto tersimpan di `public/galleries/bei/`
- ✅ URL foto: `http://127.0.0.1:8000/galleries/bei/nama-file.jpg`
- ✅ Flash message "Foto berhasil ditambahkan!"

### Edukasi
- ✅ Materi muncul di table
- ✅ Konten di-truncate jika panjang
- ✅ Flash message "Materi edukasi berhasil ditambahkan!"

### Event
- ✅ Event muncul di table
- ✅ Checkbox berfungsi (checked/unchecked)
- ✅ Banner tersimpan di `storage/app/public/bei/events/`
- ✅ Flash message "Event berhasil ditambahkan!"

---

## 🐛 Troubleshooting

### Foto tidak muncul
```bash
# Cek folder ada
ls -la public/galleries/bei/

# Cek permission
chmod 755 public/galleries/bei/
```

### Upload gagal
```bash
# Cek php.ini
upload_max_filesize = 10M
post_max_size = 10M

# Restart server
php artisan serve
```

### Checkbox tidak berfungsi
- ✅ Sudah diperbaiki di controller
- Pastikan menggunakan versi terbaru

### Error 500
```bash
# Cek log
tail -f storage/logs/laravel.log
```

---

## 📊 Test Data Examples

### Galeri
- Upload 3-5 foto kegiatan
- Beri judul yang berbeda
- Test dengan dan tanpa judul

### Edukasi
```
Judul: "Analisis Fundamental Saham"
Konten: "Analisis fundamental adalah metode untuk mengevaluasi nilai intrinsik saham..."

Judul: "Cara Membaca Laporan Keuangan"
Konten: "Laporan keuangan terdiri dari neraca, laba rugi, dan arus kas..."
```

### Event
```
Event 1:
- Judul: "Workshop Trading Saham"
- Tanggal: Besok
- Lokasi: "Lab Trading"
- Kapasitas: 30
- Status: Published, Registration Open

Event 2:
- Judul: "Seminar Investasi Reksadana"
- Tanggal: Minggu depan
- Lokasi: "Auditorium"
- Kapasitas: 100
- Status: Published, Registration Closed
```

---

## 🎯 Expected Results

Setelah testing, Anda harus memiliki:
- ✅ 3-5 foto di galeri
- ✅ 2-3 materi edukasi
- ✅ 2-3 event dengan status berbeda
- ✅ Semua CRUD berfungsi tanpa error
- ✅ Flash message muncul setelah setiap aksi

---

## 📝 Notes

- Semua perubahan langsung tersimpan di database
- File upload tersimpan di storage
- Soft delete digunakan (data bisa di-restore)
- Pagination otomatis muncul jika data > limit

---

**Happy Testing! 🎉**
