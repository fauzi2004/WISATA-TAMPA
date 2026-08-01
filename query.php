<?php
$db = new PDO('mysql:host=localhost;dbname=db_wisata_tampa', 'root', '');
$sql = "UPDATE `users` SET `nama` = 'Wisatawan' WHERE `nama` = 'Pengunjung'";

try {
    $db->exec($sql);
    echo "Update berhasil.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
