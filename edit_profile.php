<?php
require_once '../modular/proses_editProfile.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil - PENS APPS</title>
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/edit_profile.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-wrapper">
        <?php require_once "../modular/sidebar.php"; ?>
        
        <main class="main-content">
            <?php require_once "../modular/header.php"; ?>

            <div class="profile-container">
                <div class="profile-card">
                    <div class="profile-title">Edit Profil Anda</div>
                    <div class="profile-subtitle">Perbarui informasi biodata akun mahasiswa Anda di bawah ini.</div>
                    
                    <form action="../modular/proses_editProfile.php" method="post" enctype="multipart/form-data">
                        <div class="form-grid">
                            
                            <div class="form-avatar-section">
                                <?php 
                                $foto_sekarang = !empty($mhs['foto']) ? "../aset/foto_profil/" . $mhs['foto'] : "https://ui-avatars.com/api/?name=" . urlencode($mhs['nama']) . "&background=000&color=fff";
                                ?>
                                <img src="<?= $foto_sekarang ?>" alt="Avatar" class="avatar-preview-img">
                                <div style="flex: 1;">
                                    <label style="font-weight: 600; font-size: 13px; color: #1e293b; display: block; margin-bottom: 6px;">Ganti Foto Profil</label>
                                    <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg, image/jpg">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($mhs['nama']) ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label>NRP (Tidak dapat diubah)</label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($mhs['nrp']) ?>" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label>Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control" name="ttl" value="<?= htmlspecialchars($mhs['ttl']) ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Email Aktif</label>
                                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($mhs['email']) ?>" required>
                            </div>
                            
                            <div class="form-group full-width">
                                <label>Alamat Tinggal</label>
                                <textarea class="form-control" name="alamat" rows="3" required><?= htmlspecialchars($mhs['alamat']) ?></textarea>
                            </div>

                            <div class="btn-group">
                                <a href="main.php" class="btn btn-cancel">Batal</a>
                                <button type="submit" class="btn btn-submit">Simpan Perubahan</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>