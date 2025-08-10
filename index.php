<?php
    $alamat = array(
        "naufal" => "Bandung",
        "melian" => "Malang",
        "marimar" => "Mexico"
    );

    foreach($alamat as $x => $value) {
        echo "Alamat ". $x. " di ". $value;
        echo "<br>";
    }
?>
