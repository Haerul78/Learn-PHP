# Learn-PHP
saya disini akan melewatkan pembahasan mengenai tipe data karena itu materi basic banget nya

## Array
Array adalah variabel yang bisa menyimpan lebih dari satu nilai. Di PHP, ada dua jenis array:
1. Array Terindeks (Indexed Array): Memiliki kunci berupa angka (0, 1, 2, dst).
2. Array Asosiatif (Associative Array): Memiliki kunci berupa teks (string).
### Cara Membuat Array
Anda dapat membuat array terindeks dan asosiatif menggunakan sintaks [] atau array().
```
// Array Terindeks (Indexed Array)
$angka = [1, 2, 3, 4, 5];
$buah = ["Apel", "Mangga", "Jeruk"];

// Array Asosiatif (Associative Array)
$alamat = [
    "naufal" => "Bandung",
    "melian" => "Malang",
];
```
### Mengakses dan Menampilkan Array
Anda bisa mengakses nilai array menggunakan kuncinya.
```
// Mengakses nilai berdasarkan indeks (posisi)
echo $buah[0]; // Output: Apel

// Mengakses nilai berdasarkan kunci (key)
echo $alamat['naufal']; // Output: Bandung
```
Untuk melihat seluruh isi array, Anda bisa menggunakan print_r() atau var_dump() untuk debugging.
- print_r(): Menampilkan struktur dan nilai array.
- var_dump(): Menampilkan struktur, nilai, dan tipe data setiap elemen.

## Array Multidimensi
Array Multidimensi adalah array yang di dalamnya terdapat array lain. Ini berguna untuk menyimpan data yang lebih kompleks, seperti data tabel atau struktur data berlapis.

### Contoh Membuat Array Multidimensi
```
$karnivora = ['Singa', 'Harimau', 'Beruang'];
$herbivora = ['Kambing', 'Sapi', 'Jerapah'];
$omnivora = ['Ayam', 'Monyet', 'Manusia'];
$binatang = [
    'karnivora' => $karnivora,
    'herbivora' => $herbivora,
    'omnivora' => $omnivora
];
```

### Mengakses Array Multidimensi
Anda dapat mengakses elemen di dalamnya dengan menggunakan kunci bertingkat.
```
echo $binatang['karnivora'][0]; // Output: Singa
```

### Menampilkan Seluruh Isi Array Multidimensi
Cara paling umum untuk menampilkan seluruh isi array multidimensi adalah menggunakan perulangan (foreach) yang bersarang (nested).
```
foreach ($binatang as $jenis => $hewan) {
    echo "Hewan-hewan jenis $jenis yaitu:";
    echo "<ul>";
    foreach ($hewan as $h => $data) {
        echo "<li>$data</li>";
    }
    echo "</ul>";
}
```
## Tipe data Null
Null adalah tipe data khusus yang hanya memiliki satu nilai: NULL. Sebuah variabel dikatakan memiliki nilai NULL jika:
1. Belum diberi nilai apa pun.
2. Secara eksplisit diberi nilai NULL.
3. Telah dihapus menggunakan fungsi unset().
Penting untuk dipahami bahwa variabel yang belum dideklarasikan (undefined) berbeda dengan variabel yang bernilai NULL. Mengakses variabel yang undefined akan memicu error Undefined variable.
```
<?php
// $nama belum dideklarasikan.
// echo $nama; // Ini akan menghasilkan error "Undefined variable".

// Variabel ini secara eksplisit diberi nilai NULL.
$nama = NULL;
echo $nama; // Ini tidak akan menampilkan apa pun, dan tidak ada error.

unset($nama);
// echo $nama; // Variabel $nama sudah dihapus, jadi ini juga akan menghasilkan error "Undefined variable".
?>
```
### Operator ?? (Null Coalescing Operator)
Operator ?? (sejak PHP 7) adalah cara singkat untuk menangani kasus di mana sebuah variabel mungkin tidak ada (undefined) atau bernilai NULL. Operator ini akan mengembalikan nilai di sisi kiri jika tidak NULL, dan akan mengembalikan nilai di sisi kanan jika nilai di sisi kiri NULL.
Contoh yang lebih tepat:
```
<?php
$nama_depan = "Budi";
$nama_belakang = null;

// Cek apakah $nama_depan bernilai null. Jika tidak, cetak nilainya.
echo $nama_depan ?? "Anonim";
// Output: Budi

// Cek apakah $nama_belakang bernilai null. Karena ya, cetak nilai default-nya "Anonim".
echo $nama_belakang ?? "Anonim";
// Output: Anonim

// Cek apakah variabel $nama_tengah ada. Jika tidak, cetak nilai default-nya.
// Ini akan mencegah error "Undefined variable".
echo $nama_tengah ?? "Tidak Ada";
// Output: Tidak Ada
?>
```
## Mengenal ```$_GET```
$_GET adalah sebuah superglobal array di PHP yang digunakan untuk mengumpulkan data dari sebuah form yang dikirimkan menggunakan metode HTTP GET.
Data yang dikirimkan melalui metode GET akan muncul di URL sebagai query string. Contohnya, jika Anda mengisi form dan menekan tombol submit, URL-nya akan terlihat seperti ini:
```
http://contoh.com/halaman.php?nama=Haerul&alamat=Jepang
```
Di URL ini, nama dan alamat adalah nama-nama input dari form, dan Haerul serta Jepang adalah nilai yang diisi oleh pengguna. $_GET berfungsi 
untuk mengambil nilai-nilai tersebut dari URL.

