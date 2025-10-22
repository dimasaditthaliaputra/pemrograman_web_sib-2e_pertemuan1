<?php
    $host = "localhost";
    $port = "5432";
    $dbname = "prakwebdb";
    $user = "postgres";
    $pass = "";

    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

    if (!$conn) {
        die("Koneksi gagal: " . pg_last_error());
    }

    pg_set_client_encoding($conn, "UTF8");
?>