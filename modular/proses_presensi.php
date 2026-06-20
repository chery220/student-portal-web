<?php
require_once "../modular/config.php";
require_once "../modular/opendb.php";


if (!isset($_SESSION['user']['nrp'])) {
    die("Anda belum login. Silakan login terlebih dahulu.");
}

$nrp = $_SESSION['user']['nrp']; 


$sql = "SELECT j.* FROM jadwal_kuliah j
        JOIN peserta_kelas p ON j.id_jadwal = p.id_jadwal
        WHERE p.nrp = :nrp";
$stmt = $conn->prepare($sql);
$stmt->execute(['nrp' => $nrp]);
$jadwal = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql_riwayat = "SELECT p.*, j.nama_matkul 
                FROM presensi_kuliah p
                JOIN jadwal_kuliah j ON p.id_jadwal = j.id_jadwal
                WHERE p.nrp = :nrp 
                ORDER BY p.waktu_hadir DESC";
$stmt_riwayat = $conn->prepare($sql_riwayat);
$stmt_riwayat->execute(['nrp' => $nrp]);
$riwayat = $stmt_riwayat->fetchAll(PDO::FETCH_ASSOC);


$grup_tanggal = [];
foreach ($riwayat as $r) {
    $tanggal = date('d M Y', strtotime($r['waktu_hadir']));
    $grup_tanggal[$tanggal][] = $r;
}
?>