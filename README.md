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