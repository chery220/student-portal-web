<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: utama/main.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PENS APPS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="aset/auth_forms.css">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login Mahasiswa</h2>
            
            <?php
            $pesan_error = "";
            
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") $pesan_error = "Username atau password salah!";
                if ($_GET['pesan'] == "belum_login") $pesan_error = "Anda harus login terlebih dahulu!";
            }
            
            if (isset($_SESSION['error'])) {
                $pesan_error = $_SESSION['error'];
                unset($_SESSION['error']); 
            }

            if (!empty($pesan_error)) {
                echo "<div class='alert-error' style='background: #fef2f2; color: #991b1b; padding: 10px; border-radius: 4px; font-size: 13px; margin-bottom: 15px; text-align: center; border: 1px solid #fca5a5;'>
                        " . $pesan_error . "
                      </div>";
            }
            ?>
            
            <form action="modular/cek_login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                
                <button type="submit">Sign In</button>
            </form>

            <div class="register-link">
                <p style="margin-top: 20px; color: #1c1c1d;">
                    Belum punya akun? <a href="utama/daftar.php">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>