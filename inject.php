<?php
    $input = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["input"]; // langsung dipakai tanpa sanitasi
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Belajar Injection</title>
</head>
<body>
    <h2>Form Input (Raw)</h2>
    <form method="post">
        <label>Masukkan teks:</label>
        <input type="text" name="input" value="<?php echo $input; ?>">
        <input type="submit" value="Kirim">
    </form>

    <?php if (!empty($input)) : ?>
        <h3>Output:</h3>
        <p><?php echo $input; ?></p>
    <?php endif; ?>
</body>
</html>
