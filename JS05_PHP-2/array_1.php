<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Array Terindeks</h2>
    <?php
        $Listdosen = ["Dimas Adit", "Yanuar Aldebaran", "Rifqi Hilmi Mubarok"];

        echo $Listdosen[2] . "<br>";
        echo $Listdosen[0] . "<br>";
        echo $Listdosen[1] . "<br>";

        echo "<hr>";
        echo "<h2>Menampilkan semua data array dengan loop: </h2>";

        foreach ($Listdosen as $dosen) {
            echo $dosen . "<br>";
        }
    ?>
</body>
</html>