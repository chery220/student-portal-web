<?php
require_once "../modular/proses_khs.php"; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Studi - PENS APPS</title>
    
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/khs.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-wrapper">
        <?php require_once "../modular/sidebar.php"; ?>
        
        <main class="main-content">
            <?php require_once "../modular/header.php"; ?>

            <div class="khs-container">
                <div class="khs-card">
                    <h1 style="font-weight: 900; margin-bottom: 10px; letter-spacing: -1px;">TRANSKRIP NILAI SEMENTARA</h1>
                    <p style="color: #64748b; margin-bottom: 40px;">Mahasiswa Aktif: <strong style="color: #1e293b;"><?= htmlspecialchars(strtoupper($main_nama)) ?></strong></p>
                        

                    <div class="summary-grid">
                        <div class="summary-item">
                            <span class="summary-label">IPK Kumulatif</span>
                            <span class="summary-value"><?= number_format($ipk, 2) ?></span>
                        </div>
                        <div class="summary-item" style="border-left-color: #059669;">
                            <span class="summary-label">SKS Ditempuh</span>
                            <span class="summary-value"><?= $total_sks ?> SKS</span>
                        </div>
                        <div class="summary-item" style="border-left-color: #d97706;">
                            <span class="summary-label">Status Akademik</span>
                            <span class="summary-value">AKTIF</span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Nilai</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($khs as $item): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['kode']) ?></td>
                                    <td><?= htmlspecialchars($item['matkul']) ?></td>
                                    <td style="color: #64748b;"><?= (int)$item['sks'] ?></td>
                                    <td>
                                        <span class="badge-nilai <?= (in_array($item['nilai_huruf'], ['A', 'AB', 'B+'])) ? 'nilai-a' : 'nilai-b' ?>">
                                            <?= htmlspecialchars($item['nilai_huruf']) ?>
                                        </span>
                                    </td>
                                    <td><?= number_format($item['bobot'], 1) ?></td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div style="margin: 40px;">
                    <a href="main.php" style="text-decoration: none; color: #64748b; font-weight: 600; font-size: 14px;">
                        &larr; Kembali ke Dashboard
                    </a>
                </div>
        </main>
    </div>
</body>
</html>s