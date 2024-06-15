# Sistem Pakar Dempster-Shafer

## Apa Itu Pemodelan Data?
Menurut [AWS (Amazon Web Service)](https://aws.amazon.com/what-is/data-modeling/) pemodelan data adalah proses membuat representasi visual yang mendefinisikan pengumpulan informasi dan sistem manajemen organisasi mana pun. Model data ini membantu berbagai pemangku kepentingan, seperti analis data, ilmuwan, dan insinyur, untuk menciptakan pandangan terpadu tentang data organisasi.

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