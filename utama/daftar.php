<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Mahasiswa - PENS APPS</title>
    <link rel="stylesheet" href="../aset/auth_forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-container"> 
    <div class="login-box" style="max-width: 500px; width: 100%;"> 
        <h2>Form Pendaftaran</h2>
        
        <form action="../modular/proses_daftar.php" method="post">
            <input type="text" placeholder="Nama Lengkap" name="nama" required>
            <input type="text" placeholder="NRP" name="nrp" required>
            <textarea name="alamat" placeholder="Alamat Tinggal" rows="3" required></textarea>
            <input type="text" placeholder="Tempat, Tanggal Lahir (Contoh: Surabaya, 12-10-2000)" name="ttl" required>
            <input type="email" placeholder="Email Aktif" name="email" required>
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            
            <button type="submit">Daftar Sekarang</button>
        </form>

        <div class="register-link">
            <p style="background: none; border: none; color: #606770; margin-top: 15px;">
                Sudah punya akun? <a href="../index.php" style="color: #091c33; text-decoration: none; font-weight: bold;">Login di sini</a>
            </p>
        </div>
    </div>
</div>

<script src="../aset/script.js"></script>
</body>
</html>
