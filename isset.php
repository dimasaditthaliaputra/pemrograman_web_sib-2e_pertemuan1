<?php
    $umur;
    if (isset($umur)) {
        echo "Anda Sudah Dewasa";
    } else {
        echo "Anda Belum Dewasa atau variabel 'umur' tidak ditemukan";
    }

    echo "<br>";

    $data = array("nama" => "Dimas", "umur" => 19);
    if (isset($data["nama"])) {
        echo "Nama: " . $data["nama"];
    } else {
        echo "Variabel 'nama' tidak ditemukan dalam array.";
    }
?>