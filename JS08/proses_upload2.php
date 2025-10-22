<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "documents/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

$allowedExtensions = array("jpg", "jpeg", "png", "gif");

if ($_FILES['images']['name'][0]) {
    $totalFiles = count($_FILES['images']['name']);

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $targetFile = $targetDirectory . $fileName;

        $documentFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($documentFileType, $allowedExtensions)) {
            // Pindahkan file yang diunggah ke direktori penyimpanan
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "Jenis file $fileName tidak diizinkan.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
