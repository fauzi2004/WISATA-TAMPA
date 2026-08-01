CREATE TABLE `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `no_telp` VARCHAR(20) DEFAULT NULL,
  `alamat` TEXT DEFAULT NULL,
  `role` ENUM('admin','pengelola','wisatawan') DEFAULT 'wisatawan',
  `id_wisata` INT(11) UNSIGNED DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `bank_nama` VARCHAR(50) DEFAULT NULL,
  `bank_rekening` VARCHAR(50) DEFAULT NULL,
  `bank_atas_nama` VARCHAR(100) DEFAULT NULL,
  `ewallet_nama` VARCHAR(50) DEFAULT NULL,
  `ewallet_nomor` VARCHAR(50) DEFAULT NULL,
  `reset_token` VARCHAR(255) DEFAULT NULL,
  `reset_expires_at` DATETIME DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `kategori_wisata` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `objek_wisata` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_kategori` INT(11) UNSIGNED NOT NULL,
  `id_pengelola` INT(11) UNSIGNED NOT NULL,
  `nama_wisata` VARCHAR(150) NOT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `kontak_wa` VARCHAR(20) DEFAULT NULL,
  `kontak_email` VARCHAR(100) DEFAULT NULL,
  `lokasi` TEXT DEFAULT NULL,
  `harga_tiket` INT(11) DEFAULT 0,
  `jam_buka` TIME DEFAULT NULL,
  `jam_tutup` TIME DEFAULT NULL,
  `gambar` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('aktif','nonaktif') DEFAULT 'aktif',
  `bank_nama` VARCHAR(50) DEFAULT NULL,
  `bank_rekening` VARCHAR(50) DEFAULT NULL,
  `bank_atas_nama` VARCHAR(100) DEFAULT NULL,
  `ewallet_nama` VARCHAR(50) DEFAULT NULL,
  `ewallet_nomor` VARCHAR(50) DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `testimoni` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) UNSIGNED NOT NULL,
  `id_wisata` INT(11) UNSIGNED NOT NULL,
  `rating` INT(1) DEFAULT 5,
  `komentar` TEXT DEFAULT NULL,
  `status` ENUM('pending','approved','rejected') DEFAULT 'pending',
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `profile_desa` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipe` VARCHAR(50) NOT NULL,
  `judul` VARCHAR(150) NOT NULL,
  `konten` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `pemesanan` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_booking` VARCHAR(50) NOT NULL,
  `id_user` INT(11) UNSIGNED NOT NULL,
  `id_wisata` INT(11) UNSIGNED NOT NULL,
  `tanggal_kunjungan` DATE NOT NULL,
  `jumlah_tiket` INT(11) NOT NULL,
  `total_harga` INT(11) NOT NULL,
  `status_pembayaran` ENUM('pending','lunas','batal') DEFAULT 'pending',
  `status_tiket` ENUM('aktif','digunakan','batal') DEFAULT 'aktif',
  `catatan` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `pembayaran` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pemesanan` INT(11) UNSIGNED NOT NULL,
  `jumlah_bayar` INT(11) NOT NULL,
  `metode_bayar` VARCHAR(50) DEFAULT NULL,
  `bukti_bayar` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('pending','verified','rejected') DEFAULT 'pending',
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `notifikasi` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) UNSIGNED NOT NULL,
  `judul` VARCHAR(150) NOT NULL,
  `pesan` TEXT NOT NULL,
  `tipe` VARCHAR(50) DEFAULT NULL,
  `link` VARCHAR(255) DEFAULT NULL,
  `is_read` TINYINT(1) DEFAULT 0,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `kontak_pengelola` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alamat` TEXT DEFAULT NULL,
  `no_telepon` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `maps_url` TEXT DEFAULT NULL,
  `facebook` VARCHAR(255) DEFAULT NULL,
  `instagram` VARCHAR(255) DEFAULT NULL,
  `youtube` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `galeri_wisata` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_wisata` INT(11) UNSIGNED NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `keterangan` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `fasilitas` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_wisata` INT(11) UNSIGNED NOT NULL,
  `nama_fasilitas` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `ikon` VARCHAR(50) DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);
