<?php
    function perkenalan($nama, $salam = "Assalamualaikum") {
        echo $salam . "<br/>";
        echo "Perkenalkan, nama saya " . $nama . "<br/>"; //Tulis sesuai nama kalian
        echo "Senang berkenalan dengan Anda<br/>";
    }

    //memanggil fungsi yang sudah dibuat
    perkenalan("Dimas", "Hallo");

    echo "<hr>";

    $saya = "Yanuar ";
    $ucapanSalam = "Selamat pagi!";

    // memanggil lagi
    perkenalan($saya);


?>