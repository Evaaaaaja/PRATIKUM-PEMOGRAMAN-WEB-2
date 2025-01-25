<?php
session_start();
require_once __DIR__ . '/config.php';

// Redirect to dashboard if already logged in
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password dan confirm password sama
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = 'Semua kolom harus diisi!';
    } elseif ($password !== $confirm_password) {
        $error = 'Password dan konfirmasi password tidak sama!';
    } else {
        // Query untuk memeriksa apakah username sudah ada
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($link, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            // Cek apakah username sudah ada
            if (mysqli_stmt_num_rows($stmt) > 0) {
                $error = 'Username sudah ada!';
                mysqli_stmt_close($stmt);
            } else {
                mysqli_stmt_close($stmt);

                // Query untuk menambahkan pengguna baru
                $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                $stmt = mysqli_prepare($link, $sql);
                
                if ($stmt) {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        $success = 'Pengguna baru berhasil ditambahkan! Silakan <a href="login.php">login</a>.';
                    } else {
                        $error = 'Terjadi kesalahan. Silakan coba lagi.';
                    }
                    
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Ulva Khairunnisya</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #E6E6FA;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            width: 100%;
            max-width: 350px;
        }
        .register-header {
            text-align: center;
            color: #8A4FFF;
            margin-bottom: 20px;
        }
        .register-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .register-btn {
            width: 100%;
            padding: 10px;
            background-color: #8A4FFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .register-btn:hover {
            background-color: #6A29CC;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
        .success a {
            color: #8A4FFF;
            text-decoration: none;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        .login-link a {
            color: #8A4FFF;
            text-decoration: none;
        }
        .input-group {
            position: relative;
            margin-bottom: 15px;
        }
        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #8A4FFF;
        }
        .input-group input {
            padding-left: 35px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h2>Registrasi</h2>
        </div>

        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>

        <form method="POST" class="register-form">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="register-btn">Daftar</button>
        </form>

        <div class="login-link">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>