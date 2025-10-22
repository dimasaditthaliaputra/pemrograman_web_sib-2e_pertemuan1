<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM \"user\" WHERE \"username\"='$username' AND \"password\"='$password'";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);

if ($row) {
    if ($row['level'] == 1) {
        echo "Anda berhasil login sebagai Admin. Silahkan menuju ";
        echo '<a href="homeAdmin.html">Halaman HOME</a>';
    } else if ($row['level'] == 2) {
        echo "Anda berhasil login sebagai Guest. Silahkan menuju ";
        echo '<a href="homeGuest.html">Halaman HOME</a>';
    } else {
        echo "Level user tidak dikenali.";
    }
} else {
    echo "Anda gagal login. Silahkan ";
    echo '<a href="loginForm.html">Login kembali</a>';
}
?>