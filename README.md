<h1 align="center">🩺 Sistem Pakar ISPA</h1>
<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/build-passing-brightgreen.svg" alt="Build Status"></a>
  <a href="#"><img src="https://img.shields.io/badge/version-1.0-blue.svg" alt="Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/license-MIT-green.svg" alt="License"></a>
</p>

---

## 🩺 Sistem Pakar ISPA

Sistem Pakar ISPA adalah aplikasi berbasis web yang bertujuan untuk membantu mendiagnosis **Infeksi Saluran Pernapasan Akut (ISPA)** pada balita. Sistem ini menggunakan pendekatan **rule-based system** untuk memberikan hasil diagnosis yang cepat, akurat, dan dapat diandalkan.

Dibangun dengan menggunakan framework Laravel, sistem ini memudahkan tenaga medis dan orang tua dalam **mengidentifikasi gejala**, **menentukan diagnosis**, dan **mendapatkan rekomendasi pengobatan** secara instan.

---

## ✨ Fitur Utama

- ✅ **Identifikasi Gejala**  
  Input gejala secara interaktif berdasarkan kondisi balita.
- ✅ **Penentuan Diagnosis**  
  Sistem akan mencocokkan gejala dengan basis aturan yang tersedia.
- ✅ **Solusi Medis & Pengobatan**  
  Menampilkan saran pengobatan awal yang relevan.
- ✅ **Rekomendasi Tindakan**  
  Sistem memberikan arahan lanjutan berdasarkan hasil diagnosis.
- ✅ **Pengelolaan Data Gejala & Penyakit**  
  Admin dapat menambah, mengubah, dan menghapus data gejala, penyakit, dan aturan.
- ✅ **Proses Inferensi**  
  Penerapan logika sistem pakar untuk menghasilkan output diagnosis.
- ✅ **Konsultasi Cepat**  
  Hasil langsung ditampilkan begitu input selesai.

---

## 🛠️ Teknologi

- Laravel 11 (PHP Framework)
- MySQL (Database Management)
- Blade Templating Engine
- Bootstrap 5 (UI/UX)
- Metode Rule-Based System

---

## 🚀 Instalasi

Langkah-langkah untuk menjalankan proyek ini secara lokal:

```bash
# Clone repositori
git clone https://github.com/your-username/sistem-pakar-ispa.git
cd sistem-pakar-ispa

# Install dependensi PHP
composer install

# Install dependensi JavaScript
npm install && npm run dev

# Salin file environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Konfigurasi database di file .env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

# Migrasi dan seed data awal
php artisan migrate --seed

# Jalankan server lokal
php artisan serve
