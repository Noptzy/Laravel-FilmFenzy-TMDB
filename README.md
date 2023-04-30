Film Fenzy adalah sebuah aplikasi web yang menyediakan informasi tentang film-film terbaru, rating film, dan detail film seperti sinopsis, trailer, dan pemainnya. Aplikasi ini dibangun dengan Laravel 10 sebagai framework utama dan menggunakan Vite untuk manajemen asset dengan Tailwind CSS sebagai framework untuk styling.

Data film diperoleh dari API The Movie Database (TMDb) yang menyediakan informasi lengkap tentang film-film terbaru maupun yang sudah lama dirilis. Pengguna dapat melakukan pencarian film berdasarkan judul dan juga dapat mengurutkan hasil pencarian berdasarkan rating dan tanggal rilis. Selain itu, pengguna juga dapat menandai film favorit mereka dan melihat daftar film yang sudah ditandai.

Instalasi
Clone repository ini ke dalam komputer Anda
Jalankan perintah composer install pada terminal untuk menginstal dependency PHP
Duplikat file .env.example dengan nama .env dan atur koneksi database pada file tersebut
Jalankan perintah php artisan key:generate untuk menghasilkan aplikasi key
Jalankan perintah php artisan migrate untuk menjalankan migration dan mengisi database dengan tabel dan data yang diperlukan
Jalankan perintah npm install untuk menginstal dependency JavaScript
Jalankan perintah npm run dev untuk mengkompilasi aset aplikasi
Penggunaan
Jalankan perintah php artisan serve pada terminal untuk memulai aplikasi
Buka browser dan ketikkan http://localhost:8000 pada address bar untuk mengakses aplikasi
Kontribusi
Anda dapat berkontribusi pada pengembangan aplikasi ini dengan melakukan pull request pada repository ini. Pastikan untuk mengikuti standar kontribusi yang berlaku dan menguji semua perubahan yang dilakukan sebelum melakukan commit.

Lisensi
Aplikasi ini dilisensikan di bawah lisensi MIT License. Anda dapat menggunakan, menyalin, memodifikasi, dan mendistribusikan kode ini secara bebas dengan memperhatikan syarat dan ketentuan yang berlaku pada lisensi tersebut.
