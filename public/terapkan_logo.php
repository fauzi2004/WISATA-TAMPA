<?php
$source = 'C:/Users/ASUS/.gemini/antigravity-ide/brain/ff75cbf9-e579-4fd6-8121-b019f72cd004/logo_wisata_tampa_v3_1784722360317.png';
$destination = '../assets/images/logo.png';

if (file_exists($source)) {
    if (copy($source, $destination)) {
        echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "<h1 style='color: #10b981;'>Logo Berhasil Dipasang! 🎉</h1>";
        echo "<p>Logo baru versi 3 dengan tulisan sudah otomatis tersimpan ke website Anda.</p>";
        echo "<img src='../assets/images/logo.png?v=".time()."' style='max-width: 200px; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);'>";
        echo "<br><br>";
        echo "<a href='admin/pengaturan/tampilan_web' style='padding: 10px 20px; background: #10b981; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;'>Kembali ke Pengaturan</a>";
        echo "</div>";
        
        // Hapus file script ini sendiri setelah berhasil
        unlink(__FILE__);
    } else {
        echo "Gagal memindahkan file. Pastikan folder assets/images memiliki izin tulis.";
    }
} else {
    echo "File logo sumber tidak ditemukan.";
}
?>
