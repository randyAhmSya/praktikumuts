membuat konfigurasi toko buku dengan api menggunakan laravel
![membuat folder](image.png)
lalu php artisan serve
![migrate](image-1.png)
menambah table ke database
![penghubugn](image-2.png)
atur penghubung antara database
![error](image-3.png)
apabila error ganti collation seperti ini
![migrate](image-4.png)
migrate table
![membuat model](image-5.png)
membuat model
![category](image-6.png)
![buku](image-7.png)
membuat table buku dan  category
![alt text](image-8.png)
membuat controller
![control](image-9.png)
buat isi controler
<h1>penting</h1>

<h3>untuk api nya jangan dibuat manual. buat secara terminal dengan sintak php artisan install:api</h3>

![alt text](image-10.png)
buat file untuk api dan tambahkan isian seperti itu
![alt text](image-11.png)
hasil yang telah benar dibuat
<h3>get,post,delete pada postman</h3>

![alt text](image-12.png)
di atas adalah get pada url nya
![alt text](image-13.png)
post untuk url
![alt text](image-14.png)
get data lagi sesudah di tambahkan
![alt text](image-15.png)
menambahkan bagian bukus
![alt text](image-16.png)
mengupdate bukus
![alt text](image-17.png)s
delete id buku ke 2
![min100](image-18.png)
nama buku tidak boleh kosong dan min 1000
![alt text](image-20.png)
tidak bisa menambhkanbuku karena angka nya kurang dari 1000
![alt text](image-21.png)
tidak bisa menambahkan bku karena tidak ada  nama buku
![alt text](image-19.png)
menambahkan filter mencari dengan judul atau kategori
![alt text](image-22.png)
kode menambahkan search untuk memNGGIL BERDASARKAN KATEGORY
![alt text](image-23.png)
menambahkan search untuk memnggil berdasarkan kategory
Performa: Optimalkan query dengan indeks dan paginasi untuk menghindari beban berlebih saat data besar.
Skalabilitas: Gunakan caching dan load balancer untuk menangani trafik tinggi dan pertumbuhan data.
Pengalaman Pengguna: Terapkan debounce di frontend, gunakan paginasi, dan tampilkan hasil yang relevan dengan pencarian.
Keamanan: Validasi input dan terapkan rate limiting untuk mencegah penyalahgunaan.
link: https://nt9nrhxb-8000.asse.devtunnels.ms/
![hasil](image-24.png)
hasil nya menggunakan online menggunakan port pada vscode
