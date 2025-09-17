<?php
    $arrNilai = [
        ['Andi', 75],
        ['Budi', 88],
        ['Citra', 95],
        ['Dinda', 70],
        ['Farhan', 82],
    ];

    $totalNilai = 0;
    foreach ($arrNilai as $data) {
        $totalNilai += $data[1];
    }

    $rataRata = $totalNilai / count($arrNilai);

    echo "Rata-rata nilai kelas: $rataRata <br>";
    echo "Daftar siswa dengan nilai di atas rata-rata:<br>";

    $no = 1;
    foreach ($arrNilai as $data) {
        if ($data[1] > $rataRata) {
            echo $no++ . ". Nama: {$data[0]} | Nilai: {$data[1]} <br>";
        }
    }
?>