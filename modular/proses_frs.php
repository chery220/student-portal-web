<?php
session_start();

require_once '../modular/config.php';
require_once '../modular/opendb.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php?pesan=belum_login");
    exit();
}

$main_nama = is_array($_SESSION['user']) ? $_SESSION['user']['nama'] : $_SESSION['user'];
$main_nrp  = is_array($_SESSION['user']) ? $_SESSION['user']['nrp'] : (isset($_SESSION['nrp']) ? $_SESSION['nrp'] : '21101910xx');


$jadwal = [
    [
        'kode'   => 'PW-01', 
        'matkul' => 'Praktikum Pemrograman Web', 
        'sks'    => 3, 
        'hari'   => 'Selasa', 
        'jam'    => '08:50 - 10:30', 
        'ruang'  => 'Lab D4-PENS'
    ],
    [
        'kode'   => 'BD-02', 
        'matkul' => 'Praktikum Basis Data', 
        'sks'    => 4, 
        'hari'   => 'Senin', 
        'jam'    => '10:40 - 13:10', 
        'ruang'  => 'Ruang kelas D4-PENS'
    ],
    [
        'kode'   => 'SO-04', 
        'matkul' => 'Sistem Operasi', 
        'sks'    => 3, 
        'hari'   => 'Selasa', 
        'jam'    => '13:20 - 15:50', 
        'ruang'  => 'Lab D4-PENS'
    ]
];
?>