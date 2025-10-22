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

            // Validasi spesifik
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

    // Denda opsional
    $input['denda'] = !empty($_POST['denda']) ? (int)$_POST['denda'] : 0;

    if (empty($errors)) {
        $total = (int)$input['pkb'] + (int)$input['swdkllj'] + $input['denda'];

        $newPayment = [
            'nopol' => $input['nopol'],
            'nama' => $input['nama'],
            'norangka' => $input['norangka'],
            'nomesin' => $input['nomesin'],
            'merk' => $input['merk'],
            'tahun' => $input['tahun'],
            'warna' => $input['warna'],
            'jenis' => isset($_POST['jenis']) ? htmlspecialchars($_POST['jenis'], ENT_QUOTES, 'UTF-8') : 'Sepeda Motor',
            'nohp' => $input['nohp'],
            'tahunpajak' => $input['tahunpajak'],
            'pkb' => (int)$input['pkb'],
            'swdkllj' => (int)$input['swdkllj'],
            'denda' => $input['denda'],
            'total' => $total
        ];

        $payments[] = $newPayment;
        $successMessage = 'Pembayaran berhasil ditambahkan!';
        
        // Reset input setelah berhasil
        $input = [];
    } else {
        $errorMessage = "Ada error pada form, silakan periksa kembali!";
    }
}

