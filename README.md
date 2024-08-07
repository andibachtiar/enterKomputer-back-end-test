<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## EnterKomputer back-end Test

Project ini dibuat untuk memenuhi tugas test untuk melamar pekerjaan sebagai back-end developer EnterKomputer. Project dibuat menggunakan Framework Laravel dan RDBMS MySQL. Di dalam project sudah dibuatkan data dummy untuk mempermudah review project

Untuk menjalankan project, harap lakukan langkah-langkah dibawah ini:

1. copy .env.example dan rubah nama file menjadi .env

2. Buat database dan import file .sql yang telah disediakan

3. Jalankan perintah berikut di terminal

```shell
# jalankan file migration
$ php artisan migrate:fresh --seed

# jalankan web server (optional)
$ php artisan serve
```
