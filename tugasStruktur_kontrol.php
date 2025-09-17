<?php
    $nilaiSiswa = [80, 95, 67, 72, 88, 91, 76, 84, 69, 93, 78, 85];

    sort($nilaiSiswa);

    // buang 2 nilai terbesar dan nilai terkecil
    $nilaiMaxMin = array_slice($nilaiSiswa, 2, -2);

    // hitung rata rata
    $avgNilai = array_sum($nilaiMaxMin) / count($nilaiMaxMin);

    echo "Nilai rata rata siswa adalah = " . $avgNilai;

    echo "<hr>";

    $hrgProduk = 250000;
    $diskon = 0.15;

    if ($hrgProduk > 200000) {
        $hrgProduk -= $hrgProduk * $diskon;
        echo "Harga Produk setelah diskon = Rp. " . $hrgProduk;
    } else {
        echo "Produk tidak mendapatkan diskon";
        echo "Harga Produk = Rp. " . $hrgProduk;
    }

    echo "<hr>";

    $jarakHarian = [12, 8, 10, 15, 9, 11, 14, 13, 10];

    $totalJarak = array_sum($jarakHarian);

    $rataJarak = $totalJarak / count($jarakHarian);

    $bonus = ($totalJarak > 100) ? "YA" : "TIDAK";

    echo "Total jarak tempuh atlet adalah: {$totalJarak} km <br>";
    echo "Rata-rata jarak tempuh atlet adalah: " . round($rataJarak, 2)  . " km <br>";
    echo "Apakah atlet mendapatkan bonus latihan? $bonus";
?>