<?php
$conn = new mysqli("localhost", "root", "", "db_wisata_tampa");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = "Admin Utama";
$email = "admin@gmail.com";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$role = "admin";
$created = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO users (nama, email, password, role, created_at) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $email, $password, $role, $created);

if ($stmt->execute()) {
    echo "Admin created successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
