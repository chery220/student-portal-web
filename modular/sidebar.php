<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_page = basename($_SERVER['PHP_SELF']);

$sidebar_nama   = isset($_SESSION['user']['nama']) ? $_SESSION['user']['nama'] : 'Mahasiswa';
$sidebar_nrp    = isset($_SESSION['user']['nrp']) ? $_SESSION['user']['nrp'] : 'NRP';
$sidebar_status = isset($_SESSION['user']['status']) ? $_SESSION['user']['status'] : 'Mahasiswa Aktif';
?>

<link rel="stylesheet" href="../aset/sidebar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<aside class="sidebar">
    <div class="sidebar-header">
        <h3>PENS APPS</h3>
    </div>
    
    <div class="sidebar-profile">
        <div class="sidebar-avatar-wrapper" style="position: relative; display: inline-block;">
            
            <?php 
            $foto_sidebar = !empty($_SESSION['user']['foto']) ? "../aset/foto_profil/" . $_SESSION['user']['foto'] : "https://ui-avatars.com/api/?name=" . urlencode($sidebar_nama) . "&background=0D8ABC&color=fff";
            ?>
            <img src="<?= $foto_sidebar ?>" alt="Profile" class="sidebar-avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
            
            <a href="edit_profile.php" title="Edit Profil" style="position: absolute; bottom: 0; right: 0; background: #0ea5e9; color: white; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; border: 2px solid #fff; text-decoration: none;">
                <i class="fa-solid fa-pen"></i>
            </a>
        </div>

        <h4 class="sidebar-name" style="margin-top: 8px;"><?= htmlspecialchars($sidebar_nama) ?></h4>
        <p class="sidebar-nrp"><?= htmlspecialchars($sidebar_nrp) ?></p> 
        <span class="sidebar-status"><?= htmlspecialchars($sidebar_status) ?></span>
        
        <div style="margin-top: 8px;">
            <a href="edit_profile.php" style="font-size: 12px; color: #0284c7; text-decoration: none; font-weight: 600;">⚙️ Pengaturan Profil</a>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li class="<?= ($current_page == 'main.php') ? 'active' : ''; ?>">
                <a href="main.php">Overview</a>
            </li>
            
            <li class="<?= ($current_page == 'tugas_mhs.php' || $current_page == 'detail_matkul.php' || $current_page == 'edit_profile.php') ? 'active' : ''; ?>">
                <a href="tugas_mhs.php">Data Tugas</a>
            </li>
            
            <li class="sidebar-logout-item">
                <a href="../modular/logout.php" style="color: #ef4444;">
                    <i class="fa-solid fa-right-from-bracket" style="margin-right: 8px;"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
</aside>