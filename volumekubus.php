<?php
function hitungVolumeKubus($sisi) {
    $volume = $sisi * $sisi * $sisi;
    return $volume;
}

$panjangSisi = 10; // panjang sisi kubus
$Volume = hitungVolumeKubus($panjangSisi);

echo "Panjang sisi kubus: $panjangSisi cm<br>";
echo "Volume kubus: $Volume cm³<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPWB2_2 - Menghitung Volume Kubus</title>
    <style>
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
<div class="back-link">
            <a href="index.php">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>