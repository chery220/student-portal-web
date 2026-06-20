<?php
session_start();
require_once "../modular/config.php"; 
require_once "../modular/opendb.php"; 


if (!isset($_SESSION['user'])) {
    header("Location: ../../index.php?pesan=belum_login");
    exit();
}

$id_matkul = isset($_POST['id_matkul']) ? (int)$_POST['id_matkul'] : 1;

$daftar_all_matkul = [
    1 => ['nama' => 'Praktikum Pemrograman Web', 'dosen' => 'Bpk. Grezio', 'tugas' => 'Proyek TA: Membuat Aplikasi Web Dinamis dengan PHP & MySQL'],
    2 => ['nama' => 'Praktikum Basis Data', 'dosen' => 'Ibu Tessy', 'tugas' => 'Database Design Table 1'],
    3 => ['nama' => 'Praktikum Sistem Operasi', 'dosen' => 'Prof Iwan', 'tugas' => 'CPU Scheduling Simulation']
];

$matkul_terpilih = isset($daftar_all_matkul[$id_matkul]) ? $daftar_all_matkul[$id_matkul] : $daftar_all_matkul[1];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file_tugas'])) {
    $raw_file_name = $_FILES['file_tugas']['name'];
    $file_tmp      = $_FILES['file_tugas']['tmp_name'];
    $file_size     = $_FILES['file_tugas']['size'];
    $file_type     = $_FILES['file_tugas']['type'];
    
    if ($_FILES['file_tugas']['error'] === 0) {
        $clean_file_name = str_replace(' ', '_', $raw_file_name);
        $target_dir = "../uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        
        $path_lengkap = $target_dir . $clean_file_name;

        
        if (move_uploaded_file($file_tmp, $path_lengkap)) {
            try {
                $sql = "INSERT INTO upload (name, size, type, content, path) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([$clean_file_name, (string)$file_size, $file_type, $matkul_terpilih['tugas'], $path_lengkap]);

                if ($result) {
                    $_SESSION['tugas_uploaded'][$id_matkul] = [
                        'nama_file' => $clean_file_name,
                        'waktu_upload' => date('d M Y, H:i') . ' WIB'
                    ];
                    header("Location: ../utama/detail_matkul.php?id=$id_matkul&status=sukses");
                    exit(); 
                }
            } catch (PDOException $e) {
                error_log("Database Error: " . $e->getMessage());
                header("Location: ../utama/detail_matkul.php?id=$id_matkul&status=error");
                exit();
            }
        } else {
            // Gagal pindah file
            header("Location: ../utama/detail_matkul.php?id=$id_matkul&status=error_upload");
            exit();
        }
    } else {
        // Error file (misal: file corrupt)
        header("Location: ../utama/detail_matkul.php?id=$id_matkul&status=error_invalid");
        exit();
    }
}
?>