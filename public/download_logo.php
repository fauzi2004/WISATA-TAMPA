<?php
$file = 'C:/Users/ASUS/.gemini/antigravity-ide/brain/ff75cbf9-e579-4fd6-8121-b019f72cd004/logo_wisata_tampa_v4_1784722578141.png';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="Logo_Wisata_Tampa_Terbaru.png"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
} else {
    echo "<h1>Maaf, file logo tidak ditemukan.</h1>";
}
?>
