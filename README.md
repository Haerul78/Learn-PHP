# Learn-PHP
saya disini akan melewatkan pembahasan mengenai tipe data karena itu materi basic banget nya

## Array
```
$angka = [1,2,3,4,5];
$buah = ["pia", "has", "ifa"];
```
Adalah bentuk array di php. bisa diakses dengan cara berikut:
```
echo $angka[1];
print_r($buah);
var_dump($buah);
```
```print_r``` akan menampilkan isi data array beserta indexnya. ```var_dump``` akan menampilkan isi data array beserta index dan tipe datanya.

## Array Asosiatif
Array asosiatif adalah array yang isi datanya memiliki kode unik. meskipun default nya sudah memiliki kode unik yaitu index, tapi kita bisa mengubah nya dengan yang lain. Array asosiatif memiliki 2 bentuk/cara yaitu:
```
$alamat = array(
    "naufal" => "Bandung",
    "melian" => "Malang",
    "marimar" => "Mexico"
);
```
dan
```
$alamat['naufal'] = "Bandung";
$alamat['meilan'] = "Malang";
$alamat['marimar'] = "Mexico";
```
bisa diakses dengan cara biasa atau loop.
```
echo "Alamat Marimar adalah di ". $alamat['marimar'];
```
```
foreach($alamat as $x => $value) {
    echo "Alamat ". $x. " di ". $value;
    echo "<br>";
}
```