<?php
    $koneksi = pg_connect("host=localhost port=5432 dbname=prakwebdb user=postgres password=");

    if (!$koneksi) {
        die("Koneksi database gagal: " . pg_last_error());
    }
?>