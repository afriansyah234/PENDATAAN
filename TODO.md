# 🧾 To-Do List: Project Pendataan PKL
> Sistem pendataan siswa PKL oleh guru pembimbing

---

## ⚙️ Setup Dasar
- [x] Inisialisasi project Laravel baru `pendataan-pkl`
- [x] Konfigurasi koneksi database di `.env`
- [x] Buat model dasar: `Teacher`, `Student`, `Companies`, `Interships`
- [x] Tambahkan migrasi untuk setiap tabel
- [x] Definisikan relasi antar model:
  - [x] `Teacher` → `hasMany(Internship)`
  - [x] `Siswa` → `hasOne(Internship)`
  - [x] `Companies` → `hasMany(Internship)`
  - [x] `Internship` → `belongsTo(Guru)`, `belongsTo(Siswa)`, `belongsTo(Companies)`

---

## 👨‍🏫 Fitur Guru
- [x] Buat `GuruController`
- [x] Implementasi CRUD data guru
- [x] Tambahkan validasi input: nama, NIP, kontak, status aktif
- [x] Tambahkan relasi guru dengan data PKL yang dibimbing

---

## 👩‍🎓 Fitur Siswa
- [x] Buat `SiswaController`
- [ ] Implementasi CRUD data siswa
- [ ] Tambahkan validasi input: nama, NIS, kelas, jurusan
- [ ] Tambahkan relasi ke guru pembimbing dan data PKL
- [ ] Validasi: satu siswa hanya boleh memiliki satu data PKL aktif

---

## 🏢 Fitur Perusahaan
- [x] Buat `PerusahaanController`
- [x] Implementasi CRUD data perusahaan (nama, alamat, bidang, kontak)
- [x] Tambahkan relasi perusahaan dengan data PKL (`hasMany`)

---

## 📋 Fitur Pendataan PKL
- [ ] Buat `PKLController`
- [ ] Implementasi CRUD data PKL
- [ ] Validasi input: `guru_id`, `siswa_id`, `perusahaan_id`, `tanggal_mulai`, `tanggal_selesai`, `status`
- [ ] Pastikan satu siswa tidak memiliki lebih dari satu PKL aktif
- [ ] Tambahkan fitur untuk melihat daftar siswa PKL berdasarkan guru pembimbing

---

## 🧰 Handler & Seeder
- [ ] Buat `NotFoundHandler` generic untuk semua model (`Guru`, `Siswa`, `Perusahaan`, `PKL`)
- [ ] Update semua controller agar menggunakan `NotFoundHandler`
- [ ] Buat seeder untuk data contoh:
  - [ ] `GuruSeeder`
  - [ ] `SiswaSeeder`
  - [ ] `PerusahaanSeeder`
  - [ ] `PKLSeeder`
- [ ] Daftarkan semua seeder di `DatabaseSeeder`

---

## 🧪 Testing & Validasi
- [ ] Test seluruh endpoint (CRUD Guru, Siswa, Perusahaan, PKL)
- [ ] Test relasi antar model
- [ ] Test validasi input dan logika PKL aktif
- [ ] Test `NotFoundHandler` untuk semua model
- [ ] Pastikan semua data contoh berhasil di-seed dan relasi berjalan dengan benar

---

📅 **Catatan:**
Project ini digunakan untuk pendataan kegiatan PKL siswa oleh guru pembimbing.  
Fokus: logika backend dan validasi data, tanpa antarmuka UI.
