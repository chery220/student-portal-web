<?php
session_start();
require_once "../modular/proses_presensi.php"; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Presensi - PENS APPS</title>
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/presensi.css">
</head>
<body>
    <div class="main-content" style="margin-left: 0; width: 100%; padding: 40px;">
        <h2>Detail Presensi</h2>
        
        <div class="matkul-list">
            <?php if (count($jadwal) > 0): ?>
                <?php foreach ($jadwal as $row): ?>
                    <?php 
                        $waktu_str = substr($row['jam_mulai'], 0, 5) . ' - ' . substr($row['jam_selesai'], 0, 5);
                    ?>
                    <div class="matkul-item">
                        <div class="matkul-info">
                            <span class="name"><?= htmlspecialchars($row['nama_matkul']) ?></span>
                            <span class="meta">Status: <?= htmlspecialchars($row['status']) ?> | Waktu: <?= $waktu_str ?></span>
                        </div>
                        <?php if ($row['status'] == 'buka'): ?>
                            <form action="../modular/proses_presensi.php" method="POST">
                                <input type="hidden" name="id_jadwal" value="<?= htmlspecialchars($row['id_jadwal']) ?>">
                                <button type="submit" class="btn-absen" style="background: #059669;">Hadir Sekarang</button>
                            </form>
                        <?php else: ?>
                            <button class="btn-absen" disabled>Terkunci</button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="matkul-item" style="border: 2px dashed #e5e7eb; opacity: 0.6;">
                    <div class="matkul-info">
                        <span class="name">Pemrograman Web</span>
                        <span class="meta">Status: tutup | Waktu: 08:00 - 10:00</span>
                    </div>
                    <button class="btn-absen" disabled>Terkunci</button>
                </div>
                <div class="matkul-item" style="border: 2px solid #374151;">
                    <div class="matkul-info">
                        <span class="name">Basis Data</span>
                        <span class="meta">Status: buka | Waktu: 10:00 - 12:00</span>
                    </div>
                    <form action="../modular/proses_presensi.php" method="POST">
                        <input type="hidden" name="id_jadwal" value="123"> 
                        <button type="submit" class="btn-absen" style="background: #059669;">Hadir Sekarang</button>
                    </form>
                </div>
            <?php endif; ?>

            <h2 style="margin-top: 50px;">Riwayat Presensi</h2>
            <h3 style="color: #6b7280; font-size: 14px; margin-top: 20px;">30 Mei 2026</h3>
                <div class="matkul-item" style="border-left: 4px solid #059669; background: #f0fdf4;">
                    <div class="matkul-info">
                        <span class="name">Matematika Diskrit</span>
                        <span class="meta" style="color: #065f46;">Hadir pukul 08:05:12</span>
                    </div>
                </div>

                <div class="matkul-item" style="border-left: 4px solid #059669; background: #f0fdf4;">
                    <div class="matkul-info">
                        <span class="name">Sistem Operasi</span>
                        <span class="meta" style="color: #065f46;">Hadir pukul 10:15:45</span>
                    </div>
                </div>
                <div class="matkul-item" style="border-left: 4px solid #059669; background: #f0fdf4;">
                    <div class="matkul-info">
                        <span class="name">Algoritma Pemrograman</span>
                        <span class="meta" style="color: #065f46;">Hadir pukul 13:02:10</span>
                    </div>
                </div>

                <h3 style="color: #6b7280; font-size: 14px; margin-top: 20px;">29 Mei 2026</h3>
                <div class="matkul-item" style="border-left: 4px solid #059669; background: #f0fdf4;">
                    <div class="matkul-info">
                        <span class="name">Bahasa Inggris</span>
                        <span class="meta" style="color: #065f46;">Hadir pukul 07:55:00</span>
                    </div>
                </div>
                <div class="matkul-item" style="border-left: 4px solid #059669; background: #f0fdf4;">
                    <div class="matkul-info">
                        <span class="name">Struktur Data</span>
                        <span class="meta" style="color: #065f46;">Hadir pukul 09:10:20</span>
                    </div>
                </div>
            </div>
            <div style="margin-top: 30px;">
                <a href="main.php" class="btn-back">← Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>