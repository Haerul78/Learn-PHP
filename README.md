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

## Write & Read File
PHP menyediakan fungsi-fungsi untuk menulis dan membaca file secara mudah. Dua fungsi utama yang sering digunakan adalah ``` file_put_contents()``` untuk menulis data ke file dan ``` file_get_contents()``` untuk membaca data dari file.

### Menulis File dengan file_put_contents()
Fungsi file_put_contents() digunakan untuk menulis data ke dalam sebuah file. Jika file belum ada, PHP akan membuatnya secara otomatis. Jika file sudah ada, isi file akan ditimpa (overwrite).

#### Sintaks:
```
file_put_contents(nama_file, data, flags);
```
#### Contoh penggunaan:
```
<?php
$message = "Selamat datang di PHP!";
file_put_contents("content.txt", $message);
echo "Data telah berhasil ditulis ke file content.txt";
?>
```

### Membaca File dengan file_get_contents()
Fungsi ```file_get_contents()``` digunakan untuk membaca seluruh isi file dan mengembalikannya sebagai string.

#### Sintaks:
```
$data = file_get_contents(nama_file);
```
#### Contoh penggunaan:
```
<?php
// Membaca file yang sudah dibuat sebelumnya
$isi_file = file_get_contents("content.txt");
echo $isi_file; // Output: Selamat datang di PHP!

// Membaca file dari folder tertentu
echo file_get_contents("file/Hallo.txt");
?>
```

#### Contoh Kombinasi Write & Read
```
<?php
// Menulis data ke file
$data_baru = "Ini adalah data baru yang akan disimpan.";
file_put_contents("data_saya.txt", $data_baru);

// Membaca data dari file
$data_terbaca = file_get_contents("data_saya.txt");
echo "Isi file: " . $data_terbaca;
?>
```

### Tips Penting:
- Pastikan folder tempat file akan disimpan memiliki permission yang tepat (writeable).
- Gunakan path yang benar saat mengakses file.
- Selalu cek apakah file berhasil dibuat atau tidak untuk menghindari error.

## Write Format Serialize & JSON
Ketika bekerja dengan data kompleks seperti array atau object, kita perlu mengonversinya menjadi format tertentu sebelum menyimpannya ke file. PHP menyediakan dua cara utama: Serialize dan JSON.

### Format Serialize
Serialize adalah proses mengubah data kompleks (seperti array atau object) menjadi string yang dapat disimpan atau dikirim. Unserialize adalah kebalikannya, yaitu mengubah string tersebut kembali menjadi data aslinya.

#### Kelebihan Serialize:
- Dapat menyimpan semua tipe data PHP termasuk object dengan method-nya
- Format asli PHP, sangat tepat untuk komunikasi antar aplikasi PHP
#### Kekurangan Serialize:
- Hanya dapat dibaca oleh PHP
- Rentan terhadap serangan injeksi jika digunakan dengan data yang tidak dipercaya

#### Contoh penggunaan:
```
<?php
// Data array yang akan disimpan
$karyawan = [
    "nama" => "Ahmad",
    "jabatan" => "Developer",
    "gaji" => 8000000,
    "alamat" => [
        "jalan" => "Jl. Sudirman No. 123",
        "kota" => "Jakarta"
    ]
];

// Serialize: mengubah array menjadi string
$data = serialize($karyawan);
echo "Data setelah di-serialize:\n";
echo $data . "\n\n";

// Menyimpan data serialize ke file
file_put_contents('data_serialize.txt', $data);

// Membaca data dari file
$output = file_get_contents('data_serialize.txt');

// Unserialize: mengubah string kembali menjadi array
$hasil = unserialize($output);
echo "Data setelah di-unserialize:\n";
print_r($hasil);
?>
```

### Format JSON
JSON (JavaScript Object Notation) adalah format pertukaran data yang ringan dan mudah dibaca. Meskipun berasal dari JavaScript, JSON kini menjadi standar universal untuk pertukaran data antar aplikasi.

#### Kelebihan JSON:
- Format universal yang dapat dibaca oleh hampir semua bahasa pemrograman
- Mudah dibaca oleh manusia
- Lebih aman daripada serialize
- Ukuran file yang dihasilkan biasanya lebih kecil
#### Kekurangan JSON:
- Tidak dapat menyimpan object PHP dengan method-nya
- Terbatas pada tipe data tertentu (string, number, boolean, array, object, null)

#### Contoh penggunaan:
```
<?php
// Data array yang sama seperti contoh sebelumnya
$karyawan = [
    "nama" => "Ahmad",
    "jabatan" => "Developer", 
    "gaji" => 8000000,
    "alamat" => [
        "jalan" => "Jl. Sudirman No. 123",
        "kota" => "Jakarta"
    ]
];

// json_encode: mengubah array menjadi string JSON
$data = json_encode($karyawan);
echo "Data dalam format JSON:\n";
echo $data . "\n\n";

// Menyimpan data JSON ke file
file_put_contents('data_json.txt', $data);

// Membaca data dari file
$output = file_get_contents('data_json.txt');

// json_decode: mengubah string JSON kembali menjadi array
// Parameter kedua (true) mengubah object menjadi associative array
$hasil = json_decode($output, true);
echo "Data setelah di-decode dari JSON:\n";
print_r($hasil);
?>
```

#### Perbandingan Output JSON dengan Pretty Print
Untuk membuat JSON lebih mudah dibaca, Anda bisa menggunakan flag JSON_PRETTY_PRINT:
```
<?php
$karyawan = [
    "nama" => "Ahmad",
    "jabatan" => "Developer",
    "gaji" => 8000000,
    "skills" => ["PHP", "JavaScript", "MySQL"]
];

// JSON tanpa formatting
$json_compact = json_encode($karyawan);
echo "JSON Compact:\n" . $json_compact . "\n\n";

// JSON dengan pretty print
$json_pretty = json_encode($karyawan, JSON_PRETTY_PRINT);
echo "JSON Pretty Print:\n" . $json_pretty . "\n\n";
?>
```

#### Kapan Menggunakan Serialize vs JSON?
Gunakan Serialize jika:
- Data hanya akan digunakan dalam aplikasi PHP
- Anda perlu menyimpan object PHP dengan method-nya
- Performa encoding/decoding menjadi prioritas utama
Gunakan JSON jika:
- Data akan dibagikan dengan aplikasi lain (API, JavaScript, dll)
- Anda ingin format yang mudah dibaca manusia
- Keamanan dan portabilitas menjadi prioritas

#### Contoh Praktis: Menyimpan Data Pengguna
```
<?php
// Simulasi data pengguna dari form
$data_pengguna = [
    "id" => 1,
    "nama" => "Budi Santoso",
    "email" => "budi@email.com",
    "tanggal_daftar" => date('Y-m-d H:i:s'),
    "preferences" => [
        "tema" => "dark",
        "bahasa" => "id",
        "notifikasi" => true
    ]
];

// Menyimpan dalam format JSON (lebih direkomendasikan)
$json_data = json_encode($data_pengguna, JSON_PRETTY_PRINT);
file_put_contents('user_data.json', $json_data);

// Membaca dan menampilkan data
$loaded_data = json_decode(file_get_contents('user_data.json'), true);
echo "Selamat datang, " . $loaded_data['nama'] . "!\n";
echo "Email: " . $loaded_data['email'] . "\n";
echo "Tema yang dipilih: " . $loaded_data['preferences']['tema'];
?>
```