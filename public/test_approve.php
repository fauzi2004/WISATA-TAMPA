<?php
$db = new mysqli('localhost', 'root', '', 'db_wisata_tampa'); 
$res = $db->query("UPDATE testimoni SET status='disetujui' WHERE id=1");
if ($res) {
    echo "Success!";
} else {
    echo "Error: " . $db->error;
}
