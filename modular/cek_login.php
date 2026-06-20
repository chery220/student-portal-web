<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';
require_once 'opendb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (strlen($username) < 3) {
        $_SESSION['error'] = "Username min. 3 karakter!";
        header("Location: ../index.php");
        exit();
    }


    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data && password_verify($password, $user_data['password'])) {
            
            $_SESSION['user'] = [
                'username' => $user_data['username'],
                'nama'     => $user_data['nama'],
                'nrp'      => $user_data['nrp'],
                'status'   => isset($user_data['status']) ? $user_data['status'] : 'Mahasiswa Aktif'
            ];

            header("Location: ../utama/main.php");
            exit();
        } else {
            header("Location: ../index.php?pesan=gagal");
            exit();
        }

    } catch (PDOException $e) {
        die("Kesalahan Sistem Login: " . $e->getMessage());
    }
        } else {
            header("Location: ../index.php");
            exit();
        }
?>
