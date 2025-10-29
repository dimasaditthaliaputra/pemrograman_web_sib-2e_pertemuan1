<?php
// Ambil id halaman dari URL, default = home
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item <?= ($page == 'home') ? 'active' : '' ?>">
            <a class="nav-link" href="?page=home">Home</a>
        </li>
        <li class="nav-item <?= ($page == 'about') ? 'active' : '' ?>">
            <a class="nav-link" href="?page=about">About</a>
        </li>
        <li class="nav-item <?= ($page == 'contact') ? 'active' : '' ?>">
            <a class="nav-link" href="?page=contact">Contact</a>
        </li>
    </ul>
</nav>

</body>
</html>
