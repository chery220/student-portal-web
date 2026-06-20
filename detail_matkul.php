<?php
require_once '../modular/proses_matkul.php'; 

$status = isset($_GET['status']) ? $_GET['status'] : '1';
$id_matkul = isset($_GET['id']) ? (int)$_GET['id'] : '';
$matkul_terpilih = $daftar_all_matkul[$id_matkul];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Tugas - PENS</title>
    <link rel="stylesheet" href="../aset/base_layout.css">
    <link rel="stylesheet" href="../aset/detail_matkul.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-wrapper">
        <?php require_once "../modular/sidebar.php"; ?>

        <main class="main-content">
            <?php require_once "../modular/header.php"; ?>

            <div class="content" style="padding: 40px;">
                <a href="tugas_mhs.php" class="btn-back">&larr; Kembali ke Daftar Mata Kuliah</a>

                <div class="detail-card">
                    <div class="detail-header-row">
                        <div>
                            <span class="detail-label">Mata Kuliah</span>
                            <h2 class="detail-title"><?= htmlspecialchars($matkul_terpilih['nama']) ?></h2>
                            <p class="detail-sub">Dosen Pengampu: <strong><?= htmlspecialchars($matkul_terpilih['dosen']) ?></strong></p>
                        </div>
                        <div>
                            <span class="badge-deadline">⏱️ Batas Pengumpulan: 17 Juni 2026, 23:59 WIB</span>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <div style="margin-bottom: 30px;">
                        <h4 class="section-heading">📋 Deskripsi Penugasan:</h4>
                        <div class="task-description-box">
                            <?= htmlspecialchars($matkul_terpilih['tugas']) ?>
                            <br><br>
                            <span class="task-note">* Catatan: Format file pengumpulan bebas dibawah 2 MB</span>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <?php if (isset($_SESSION['tugas_uploaded'][$id_matkul])): ?>
                        <div style="margin-bottom: 30px;">
                            <h4 class="panel-heading">📄 Berkas yang Telah Dikumpulkan</h4>
                            <div class="uploaded-file-container">
                                <div class="file-info-left">
                                    <span class="file-icon-large">💾</span>
                                    <div>
                                        <div class="file-name-text"><?= htmlspecialchars($_SESSION['tugas_uploaded'][$id_matkul]['nama_file']) ?></div>
                                        <div class="file-date-sub">Diunggah pada: <?= $_SESSION['tugas_uploaded'][$id_matkul]['waktu_upload'] ?></div>
                                        <div class="file-date-sub" style="font-size: 12px; color: #6b7280;"></div>
                                    </div>
                                </div>
                                <a href="../uploads/<?= htmlspecialchars($_SESSION['tugas_uploaded'][$id_matkul]['nama_file']) ?>" class="btn-view-file" target="_blank">
                                    👁️ Lihat Berkas
                                </a>
                            </div>
                        </div>
                        <div class="section-divider"></div>
                    <?php endif; ?>

                    <div>
                        <h4 class="panel-heading">📤 Pengumpulan Tugas (Submission)</h4>
                        
                        <?php if ($status === 'sukses'): ?>
                            <div class="alert-msg alert-success">
                                <strong>Berhasil!</strong> Berkas tugas Anda telah sukses diunggah ke server akademik PENS.
                            </div>
                        <?php elseif ($status === 'error'): ?>
                            <div class="alert-msg alert-error">
                                <strong>Error!</strong> Terjadi kendala saat menyimpan ke database. Mohon hubungi admin.
                            </div>
                        <?php elseif ($status === 'error_upload'): ?>
                            <div class="alert-msg alert-error">
                                <strong>Gagal!</strong> Berkas gagal dipindahkan ke folder server. Periksa hak akses folder.
                            </div>
                        <?php elseif ($status === 'error_invalid'): ?>
                            <div class="alert-msg alert-error">
                                <strong>Invalid!</strong> Berkas tidak valid atau format tidak didukung.
                            </div>
                        <?php endif; ?>


                        <form action="../modular/proses_matkul.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_matkul" value="<?= htmlspecialchars($id_matkul) ?>">
                            <div class="form-group">
                                <label class="form-label">
                                    <?= isset($_SESSION['tugas_uploaded'][$id_matkul]) ? 'Re-upload / Ubah Berkas Tugas' : 'Pilih Berkas Tugas'; ?>
                                </label>
                                <input type="file" name="file_tugas" class="hidden-file-input" id="real-file-input" required>
                                
                                <div class="upload-zone" onclick="document.getElementById('real-file-input').click()">
                                    <span class="upload-icon">📁</span>
                                    <span id="upload-text" class="upload-prompt">Klik di sini untuk menelusuri atau mengganti berkas penugasan</span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-submit">
                                    <?= isset($_SESSION['tugas_uploaded'][$id_matkul]) ? 'Perbarui Tugas' : 'Kumpulkan Tugas Sekarang'; ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../aset/script.js"></script>
</body>
</html>