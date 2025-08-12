<?php
    // $mahasiswa = array(
    //     array("Marimar", 20, "Wanita"),
    //     array("Soledad", 25, "Wanita"),
    //     array("Alfonso", 30, "Pria")
    // );

    // for ($baris = 0; $baris < 3; $baris++){
    //     echo "<p><b>Baris No: $baris</b></p>";
    //     echo "<ul>";
    //     for ($kolom = 0; $kolom < 3; $kolom++) {
    //         echo "<li>".$mahasiswa[$baris][$kolom];
    //     }
    //     echo "</ul>";
    // }

    $karnivora = ['Singa', 'Harimau', 'Beruang'];
    $herbivora = ['Kambing', 'Sapi', 'Jerapah'];
    $omnivora = ['Ayam', 'Monyet', 'Manusia'];
    $binatang = [
        'karnivora' => $karnivora,
        'herbivora' => $herbivora,
        'omnivora' => $omnivora
    ];

    foreach ($binatang as $jenis => $hewan) {
        echo "Hewan-hewan jenis $jenis yaitu:";
        echo "<ul>";
        foreach ($hewan as $h => $data) {
            echo "<li>$data</li>";
        }
        echo "</ul>";
    }
?>

