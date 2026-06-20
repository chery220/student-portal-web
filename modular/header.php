<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../modular/config.php'; 
require_once '../modular/opendb.php'; 
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../aset/header.css">

<header class="main-header">
    <div class="header-left">
        SELAMAT DATANG, <span class="user-highlight">
            <?php 
            if (isset($_SESSION['user'])) {
                $nama_user = is_array($_SESSION['user']) ? $_SESSION['user']['nama'] : $_SESSION['user'];
                echo strtoupper(htmlspecialchars($nama_user));
            } else {
                echo 'MAHASISWA';
            }
            ?>
        </span>
    </div>

    <div class="header-right">
        
        <div class="header-search-form">
            <input type="text" class="header-search-input" placeholder="Search...">
        </div>
        
        <div class="notification-badge-container" id="notifContainer">
            <i class="fa-solid fa-bell icon-bell"></i>
            <span class="notification-counter">2</span>
            
            <div class="notification-dropdown">
                <div class="dropdown-header">Notifikasi Terbaru</div>
                <a href="../utama/tugas_mhs.php" class="dropdown-item">🔒 Tugas Pemrograman Web akan segera berakhir malam ini!</a>
                <a href="../utama/main.php" class="dropdown-item">📢 Pengumuman: Jadwal UTS Genap telah diterbitkan.</a>
            </div>
        </div>
    </div>
</header>

<script src="../aset/script.js"></script>