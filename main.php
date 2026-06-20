<?php
require_once "../modular/proses_main.php"; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Mahasiswa</title>
    
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/dashboard_main.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <div class="dashboard-wrapper">
        <?php require_once "../modular/sidebar.php"; ?>

        <main class="main-content">
            <?php require_once "../modular/header.php"; ?>

            <section class="content-area">
                
                <div class="welcome-banner">
                    <div class="hero-content">
                        <span class="academic-year">
                            Tahun Akademik 2025/2026
                        </span>
                        <h2>Halo, <?php echo htmlspecialchars($main_nama); ?>! 👋</h2>
                        <p>Selamat datang kembali di sistem informasi akademik terpadu PENS.</p>
                    </div>
                    
                    <div class="banner-meta-row">
                        <div class="meta-item">
                            <span class="meta-label">Status</span>
                            <span class="meta-value"><?php echo htmlspecialchars($main_status); ?></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">NRP</span>
                            <span class="meta-value"><?php echo htmlspecialchars($main_nrp); ?></span>
                        </div>
                    </div>
                </div>

                <div class="task-grid">
    
                    <a href="khs.php" class="task-card">
                        <div style="font-size: 30px; margin-bottom: 10px;">📊</div>
                        <h4>Hasil Studi</h4>
                        <p class="task-info">Transkrip Nilai & KHS</p>
                        <div class="task-footer">
                            <span class="btn-detail">Lihat Detail →</span>
                        </div>
                    </a>

                    <a href="frs.php" class="task-card">
                        <div style="font-size: 30px; margin-bottom: 10px;">📝</div>
                        <h4>FRS</h4>
                        <p class="task-info">Rencana Semester & Jadwal</p>
                        <div class="task-footer">
                            <span class="btn-detail">Kelola FRS →</span>
                        </div>
                    </a>

                    <a href="detail_presensi.php" class="task-card">
                        <div class="attendance-header">
                            <div class="icon">⏱️</div>
                            <span class="category-badge">KATEGORI: A</span>
                        </div>
                        
                        <h4>Rekap Presensi</h4>
                        
                        <div class="attendance-stats">
                            <div class="stats-row">
                                <span class="percentage-text">95.8%</span>
                                <span class="meeting-count">23 / 24 Pertemuan</span>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: 95.8%;"></div>
                            </div>
                        </div>
                        
                        <p class="task-info">
                            * Kehadiran aman. Batas minimal presensi akademik adalah 75%.
                        </p>
                        
                        <div class="task-footer">
                            <span class="btn-detail">CEK PRESENSI →</span>
                        </div>
                    </a>
                </div>

                <div class="content-card" style="margin-top: 30px;">
                    <div class="section-title">
                        <h2 style="font-size: 1.2rem;">📢 Pengumuman Terkini</h2>
                    </div>
                    
                    <div class="divider"></div>

                    <div class="info-box" style="margin-bottom: 15px;">
                        <strong style="display: block; margin-bottom: 5px;">05 Mei - Persiapan Midterm Semester Genap</strong>
                        Diharapkan mahasiswa melakukan validasi data FRS sebelum tanggal 10 Mei untuk keperluan administrasi ujian.
                    </div>

                    <div class="info-box" style="background-color: #fff7ed; border-left-color: #f97316; color: #9a3412;">
                        <strong style="display: block; margin-bottom: 5px;">01 Mei - Pembaruan Infrastruktur Server</strong>
                        Layanan akademik mungkin mengalami gangguan pemeliharaan rutin pada pukul 23:00 WIB.
                    </div>
                </div>

            </section>
        </main>
    </div>

</body>
</html>