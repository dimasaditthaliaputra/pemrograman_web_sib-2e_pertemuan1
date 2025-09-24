<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="styleArray2.css">
</head>

<body>
    <h2>Tabel Biodata Dosen</h2>
    <?php
    $Dosen = [
        'nama' => 'Dimas Adit Thalia Putra',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Laki-Laki'
    ];

    echo "<table border='1' class='table-dosen'>";
    echo "<tr><th>Nama</th><td>{$Dosen['nama']}</td></tr>";
    echo "<tr><th>Domisili</th><td>{$Dosen['domisili']}</td></tr>";
    echo "<tr><th>Jenis Kelamin</th><td>{$Dosen['jenis_kelamin']}</td></tr>";
    echo "</table>";
    ?>
</body>

</html>