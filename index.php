<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ulva Khairunnisya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6E6FA;  /* Lilac background */
            margin: 0;
            padding: 0;
        }
        .colorful-marquee {
            width: 100%;
            background: linear-gradient(to right, #ff6b6b, #4ecdc4, #45b7d1, #ff9ff3, #6a5acd);
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 25px;
            font-weight: bold;
        }
        .biodata-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 40px;
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .biodata-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .biodata-text {
            max-width: 400px;
            text-align: left;
        }
        .image-container {
            flex: 0 0 250px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        img {
            max-width: 100%;
            border-radius: 10px;
        }
        .social-link {
            display: flex;
            align-items: center;
            margin-top: 10px;
            text-decoration: none;
            color: #0066cc;
        }
        .social-link i {
            margin-right: 10px;
            font-size: 24px;
        }
        .exercises-container {
            background-color: #fff;
            padding: 40px;
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .exercises-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .latihan-exercises {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .exercise-card {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .exercise-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .exercise-card a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .logout {
            margin-top: 20px;
            text-align: center;
        }
        .logout-btn {
            display: inline-block;
            background-color: #8A4FFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #6A29CC;
        }
    </style>
</head>
<body>
    <div class="colorful-marquee">
        <marquee behavior="scroll" direction="left">
            <span>WELCOME TO MY WEBSITE</span>
        </marquee>
    </div>

    <div class="biodata-container">
        <div class="biodata-content">
            <h2>Biodata</h2>
            <div class="biodata-text">
                <p>Nama: Ulva Khairunnisya</p>
                <p>NIM: 09031182328101</p>
                <p>Jurusan: Sistem Informasi</p>
                <p>Fakultas: Ilmu Komputer</p>
                <p>Universitas: Sriwijaya</p>
                <p>Asal: Bangka Barat</p>
                <p>Hobi: Membaca Komik dan Menyanyi</p>
                <a href="https://www.instagram.com/khairunnisya_ulva?igsh=MXV4ejI0cGttZjF1Zg==" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
            </div>
        </div>
        <div class="image-container">
            <img src="me.jpg" alt="Ulva Khairunnisya">
        </div>
    </div>

    <div class="exercises-container">
        <h2 class="exercises-title">Kumpulan Latihan Praktikum Pemrograman Web 2</h2>
        <div class="latihan-exercises">
            <div class="exercise-card">
                <a href="ppwb2_1.php">Menghitung Belanjaan</a>
            </div>
            <div class="exercise-card">
                <a href="heading.php">Heading HTML</a>
            </div>
            <div class="exercise-card">
                <a href="luaslingkaran.php">Luas Lingkaran</a>
            </div>
            <div class="exercise-card">
                <a href="tag.php">Tag HTML</a>
            </div>
            <div class="exercise-card">
                <a href="volumekubus.php">Volume Kubus</a>
            </div>
        </div>

        <div class="logout">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</body>
</html>