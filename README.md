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