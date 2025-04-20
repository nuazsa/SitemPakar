# SitemPakar – Sistem Pakar untuk Rekomendasi Model Basis Data
SitemPakar adalah sebuah aplikasi sistem pakar berbasis web yang dirancang untuk membantu para pengembang dalam menentukan model basis data yang paling sesuai dengan kebutuhan proyek mereka. Aplikasi ini menggunakan pendekatan berbasis pertanyaan untuk memahami kebutuhan pengguna, lalu memberikan rekomendasi berdasarkan pengetahuan dari para ahli di bidang teknologi informasi.

##  Tujuan Proyek
Proyek ini bertujuan untuk:
- Membantu pengembang memilih model basis data (relasional, dokumen, graph, dsb) yang cocok sesuai kebutuhan proyek mereka.
- Menyediakan antarmuka interaktif yang menanyakan beberapa pertanyaan teknis kepada pengguna.
- Memberikan rekomendasi berbasis logika dan pengetahuan ahli melalui penerapan metode sistem pakar (seperti Dempster-Shafer atau rule-based).

## Formula
### Model Data
```
j1 = Model Data Berorientasi Objek

j2 = Model Data Relasional

j3 = Model Data Hierarkis
```
### Pernyataan
```
G1 = Data yang akan disimpan memiliki struktur yang kompleks dan dapat berubah dengan cepat.

G2 = Hubungan antar data sangat penting dan perlu dijaga dengan baik.

G3 = Data yang akan disimpan berhubungan dalam struktur hierarkis yang jelas.
```

### Rumus Formula

> m1{j1} = 0.7 ---> m1 θ = 1 - 0.7 = 0.3

> m2{j2} = 0.6 ---> m1 θ = 1 - 0.6 = 0.4

| n      | j2 (0.6) | θ (0,4) |
|--------|----------|---------|
|j1 (0.7)|∅ (0.42)   |j1 (0.28)|
|θ  (0.3)|j2 (0.18) |θ (0.12) |

> m3{j1} = 0.28/1-0.42 = 0.28/1-0.58 = 0.482

> m3{j2} = 0.18/1-0.42 = 0.18/1-0.58 = 0.310

> m3{θ} = 0.12/1-0.42 = 0.12/1-0.58 = 0.206

| n      | j3 (0.8) | θ (0,2) |
|--------|----------|---------|
|j1 (0.482)|∅ (0.385)   |j1 (0.096)|
|j2 (0.310)|∅ (0.248)   |j2 (0.062)|
|θ  (0.206)|j3 (0.164) |θ (0.206) |

> m4{j1} = 0.096/1-0.633 = 0.096/1-0.367 = 0.261

> m4{j2} = 0.062/1-0.633 = 0.062/1-0.367 = ***0.446 -> Tertinggi*** 

> m4{j3} = 0.164/1-0.633 = 0.164/1-0.367 = 0.310


## Instalasi Lokal
- Ekstrak semua file ke dalam htdocs
- Nyalakan service mysql dan apache
- Import file database "pemodelandata.sql" ke dalam phpmyadmin
- Atur database di file koneksi.php
Buka browser dan akses halaman web

## Demo
<https://pemodelandata.nuazsa.my.id>
- username: admin
- password: admin

## Versi
- 1.0 : Gangguan Kecemasan
- 2.0 : Pemodelan Data (latest)
