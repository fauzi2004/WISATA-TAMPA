<?php
$db = new mysqli('localhost', 'root', '', 'db_wisata_tampa'); 
$db->query("UPDATE testimoni SET status='approved' WHERE id=1");
$db->query("UPDATE testimoni SET status='pending' WHERE status=''");
echo "DB Fixed";
