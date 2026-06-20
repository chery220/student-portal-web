<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config.php';
require_once 'opendb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = htmlspecialchars(trim($_POST['nama']));
    $nrp      = trim($_POST['nrp']); 
    $alamat   = htmlspecialchars(trim($_POST['alamat']));
    $ttl      = htmlspecialchars(trim($_POST['ttl']));
    $email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars(trim($_POST['username']));

    $error_msg = "";

    if (!ctype_digit($nrp)) {
        $error_msg = "NRP harus berupa angka!";
    } elseif (strlen($username) < 3) {
        $error_msg = "Username minimal 3 karakter!";
    } elseif (!preg_match('/^[a-zA-Z0-9._]+$/', $username)) {
        $error_msg = "Username hanya boleh huruf, angka, titik(.), dan underscore(_)!";
    }

    if (!empty($error_msg)) {
        echo "<script src='../aset/script.js'></script>";
        echo "<script>notifGagal('$error_msg');</script>";
        exit();
    }

    $password_plain = $_POST['password']; 
    $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

    try {
    $cek = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $cek->execute([$username]);
    
    if ($cek->fetchColumn() > 0) {
        echo "<script src='../aset/script.js'></script>";
        echo "<script>notifGagal('Username Sudah Digunakan!');</script>";
    } else {
        $sql = "INSERT INTO users (nama, nrp, alamat, ttl, email, username, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nama, $nrp, $alamat, $ttl, $email, $username, $password_hashed]);

        if ($result) {
            echo "<script src='../aset/script.js'></script>";
            echo "<script>notifDaftar('Pendaftaran Berhasil! Silahkan Login.', '../index.php');</script>";
            exit();
        }
    }
        } catch (PDOException $e) {
            die("Kesalahan Database: " . $e->getMessage());
        }
}
?>