function formatRupiah($angka)
{
    return 'Rp. ' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pajak Sepeda Motor</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Pembayaran Pajak Sepeda Motor</h1>
        <p class="subtitle">Sistem Informasi Pembayaran Pajak Kendaraan Bermotor</p>

        <form method="POST" id="pajakForm">
            <div class="form-section">
                <h2>Data Kendaraan</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nopol">Nomor Polisi *</label>
                        <input type="text" id="nopol" name="nopol" placeholder="Contoh: N 1234 AB" value="<?php echo isset($input['nopol']) ? $input['nopol'] : ''; ?>">
                        <?php if (isset($errors['nopol'])): ?>
                            <span class="error"><?php echo $errors['nopol']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pemilik *</label>
                        <input type="text" id="nama" name="nama" placeholder="Nama lengkap pemilik" value="<?php echo isset($input['nama']) ? $input['nama'] : ''; ?>">
                        <?php if (isset($errors['nama'])): ?>
                            <span class="error"><?php echo $errors['nama']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="norangka">Nomor Rangka *</label>
                        <input type="text" id="norangka" name="norangka" placeholder="Nomor rangka kendaraan" value="<?php echo isset($input['norangka']) ? $input['norangka'] : ''; ?>">
                        <?php if (isset($errors['norangka'])): ?>
                            <span class="error"><?php echo $errors['norangka']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="nomesin">Nomor Mesin *</label>
                        <input type="text" id="nomesin" name="nomesin" placeholder="Nomor mesin kendaraan" value="<?php echo isset($input['nomesin']) ? $input['nomesin'] : ''; ?>">
                        <?php if (isset($errors['nomesin'])): ?>
                            <span class="error"><?php echo $errors['nomesin']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk/Type *</label>
                        <input type="text" id="merk" name="merk" placeholder="Contoh: Honda Beat" value="<?php echo isset($input['merk']) ? $input['merk'] : ''; ?>">
                        <?php if (isset($errors['merk'])): ?>
                            <span class="error"><?php echo $errors['merk']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Pembuatan *</label>
                        <input type="number" id="tahun" name="tahun" placeholder="Contoh: 2020" value="<?php echo isset($input['tahun']) ? $input['tahun'] : ''; ?>">
                        <?php if (isset($errors['tahun'])): ?>
                            <span class="error"><?php echo $errors['tahun']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna *</label>
                        <input type="text" id="warna" name="warna" placeholder="Contoh: Hitam" value="<?php echo isset($input['warna']) ? $input['warna'] : ''; ?>">
                        <?php if (isset($errors['warna'])): ?>
                            <span class="error"><?php echo $errors['warna']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Kendaraan *</label>
                        <input type="text" id="jenis" name="jenis" value="Sepeda Motor" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor HP *</label>
                        <input type="tel" id="nohp" name="nohp" placeholder="08xxxxxxxxxx" value="<?php echo isset($input['nohp']) ? $input['nohp'] : ''; ?>">
                        <?php if (isset($errors['nohp'])): ?>
                            <span class="error"><?php echo $errors['nohp']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2>Rincian Pembayaran</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="tahunpajak">Tahun Pajak *</label>
                        <input type="number" id="tahunpajak" name="tahunpajak" placeholder="2025" value="<?php echo isset($input['tahunpajak']) ? $input['tahunpajak'] : ''; ?>">
                        <?php if (isset($errors['tahunpajak'])): ?>
                            <span class="error"><?php echo $errors['tahunpajak']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="pkb">PKB (Pajak Kendaraan Bermotor) *</label>
                        <input type="number" id="pkb" name="pkb" value="<?php echo isset($input['pkb']) ? $input['pkb'] : ''; ?>">
                        <?php if (isset($errors['pkb'])): ?>
                            <span class="error"><?php echo $errors['pkb']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="swdkllj">SWDKLLJ *</label>
                        <input type="number" id="swdkllj" name="swdkllj" value="<?php echo isset($input['swdkllj']) ? $input['swdkllj'] : ''; ?>">
                        <?php if (isset($errors['swdkllj'])): ?>
                            <span class="error"><?php echo $errors['swdkllj']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda (Opsional)</label>
                        <input type="number" id="denda" name="denda" value="<?php echo isset($input['denda']) ? $input['denda'] : ''; ?>">
                    </div>
                </div>

                <div class="total-section">
                    <label style="display: block; text-align: center; margin-bottom: 10px; color: #856404;">Total Bayar</label>
                    <div class="total-display" id="totalBayar">Rp. 0</div>
                </div>
            </div>

            <button type="submit" class="btn">Tambah Pembayaran</button>

            <?php if ($successMessage): ?>
                <div class="alert alert-success"><?php echo $successMessage; ?></div>
            <?php endif; ?>
            
            <?php if ($errorMessage): ?>
                <div class="alert alert-error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </form>

        <div class="table-section">
            <h2>History Pembayaran Pajak Motor</h2>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Polisi</th>
                            <th>Nama Pemilik</th>
                            <th>Merk/Type</th>
                            <th>Tahun Pajak</th>
                            <th>PKB</th>
                            <th>SWDKLLJ</th>
                            <th>Denda</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($payments as $payment):
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $payment['nopol']; ?></td>
                                <td><?php echo $payment['nama']; ?></td>
                                <td><?php echo $payment['merk']; ?></td>
                                <td><?php echo $payment['tahunpajak']; ?></td>
                                <td><?php echo formatRupiah($payment['pkb']); ?></td>
                                <td><?php echo formatRupiah($payment['swdkllj']); ?></td>
                                <td><?php echo formatRupiah($payment['denda']); ?></td>
                                <td><strong><?php echo formatRupiah($payment['total']); ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function formatRupiah(angka) {
                return 'Rp. ' + parseInt(angka).toLocaleString('id-ID');
            }

            function hitungTotal() {
                const pkb = parseInt($('#pkb').val()) || 0;
                const swdkllj = parseInt($('#swdkllj').val()) || 0;
                const denda = parseInt($('#denda').val()) || 0;
                const total = pkb + swdkllj + denda;

                $('#totalBayar').text(formatRupiah(total));
            }

            // Hitung total saat halaman dimuat (jika ada nilai sebelumnya)
            hitungTotal();

            $('#pkb, #swdkllj, #denda').on('input', function() {
                hitungTotal();
            });

            $('#nohp').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#nopol, #norangka, #nomesin').on('input', function() {
                this.value = this.value.toUpperCase();
            });

            $('#pajakForm').on('submit', function(e) {
                let error = '';

                // Validasi field yang wajib diisi (kecuali jenis dan denda)
                const requiredFields = ['nopol', 'nama', 'norangka', 'nomesin', 'merk', 'tahun', 'warna', 'nohp', 'tahunpajak', 'pkb', 'swdkllj'];
                
                requiredFields.forEach(function(fieldName) {
                    const value = $('#' + fieldName).val().trim();
                    if (value === '') {
                        error = 'Mohon lengkapi semua field yang bertanda *';
                        return false;
                    }
                });

                const nohp = $('#nohp').val().trim();
                if (!error && (nohp.length < 10 || !/^[0-9]+$/.test(nohp))) {
                    error = 'Nomor HP tidak valid (minimal 10 digit)';
                }

                const tahun = parseInt($('#tahun').val());
                if (!error && (tahun < 1900 || tahun > 2025)) {
                    error = 'Tahun pembuatan tidak valid (1900-2025)';
                }

                if (error) {
                    alert(error);
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>