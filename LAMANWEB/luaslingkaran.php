<?php

function hitungLuasLingkaran($jariJari) {
    // Konstanta pi
    $pi = 3.14159;
    
    // Rumus luas lingkaran: π * r²
    $luas = $pi * ($jariJari * $jariJari);
    
    return $luas;
}

$jarijari = 150; // jari-jari lingkaran
$luas = hitungLuasLingkaran($jarijari);

echo "Jari-jari lingkaran: $jarijari cm<br>";
echo "Luas lingkaran: " . round($luas, 2) . " cm²\n";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPWB2_2 - Menghitung Luas Lingkaran</title>
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
            <a href="dashboard.php">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>