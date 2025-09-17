<?php
    $availableRak = 120;
    $rakTerisi = 85;

    $emptyRak = $availableRak - $rakTerisi;
    $percentEmpty = $emptyRak / $availableRak * 100;

    echo "Total rak buku: $availableRak <br>";
    echo "Rak yang kosong: $emptyRak <br>";
    echo "Persentase rak yang masih kosong: " . round($percentEmpty, 2) . "% <br>";
?>