### Penggunaan $_GET pada Form
Kode yang Anda berikan adalah contoh sempurna dari cara kerja $_GET. Mari kita bedah:

#### Bagian Form (HTML)
```
<form action="" method="GET">
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="alamat" placeholder="Alamat">
    <input type="submit" name="submit">
</form>
```
- ```action=""```: Mengarahkan form untuk memproses data pada halaman yang sama.
- ```method="GET"```: Ini adalah kunci utama. Atribut ini memberi tahu browser untuk mengirim data form melalui metode GET.
- ```name="nama"``` dan ```name="alamat"```: Atribut name ini sangat penting. Nilai dari atribut inilah yang akan menjadi kunci di dalam array $_GET.

#### Bagian Pemrosesan (PHP)
```
<?php
$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
?>
```
- ```$nama = $_GET['nama'];```: Kode ini mengambil nilai dari input yang memiliki atribut name="nama" dari URL.
- ```$alamat = $_GET['alamat'];```: Kode ini melakukan hal yang sama untuk input alamat.
#### Catatan Penting:
Untuk menghindari error Undefined index saat halaman pertama kali dimuat (sebelum form di-submit), Anda harus selalu memeriksa apakah variabel $_GET sudah ada atau belum. Anda bisa menggunakan isset() untuk melakukan pengecekan ini.
```
<?php
// Contoh yang lebih aman untuk menghindari error
if (isset($_GET['nama']) && isset($_GET['alamat'])) {
    $nama = $_GET['nama'];
    $alamat = $_GET['alamat'];
} else {
    $nama = "Tamu";
    $alamat = "Tidak diketahui";
}
?>
```

### Kapan Menggunakan $_GET?
Gunakan $_GET saat:
- Anda ingin mengirimkan data yang tidak sensitif dan dapat terlihat di URL, seperti kata kunci pencarian, nomor halaman (pagination), atau ID produk.
- Anda ingin pengguna dapat membagikan atau me-bookmark URL yang sudah berisi data.
Hindari menggunakan $_GET untuk data sensitif seperti password atau informasi pribadi karena data tersebut akan terekspos di URL. Untuk data sensitif, gunakan $_POST.

## Mengenal $_POST
$_POST adalah sebuah superglobal array di PHP yang digunakan untuk mengumpulkan data dari sebuah form yang dikirimkan menggunakan metode HTTP POST.
Berbeda dengan $_GET, data yang dikirimkan melalui metode POST tidak akan terlihat di URL. Data ini dikirimkan di dalam "badan" (body) permintaan HTTP. Ini menjadikannya metode yang aman untuk mengirimkan data sensitif seperti kata sandi, informasi pribadi, atau data dalam jumlah besar.

### Penggunaan $_POST pada Form
Kode yang Anda berikan menunjukkan cara kerja $_POST dengan form yang terbagi dalam dua file: index.php (form) dan post2.php (pemrosesan).

#### Bagian Form (index.php)
```
<form action="post2.php" method="post">
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="alamat" placeholder="Alamat">
    <input type="date" name="ttl">
    <input type="submit" name="submit">
</form>
```
- ```action="post2.php"```: Atribut ini menentukan file PHP mana yang akan memproses data form setelah tombol submit ditekan.
- ```method="post"```: Ini adalah kunci utama. Atribut ini memberi tahu browser untuk mengirim data form menggunakan metode POST.
- ```name="...": Nama-nama ini menjadi kunci dalam array $_POST. Misalnya, nilai dari input dengan name="nama" akan diakses melalui $_POST['nama'].

#### Bagian Pemrosesan (post2.php)
```
<h1>
    Selamat datang <?php echo $_POST['nama']?>
</h1>
<p>Alamat kamu di <?php echo $_POST['alamat']?></p>
<p>tanggal lahir kamu <?php echo $_POST['ttl']?></p>
```
- ```$_POST['nama']```: Kode ini mengambil nilai yang dikirim dari input dengan name="nama" pada form.
- ```$_POST['alamat']```: Mengambil nilai dari input dengan name="alamat".
- ```$_POST['ttl']```: Mengambil nilai dari input dengan name="ttl".
Karena data ini tidak terlihat di URL, pengguna tidak bisa membagikan atau me-bookmark halaman post2.php dengan data yang sudah terisi.

### Keamanan dan Pengecekan
Sama seperti $_GET, sangat penting untuk memeriksa apakah data sudah ada sebelum menggunakannya untuk menghindari error Undefined index. Anda bisa menggunakan isset() untuk pengecekan.
```
<?php
// Contoh yang lebih aman di post2.php
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
} else {
    $nama = "Tamu";
}
// ... lakukan pengecekan yang sama untuk $_POST['alamat'] dan $_POST['ttl']
?>
```
### Kapan Menggunakan ```$_POST?```
Gunakan $_POST saat:
- Anda ingin mengirimkan data sensitif seperti kata sandi atau nomor kartu kredit.
- Anda mengirimkan data dalam jumlah besar, seperti isi dari sebuah artikel.
- Anda tidak ingin data form terlihat di URL.