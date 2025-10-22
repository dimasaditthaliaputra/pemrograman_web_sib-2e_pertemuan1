<?php
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM \"user\" WHERE \"username\"='$username' and \"password\"='$password'";
$result = pg_query($conn, $sql);
$cek = pg_num_rows($result);
if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
?>Anda Berhasil Login, silahkan menuju
<a href="homeSession.php"> Halaman Home </a>
<?php
} else {
?>Gagal login, silahkan login lagi
<a href="sessionLoginForm.html"> Halaman Login </a>
<?php
    echo pg_last_error($conn);
}
?>