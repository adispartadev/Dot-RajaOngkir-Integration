
**Versi Sprint 2**

# Pendahuluan

Project ini menggunakan Laravel 10 sebagai framework. Silahkan sesuaikan environment untuk menjalankan project ini sesuai dengan kebutuhan dari laravel. 


# Instalasi

Untuk melakukan instalasi, silahkan clone atau untuk project ini terlebih dahulu. Kemudian lakukan beberapa langkah berikut:

 - Buka terminal atau commandprompt kemudian ketikan perintah `composer install`
 - Setelah berhasil dilakukan, copy file `.env.example` dengan nama file baru `.env`, kemudian ganti beberapa variable dalam file `.env` baru tersebut:
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    RAJAONGKIR_APIKEY=
```
- Tahap selanjutnya, adalah menjalankan migration dengan menggunakan command `php artisan migrate`
- Kemudian perlu dijalankan command `php artisan db:seed` untuk membuat dummy user ke database. 

Sampai tahap ini harusnya aplikasi siap untuk digunakan. 

 # Dokumentasi  
 Berdasarkan ketentuan tes, berikut ini merupakan dokumentasi penggunaan sesuai nomor soal.

### Soal 1 
Rest api untuk pencarian kota dan provinsi berdasarkan `id` ada pada endpoint berikut:
```
    /search/provinces?id=1
    /search/cities?id=1
```
Pada endpoint ini, telah ditambahkan 1 konfigurasi yang dapat diubah pada file `.env` berupa `IS_DIRECT_RAJAONGKIR` dapat diisi dengan `true` atau `false`. Apabila diatur menjadi `true` maka data yang diambil akan bersumber langsung dari api rajaongkir, namun apabila `false` data akan diambil dari database.

### Soal 2
Api login sudah disiapkan pada endpoint [POST]`/login` dengan membutuhkan form data 
|Field Name|Status|Example|
|--|--|--|
|email|required|dummy@gmail.com|
|password|required|dummy|

Saat endpoint dijalankan, maka akan mereturn berupa akses token. Berikut merupakan contoh response yang dihasilkan dari endpoint tersebut.
```
{
	"status": "success",
	"message": "Login successfully",
	"data": {
		"token": "1|k3J7oXDjIEmP7Jy4KVuXbmmY5VZcSF47bMk90ydE8a578415",
		"user": {
			"id": 1,
			"name": "Dummy User",
			"email": "dummy@gmail.com",
			"email_verified_at": "2023-09-07T05:41:49.000000Z",
			"created_at": "2023-09-07T05:41:50.000000Z",
			"updated_at": "2023-09-07T05:41:50.000000Z",
			"token": "1|k3J7oXDjIEmP7Jy4KVuXbmmY5VZcSF47bMk90ydE8a578415"
		}
	}
}
```
Gunakan akses token tersebut untuk mengakses endpoint pencarian kota dan provinsi dengan menyertakannya pada `header` .
|Header Name|Example Value|
|--|--|
|Authorization|Bearer {{token}}|


