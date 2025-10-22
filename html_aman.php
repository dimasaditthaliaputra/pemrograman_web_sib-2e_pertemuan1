<?php
$payments = [
    ['nopol' => 'N 1234 AB', 'nama' => 'Ahmad Zaini', 'merk' => 'Honda Beat', 'tahunpajak' => '2024', 'pkb' => 350000, 'swdkllj' => 35000, 'denda' => 0, 'total' => 385000],
    ['nopol' => 'N 5678 CD', 'nama' => 'Siti Nurhaliza', 'merk' => 'Yamaha Mio', 'tahunpajak' => '2024', 'pkb' => 320000, 'swdkllj' => 35000, 'denda' => 50000, 'total' => 405000],
    ['nopol' => 'N 9101 EF', 'nama' => 'Budi Santoso', 'merk' => 'Suzuki Nex', 'tahunpajak' => '2024', 'pkb' => 300000, 'swdkllj' => 35000, 'denda' => 0, 'total' => 335000]
];

$successMessage = '';
$errorMessage = '';
$errors = [];
$input = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_fields = ['nopol', 'nama', 'norangka', 'nomesin', 'merk', 'tahun', 'warna', 'nohp', 'tahunpajak', 'pkb', 'swdkllj'];

    foreach ($_fields as $field) {
        if (!empty($_POST[$field])) {
            $input[$field] = htmlspecialchars(trim($_POST[$field]), ENT_QUOTES, 'UTF-8');

            if ($field === 'nohp' && !preg_match('/^[0-9]{10,15}$/', $input[$field])) {
                $errors[$field] = "Nomor HP tidak valid (10-15 digit)";
            }
            if ($field === 'tahun' && ($input[$field] < 1900 || $input[$field] > 2025)) {
                $errors[$field] = "Tahun pembuatan tidak valid (1900-2025)";
            }
            if (($field === 'pkb' || $field === 'swdkllj') && !is_numeric($input[$field])) {
                $errors[$field] = ucfirst($field) . " harus angka";
            }
        } else {
            $errors[$field] = ucfirst($field) . " tidak boleh kosong";
        }
    }

    if (empty($errors)) {
        $denda = !empty($_POST['denda']) ? (int)$_POST['denda'] : 0;
        $total = (int)$input['pkb'] + (int)$input['swdkllj'] + $denda;

        $newPayment = [
            'nopol' => $input['nopol'],
            'nama' => $input['nama'],
            'norangka' => $input['norangka'],
            'nomesin' => $input['nomesin'],
            'merk' => $input['merk'],
            'tahun' => $input['tahun'],
            'warna' => $input['warna'],
            'jenis' => htmlspecialchars($_POST['jenis'], ENT_QUOTES, 'UTF-8'),
            'nohp' => $input['nohp'],
            'tahunpajak' => $input['tahunpajak'],
            'pkb' => (int)$input['pkb'],
            'swdkllj' => (int)$input['swdkllj'],
            'denda' => $denda,
            'total' => $total
        ];

        $payments[] = $newPayment;
        $successMessage = 'Pembayaran berhasil ditambahkan!';
    } else {
        $errorMessage = "Ada error pada form, silakan periksa kembali!";
    }
}

function formatRupiah($angka) {
    return 'Rp. ' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Injection</title>
</head>

<body>
    <h2>Form Input Aman</h2>
    <form method="post">
        <label>Masukkan teks:</label>
        <input type="text" name="input" id="input" value="<?php echo $input; ?>">
        <span class="error"><?php echo $inputErr; ?></span>

        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <br><br>
        <input type="submit" name="submit" value="Kirim"></input>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($inputErr) && empty($emailErr)) : ?>
        <hr>
        <p>Data Berhasil Disimpan</p>

        <h3>Hasil:</h3>
        <label>Input:</label>
        <p><?php echo $input; ?></p>

        <br><br>

        <label>Email:</label>
        <p><?php echo $email; ?></p>
    <?php endif; ?>
</body>

</html>