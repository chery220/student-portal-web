<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../modular/config.php'; 
require_once '../modular/opendb.php'; 

// Proteksi Halaman
if (!isset($_SESSION['user'])) {
    header("Location: ../../index.php?pesan=belum_login");
    exit();
}

$current_page = 'tugas';

// Data mata kuliah
$mata_kuliah = [
    [
        'id' => 1,
        'nama_matkul' => 'Praktikum Pemrograman Web',
        'dosen' => 'Bpk. Grezio',
        'hari' => 'Selasa',
        'jam' => '08:50 - 10:30',
        'ruang' => 'Lab D4-PENS',
        'icon' => '🌐'
    ],
    [
        'id' => 2,
        'nama_kuliah' => 'Praktikum Basis Data',
        'nama_matkul' => 'Praktikum Basis Data',
        'dosen' => 'Ibu Tessy',
        'hari' => 'Senin',
        'jam' => '10:40 - 13:10',
        'ruang' => 'Ruang kelas D4-PENS',
        'icon' => '🗄️'
    ],
    [
        'id' => 3,
        'nama_matkul' => 'Sistem Operasi',
        'dosen' => 'Prof Iwan',
        'hari' => 'Selasa',
        'jam' => '13:20 - 15:50',
        'ruang' => 'Lab D4-PENS',
        'icon' => '🖥️'
    ]
];
?>