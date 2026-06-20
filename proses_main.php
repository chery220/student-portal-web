<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proteksi Halaman
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

$main_nama   = is_array($_SESSION['user']) ? $_SESSION['user']['nama'] : $_SESSION['user']; 
$main_nrp    = is_array($_SESSION['user']) ? $_SESSION['user']['nrp'] : (isset($_SESSION['nrp']) ? $_SESSION['nrp'] : '21101910xx');
$main_status = is_array($_SESSION['user']) ? $_SESSION['user']['status'] : 'Mahasiswa Aktif';
?>