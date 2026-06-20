<?php
require_once "../modular/proses_frs.php"; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>FRS Mahasiswa - PENS APPS</title>
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/frs.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-wrapper">
        <?php require_once "../modular/sidebar.php"; ?>
        
        <main class="main-content">
            <?php require_once "../modular/header.php"; ?>

            <div class="frs-container">
                <div class="frs-card">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                        <div>
                            <h1 style="font-weight: 900; margin-bottom: 5px; letter-spacing: -1px;">FORM RENCANA STUDI (FRS)</h1>
                            <p style="color: #64748b;">Semester Genap 2025/2026</p>
                        </div>
                        <a href="#" class="btn-cetak" onclick="window.print(); return false;">🖨️ Cetak FRS</a>
                    </div>

                    <div class="frs-header-info">
                        <div class="frs-info-item">
                            <span>Nama Mahasiswa</span>
                            <strong><?= htmlspecialchars(strtoupper($main_nama)) ?></strong>
                        </div>
                        <div class="frs-info-item">
                            <span>NRP</span>
                            <strong><?= htmlspecialchars($main_nrp) ?></strong>
                        </div>
                        <div class="frs-info-item">
                            <span>Maksimum SKS</span>
                            <strong>24 SKS</strong>
                        </div>
                    </div>

                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $j): ?>
                                <tr>
                                    <td style="color: #64748b;"><?= htmlspecialchars($j['kode']) ?></td>
                                    <td><?= htmlspecialchars($j['matkul']) ?></td>
                                    <td><?= (int)$j['sks'] ?> SKS</td>
                                    <td>
                                        <span class="badge-hari <?= strtolower($j['hari']) ?>">
                                            <?= htmlspecialchars($j['hari']) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($j['jam']) ?></td>
                                    <td><strong><?= htmlspecialchars($j['ruang']) ?></strong></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div style="margin: 40px; ">
                    <a href="main.php" style="text-decoration: none; color: #64748b; font-weight: 600; font-size: 14px;">
                        &larr; Kembali ke Dashboard
                    </a>
                </div>
        </main>
    </div>
</body>
</html>