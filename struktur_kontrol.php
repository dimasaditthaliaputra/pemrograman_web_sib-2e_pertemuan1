<?php
    $nilaiNumerik = 92;

    if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
        echo "Nilai huruf: A";
    } elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
        echo "Nilai huruf: B";
    } elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
        echo "Nilai huruf: C";
    } elseif ($nilaiNumerik < 70) {
        echo "Nilai huruf: D";
    }

    echo "<hr>";

    $jarakSaatIni = 0;
    $jarakTarget = 500;
    $peningkatanHarian = 30;
    $hari = 0;

    while ($jarakSaatIni < $jarakTarget) {
        $jarakSaatIni += $peningkatanHarian;
        $hari++;
    }

    echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";

    echo "<hr>";

    $jumlahLahan = 10;
    $tanamanPerLahan = 5;
    $buahPerTanaman = 10;
    $jumlahBuah = 0;

    for ($i = 1; $i <= $jumlahLahan; $i++) {
        $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
    }

    echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";

    echo "<hr>";

    $skorUjian = [85, 92, 78, 96, 88];
    $totalSkor = 0;

    foreach ($skorUjian as $skor) {
        $totalSkor += $skor;
    }

    echo "Total skor ujian adalah: $totalSkor";

    echo "<hr>";

    $nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>No</th><th>Nilai</th><th>Status</th></tr>";

    $no = 1;
    foreach ($nilaiSiswa as $nilai) {
        if ($nilai < 60) {
            $status = "Tidak Lulus";
        } else {
            $status = "Lulus";
        }
        echo "<tr><td>{$no}</td><td>{$nilai}</td><td>{$status}</td></tr>";
        $no++;
    }

    echo "</table>";
?>