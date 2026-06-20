<?php
session_start();

require_once '../modular/config.php';
require_once '../modular/opendb.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php?pesan=belum_login");
    exit();
}

$main_nama = is_array($_SESSION['user']) ? $_SESSION['user']['nama'] : $_SESSION['user'];


$khs = [
    ['kode' => 'PW123', 'matkul' => 'Pemrograman Web', 'sks' => 3, 'nilai_huruf' => 'A', 'bobot' => 4.0],
    ['kode' => 'BD456', 'matkul' => 'Basis Data', 'sks' => 4, 'nilai_huruf' => 'AB', 'bobot' => 3.5],
    ['kode' => 'UI789', 'matkul' => 'Desain Antarmuka', 'sks' => 2, 'nilai_huruf' => 'A', 'bobot' => 4.0],
    ['kode' => 'SO101', 'matkul' => 'Sistem Operasi', 'sks' => 3, 'nilai_huruf' => 'B', 'bobot' => 3.0],
];

// Logika hitung IPK sederhana
$total_sks = 0;
$total_bobot = 0;
foreach ($khs as $item) {
    $total_sks += $item['sks'];
    $total_bobot += ($item['sks'] * $item['bobot']);
}
$ipk = ($total_sks > 0) ? round($total_bobot / $total_sks, 2) : 0.00;
?>