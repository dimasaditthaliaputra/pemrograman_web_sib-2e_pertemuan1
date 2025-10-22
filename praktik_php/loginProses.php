<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM \"user\" WHERE \"username\"='$username' AND \"password\"='$password'";
$result = pg_query($conn, $query);
$cek = pg_num_rows($result);

if ($cek > 0) {
    echo "Anda berhasil login. silahkan menuju "; ?>
    <a href="homeAdmin.html">Halaman HOME</a>
<?php
} else {
    echo "Anda gagal login. silahkan coba lagi "; ?>
    <a href="loginForm.html">Halaman LOGIN</a>
<?php
    echo pg_last_error($conn);
}

echo $password;
?>