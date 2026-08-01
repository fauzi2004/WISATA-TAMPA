<?php
$mysqli = new mysqli("localhost", "root", "", "db_wisata_tampa");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$profiles = [
    [
        'tipe' => 'tentang',
        'judul' => 'Pesona Alam Desa Tampa',
        'konten' => 'Desa Tampa adalah permata tersembunyi yang menawarkan keindahan alam yang masih asri dan belum tersentuh. Dikelilingi oleh perbukitan hijau, sungai jernih, dan udara yang segar, Desa Tampa menjadi destinasi wisata yang sempurna untuk melepas penat dari hiruk-pikuk perkotaan. Kami bangga melestarikan alam dan budaya lokal.'
    ],
    [
        'tipe' => 'visi',
        'judul' => 'Visi Desa Tampa',
        'konten' => 'Menjadi desa ekowisata terkemuka yang berkelanjutan, mandiri, dan mampu memberikan kesejahteraan bagi masyarakat lokal tanpa merusak kelestarian alam dan nilai-nilai budaya luhur warisan leluhur.'
    ],
    [
        'tipe' => 'misi',
        'judul' => 'Misi Desa Tampa',
        'konten' => '<ol><li>Menjaga kelestarian lingkungan dan ekosistem desa.</li><li>Memberdayakan ekonomi masyarakat sekitar melalui pariwisata.</li><li>Menyediakan fasilitas wisata alam yang aman, nyaman, dan edukatif bagi semua pengunjung.</li></ol>'
    ],
    [
        'tipe' => 'sejarah',
        'judul' => 'Sejarah Desa Tampa',
        'konten' => 'Desa Tampa memiliki sejarah panjang sejak masa lampau, dikenal sebagai jalur perlintasan para pedagang tradisional yang menyusuri sungai. Seiring berjalannya waktu, potensi alamnya yang menakjubkan mulai disadari dan dikembangkan secara swadaya oleh masyarakat menjadi area wisata edukasi dan rekreasi keluarga yang damai.'
    ]
];

foreach ($profiles as $p) {
    $stmt = $mysqli->prepare("SELECT id FROM profile_desa WHERE tipe = ?");
    $stmt->bind_param("s", $p['tipe']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $stmt_insert = $mysqli->prepare("INSERT INTO profile_desa (tipe, judul, konten) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $p['tipe'], $p['judul'], $p['konten']);
        $stmt_insert->execute();
        echo "Inserted " . $p['tipe'] . "\n";
    } else {
        $stmt_update = $mysqli->prepare("UPDATE profile_desa SET judul = ?, konten = ? WHERE tipe = ?");
        $stmt_update->bind_param("sss", $p['judul'], $p['konten'], $p['tipe']);
        $stmt_update->execute();
        echo "Updated " . $p['tipe'] . "\n";
    }
}
echo "Done.";
