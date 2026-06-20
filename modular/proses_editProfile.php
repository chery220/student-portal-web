<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';
require_once 'opendb.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php?pesan=belum_login");
    exit();
}

$username_aktif = $_SESSION['user']['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = htmlspecialchars(trim($_POST['nama']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $ttl    = htmlspecialchars(trim($_POST['ttl']));
    $email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $stmt_old = $conn->prepare("SELECT foto FROM users WHERE username = ?");
    $stmt_old->execute([$username_aktif]);
    $old_data = $stmt_old->fetch(PDO::FETCH_ASSOC);
    $nama_foto_baru = $old_data['foto']; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $file_tmp  = $_FILES['foto']['tmp_name'];
        $file_name = $_FILES['foto']['name'];
        $file_size = $_FILES['foto']['size'];
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        
        if (in_array($ext, $allowed_ext)) {
            if ($file_size <= 2 * 1024 * 1024) {
                $nama_foto_baru = "avatar_" . $username_aktif . "_" . time() . "." . $ext;
                $folder_tujuan  = "../aset/foto_profil/" . $nama_foto_baru;

                if (move_uploaded_file($file_tmp, $folder_tujuan)) {
                    if (!empty($old_data['foto']) && file_exists("../aset/foto_profil/" . $old_data['foto'])) {
                        unlink("../aset/foto_profil/" . $old_data['foto']);
                    }
                }
            } else {
                echo "<script>alert('Gagal: Ukuran foto terlalu besar! Maksimal 2MB.'); window.history.back();</script>";
                exit();
            }
        } else {
            echo "<script>alert('Gagal: Format file wajib JPG, JPEG, atau PNG!'); window.history.back();</script>";
            exit();
        }
    }



    try {
        $sql = "UPDATE users SET nama = ?, alamat = ?, ttl = ?, email = ?, foto = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nama, $alamat, $ttl, $email, $nama_foto_baru, $username_aktif]);

        if ($result) {
            $_SESSION['user']['nama'] = $nama;
            $_SESSION['user']['foto'] = $nama_foto_baru; 
            echo "<script>alert('Profil Anda berhasil diperbarui!'); window.location.href = '../utama/main.php';</script>";
            exit();
        }
    } catch (PDOException $e) {
        die("Gagal memperbarui profil: " . $e->getMessage());
    }
} 

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username_aktif]);
    $mhs = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$mhs) {
        die("Data mahasiswa tidak ditemukan.");
    }
} catch (PDOException $e) {
    die("Kesalahan Sistem: " . $e->getMessage());
}
?>