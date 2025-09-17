<?php
    $a = 10;
    $b = 5;

    $hasilTambah = $a + $b;
    $hasilKurang = $a - $b;
    $hasilKali = $a * $b;
    $hasilBagi = $a / $b;
    $sisaBagi = $a % $b;
    $pangkat = $a ** $b;

    echo "Hasil Penjumlahan: $hasilTambah <br>";
    echo "Hasil Pengurangan: $hasilKurang <br>";
    echo "Hasil Perkalian: $hasilKali <br>";
    echo "Hasil Pembagian: $hasilBagi <br>";
    echo "Sisa Bagi: $sisaBagi <br>";
    echo "Pangkat: $pangkat <br>";

    echo "<hr>";

    $hasilSama = $a == $b;
    $hasilTidakSama = $a != $b;
    $hasilLebihKecil = $a < $b;
    $hasilLebihBesar = $a > $b;
    $hasilLebihKecilSama = $a <= $b;
    $hasilLebihBesarSama = $a >= $b;

    echo "Hasil Sama: $hasilSama <br>";
    echo "Hasil Tidak Sama: $hasilTidakSama <br>";
    echo "Hasil Lebih Kecil: $hasilLebihKecil <br>";
    echo "Hasil Lebih Besar: $hasilLebihBesar <br>";
    echo "Hasil Lebih Kecil Sama: $hasilLebihKecilSama <br>";
    echo "Hasil Lebih Besar Sama: $hasilLebihBesarSama <br>";

    echo "<hr>";

    $hasilAnd = $a && $b;
    $hasilOr = $a || $b;
    $hasilNotA = !$a;
    $hasilNotB = !$a;

    echo "Hasil AND: $hasilAnd <br>";
    echo "Hasil OR: $hasilOr <br>";
    echo "Hasil NOT A: $hasilNotA <br>";
    echo "Hasil NOT B: $hasilNotB <br>";

    echo "<hr>";
    
    $a += $b;
    echo "Hasil Penjumlahan: $a <br>";
    $a -= $b;
    echo "Hasil Pengurangan: $a <br>";
    $a *= $b;
    echo "Hasil Perkalian: $a <br>";
    $a /= $b;
    echo "Hasil Pembagian: $a <br>";
    $a %= $b;
    echo "Sisa Bagi: $a <br>";

    echo "<hr>";

    $hasilIdentik = $a === $b;
    $hasilTidakIdentik = $a !== $b;

    echo "Hasil Identik: " . ($hasilIdentik ? 'true' : 'false') . " <br>";
    echo "Hasil Tidak Identik: " . ($hasilTidakIdentik ? 'true' : 'false') . " <br>";
?>