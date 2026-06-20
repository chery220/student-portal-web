<?php
require_once '../modular/proses_dataTugas.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mata Kuliah Saya - PENS</title>
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/tugas.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-wrapper">
        <?php require_once "../modular/sidebar.php"; ?>

        <main class="main-content">
            <?php require_once "../modular/header.php"; ?>

            <div class="content" style="padding: 30px;">
                <h2 style="text-align: center; margin-bottom: 10px; font-weight: 800; color: #000000;">Daftar Mata Kuliah Akademik</h2>
                <p style="text-align: center; color: #64748b; margin-bottom: 40px; font-size: 14px;">Pilih mata kuliah untuk melakukan absensi, mengunduh materi, atau mengumpulkan tugas.</p>

                <div class="matkul-grid">
                    <?php foreach($mata_kuliah as $mk): ?>
                        <div class="matkul-card" onclick="window.location='detail_matkul.php?id=<?= $mk['id'] ?>'">
                            
                            <div class="matkul-card-header">
                                <div class="matkul-icon"><?= $mk['icon'] ?></div>
                                <h3 class="matkul-title"><?= htmlspecialchars($mk['nama_matkul']) ?></h3>
                                <div class="matkul-dosen"><?= htmlspecialchars($mk['dosen']) ?></div>
                            </div>
                            
                            <div class="matkul-card-body">
                                <div class="matkul-info-item">
                                    <span>📅</span> <span><strong>Hari:</strong> <?= htmlspecialchars($mk['hari']) ?></span>
                                </div>
                                <div class="matkul-info-item">
                                    <span>⏰</span> <span><strong>Jam:</strong> <?= htmlspecialchars($mk['jam']) ?></span>
                                </div>
                                <div class="matkul-info-item">
                                    <span>📍</span> <span><strong>Ruang:</strong> <?= htmlspecialchars($mk['ruang']) ?></span>
                                </div>
                            </div>
                            
                            <div class="matkul-card-footer">
                                Masuk Kelas Ruang Belajar &rarr;
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>