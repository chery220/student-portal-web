function notifDaftar(pesan, tujuan) {
    alert(pesan);
    window.location.href = tujuan;
}

// --- Fitur Jika Gagal Daftar ---
function notifGagal(pesan) {
    alert("Waduh! " + pesan);
    window.history.back();
}

    // --- Fitur Upload File (dr file detail_matkul.php) ---
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('real-file-input');
    const uploadText = document.getElementById('upload-text');

    if (fileInput && uploadText) {
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const fileSize = (file.size / 1024).toFixed(2);
                uploadText.innerHTML = `<strong>Berkas Terpilih:</strong> ${file.name} (${fileSize} KB)`;
                uploadText.style.color = "#000";
            }
        });
    }
    console.log("Script aplikasi PENS APPS dimuat.");
});


// --- Kode Dropdown Notifikasi (dari file header.php) ---
const notifContainer = document.getElementById("notifContainer");

if (notifContainer) {
    notifContainer.addEventListener("click", function (event) {
        event.stopPropagation(); 
        this.classList.toggle("active");
    });

    // Ketika klik di area luar mana saja, otomatis tutup dropdown notifikasi
    document.addEventListener("click", function (event) {
        if (!notifContainer.contains(event.target)) {
            notifContainer.classList.remove("active");
        }
    });
}