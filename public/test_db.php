<?php
$db = new mysqli('localhost', 'root', '', 'db_wisata_tampa'); 
$res = $db->query("SHOW COLUMNS FROM testimoni");
$cols = [];
while ($row = $res->fetch_assoc()) {
    $cols[] = $row;
}
echo json_encode($cols);
