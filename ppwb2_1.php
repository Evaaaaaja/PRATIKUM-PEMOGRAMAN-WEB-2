<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPWB2_1 - Belanja dan Biodata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            text-decoration: none;
            background-color: #4ecdc4;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Praktikum Pemrograman Web 2</h1>
        
        <h2>Tabel Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ulva Khairunnisya</td>
                    <td>09031182328101</td>
                    <td>Praktikum Pemrograman Web 2</td>
                </tr>
            </tbody>
        </table>

        <h2>Pembayaran</h2>
        <?php
        function hitungTotal($jumlahBeli, $hargaBarang) {
            return $jumlahBeli * $hargaBarang;
        }

        $jumlahBeli = 5;
        $hargaBarang = 5000;

        $totalHarga = hitungTotal($jumlahBeli, $hargaBarang);
        ?>
        <table>
            <thead>
                <tr>
                    <th>Jumlah Beli</th>
                    <th>Harga Barang</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $jumlahBeli; ?></td>
                    <td>Rp <?php echo number_format($hargaBarang, 0, ',', '.'); ?></td>
                    <td>Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="back-link">
            <a href="index.php">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>