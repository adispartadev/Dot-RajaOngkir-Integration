
**Versi Sprint 1**

# Pendahuluan

Project ini menggunakan Laravel 10 sebagai framework. Silahkan sesuaikan environment untuk menjalankan project ini sesuai dengan kebutuhan dari laravel. 


# Instalasi

Untuk melakukan instalasi, silahkan clone atau untuk project ini terlebih dahulu. Kemudian lakukan beberapa langkah berikut:

 - Buka terminal atau commandprompt kemudian ketikan perintah `composer install`
 - Setelah berhasil dilakukan, copy file `.env.example` dengan nama file baru `.env`, kemudian ganti beberapa variable dalam file `.env` baru tersebut:
 

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    RAJAONGKIR_APIKEY=

- Tahap selanjutnya, adalah menjalankan migration dengan menggunakan command `php artisan migrate`

Sampai tahap ini harusnya aplikasi siap untuk digunakan. 

 # Dokumentasi  
 Berdasarkan ketentuan tes, berikut ini merupakan dokumentasi penggunaan sesuai nomor soal.

 1. Implementasi dari API rajaongkir sudah dilakukan pada file `app\Http\Helpers\RajaOngkir.php`
 2. Artisan command yang sudah dibuat ada pada file `app\Console\Commands\GetProvinsiRajaOngkir.php` dan `app\Console\Commands\GetKotaRajaOngkir.php` dengan pemanggilannya sebagai berikut:

     php artisan rajaongkir:provinsi
     php artisan rajaongkir:kota
3. Rest api untuk pencarian kota dan provinsi berdasarkan `id` ada pada endpoint berikut:

    /search/provinces?id=1
    /search/cities?id=1
