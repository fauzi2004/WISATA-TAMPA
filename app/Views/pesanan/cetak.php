<?php
$is_lunas = $pesanan["status_pembayaran"] == "lunas";
$judul = $is_lunas ? "E-TIKET WISATA" : "BUKTI PEMESANAN";
$status_text = "";
if ($pesanan["status_pembayaran"] == "menunggu_konfirmasi") $status_text = "Menunggu Konfirmasi";
elseif ($pesanan["status_pembayaran"] == "belum_bayar") $status_text = "Belum Dibayar";
elseif ($pesanan["status_pembayaran"] == "ditolak") $status_text = "Pembayaran Ditolak";
else $status_text = "Lunas";

$bg_header = $is_lunas ? "bg-gradient-to-br from-emerald-500 to-teal-600" : ($pesanan["status_pembayaran"] == "menunggu_konfirmasi" ? "bg-gradient-to-br from-blue-500 to-indigo-600" : "bg-gradient-to-br from-amber-500 to-orange-500");
$icon = $is_lunas ? "fa-check-circle" : ($pesanan["status_pembayaran"] == "menunggu_konfirmasi" ? "fa-clock" : "fa-exclamation-triangle");
$shadow_color = $is_lunas ? "shadow-emerald-500/40" : ($pesanan["status_pembayaran"] == "menunggu_konfirmasi" ? "shadow-blue-500/40" : "shadow-amber-500/40");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $judul ?> - <?= $pesanan["kode_booking"] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @media print {
            @page { margin: 0.5cm; }
            body { background: white !important; padding: 0 !important; margin: 0 !important; min-height: auto !important; }
            .no-print { display: none !important; }
            .shadow-lg { box-shadow: none !important; border: 1px solid #e5e7eb; }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col justify-center items-center py-12 px-4 bg-cover bg-center bg-fixed relative" style="background-image: url('<?= base_url('assets/images/river_gazebo.png') ?>');">
    <!-- Overlay for screen view -->
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-md -z-10 no-print"></div>

    <div class="max-w-2xl w-full mx-auto relative z-10">
        <div class="bg-white rounded-[2rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] border border-gray-100 overflow-hidden relative" id="ticketCard">
            
            <div class="<?= $bg_header ?> text-white p-6 md:p-10 text-center relative overflow-hidden">
                <!-- Motif Premium -->
                <div class="absolute top-0 right-0 w-48 h-48 bg-white/20 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-black/20 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>
                
                <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-[1.2rem] flex items-center justify-center mx-auto mb-4 <?= $shadow_color ?> shadow-lg transform rotate-3 border border-white/30 relative z-10">
                    <i class="fas <?= $icon ?> text-4xl text-white"></i>
                </div>
                <h2 class="text-4xl font-black tracking-tight relative z-10 drop-shadow-md"><?= $judul ?></h2>
                <p class="text-white/90 font-bold text-sm mt-2 uppercase tracking-[0.2em] relative z-10"><?= $pesanan["nama_wisata"] ?></p>
                <?php if (!$is_lunas): ?>
                    <span class="inline-block mt-4 px-4 py-1.5 bg-white/20 backdrop-blur-md border border-white/50 text-white rounded-full text-xs font-black shadow-lg relative z-10 uppercase tracking-widest">Status: <?= $status_text ?></span>
                <?php endif; ?>
            </div>
            
            <!-- Cutout Effect -->
            <div class="relative bg-white h-8 -mt-4 w-full flex justify-between items-center px-0 overflow-hidden z-20">
                <div class="w-8 h-8 bg-gray-900/60 rounded-full -ml-4 shadow-inner no-print"></div>
                <div class="w-8 h-8 bg-white rounded-full -ml-4 shadow-inner border border-gray-200 hidden print-circle"></div>
                
                <div class="flex-1 border-t-2 border-dashed border-gray-300 mx-2"></div>
                
                <div class="w-8 h-8 bg-gray-900/60 rounded-full -mr-4 shadow-inner no-print"></div>
                <div class="w-8 h-8 bg-white rounded-full -mr-4 shadow-inner border border-gray-200 hidden print-circle"></div>
            </div>

            <div class="p-6 md:p-10 pt-2">
                <div class="text-center mb-6 md:mb-10">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-1 md:mb-2">Kode Booking Anda</p>
                    <h3 class="text-4xl font-black text-gray-900 tracking-widest font-mono"><?= $pesanan["kode_booking"] ?></h3>
                </div>
                
                <div class="space-y-2 md:space-y-4">
                    <div class="flex justify-between items-center py-1.5 md:py-2 border-b border-dashed border-gray-200">
                        <span class="text-gray-500 font-medium text-sm">Nama Pemesan</span>
                        <span class="font-bold text-gray-900"><?= $pesanan["nama"] ?></span>
                    </div>
                    <div class="flex justify-between items-center py-1.5 md:py-2 border-b border-dashed border-gray-200">
                        <span class="text-gray-500 font-medium text-sm">Objek Wisata</span>
                        <span class="font-bold text-gray-900"><?= $pesanan["nama_wisata"] ?></span>
                    </div>
                    <div class="flex justify-between items-center py-1.5 md:py-2 border-b border-dashed border-gray-200">
                        <span class="text-gray-500 font-medium text-sm">Lokasi</span>
                        <span class="font-bold text-gray-900 text-right"><?= $pesanan["lokasi"] ?></span>
                    </div>
                    <div class="flex justify-between items-center py-1.5 md:py-2 border-b border-dashed border-gray-200">
                        <span class="text-gray-500 font-medium text-sm">Tanggal Kunjungan</span>
                        <span class="font-bold text-gray-900"><?= date('d M Y', strtotime($pesanan["tanggal_kunjungan"])) ?></span>
                    </div>
                    <div class="flex justify-between items-center py-1.5 md:py-2 border-b border-dashed border-gray-200">
                        <span class="text-gray-500 font-medium text-sm">Jam Operasional</span>
                        <span class="font-bold text-gray-900"><?= date("H:i", strtotime($pesanan["jam_buka"])) ?> - <?= date("H:i", strtotime($pesanan["jam_tutup"])) ?></span>
                    </div>
                    <div class="flex justify-between items-center py-1.5 md:py-2 border-b border-dashed border-gray-200">
                        <span class="text-gray-500 font-medium text-sm">Jumlah Tiket</span>
                        <span class="font-bold text-gray-900 bg-gray-100 px-3 py-1 rounded-lg"><?= $pesanan["jumlah_tiket"] ?> Tiket</span>
                    </div>
                </div>
                
                <div class="mt-4 md:mt-6 bg-gray-50 rounded-[1.5rem] p-4 md:p-6 border border-gray-200 flex justify-between items-center shadow-sm">
                    <span class="text-gray-500 font-black text-sm uppercase tracking-[0.2em]">Total Pembayaran</span>
                    <span class="text-3xl font-black text-emerald-600">Rp <?= number_format($pesanan["total_harga"], 0, ',', '.') ?></span>
                </div>
                
                <div class="mt-4 md:mt-6 text-center text-sm bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <?php if ($is_lunas): ?>
                        <p class="font-black text-emerald-600 mb-1 text-base"><i class="fas fa-shield-check mr-2"></i> E-TIKET RESMI</p>
                        <p class="text-gray-500 font-medium">Harap tunjukkan kode booking atau e-tiket ini kepada petugas saat berkunjung ke <?= $pesanan["nama_wisata"] ?>.</p>
                    <?php else: ?>
                        <p class="font-black text-amber-600 mb-1 text-base"><i class="fas fa-exclamation-circle mr-2"></i> BUKTI PEMESANAN SEMENTARA</p>
                        <p class="text-gray-500 font-medium">Simpan dan tunjukkan kepada petugas loket untuk menyelesaikan proses pembayaran tiket Anda.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="bg-gray-900 p-5 text-center">
                <p class="text-[10px] font-bold text-gray-400 tracking-[0.3em] uppercase">Dicetak pada: <?= date("d M Y H:i:s") ?> WITA</p>
            </div>
        </div>
        
        <div class="text-center mt-8 flex flex-col sm:flex-row justify-center gap-4 no-print relative z-10">
            <button onclick="window.print()" class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-black px-10 py-4 rounded-2xl shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 transition-all duration-300 tracking-wide">
                <i class="fas fa-print mr-2"></i> CETAK / SAVE PDF
            </button>
            <button onclick="window.close()" class="bg-white/10 backdrop-blur-md text-white font-bold px-10 py-4 rounded-2xl shadow-lg border border-white/20 hover:bg-white/20 transition-all duration-300 tracking-wide">
                TUTUP JENDELA
            </button>
        </div>
    </div>

    <!-- Style overrides for print -->
    <style>
        @media print {
            .print-circle { display: block !important; }
            body { background: none !important; }
            #ticketCard { box-shadow: none !important; border: 1px solid #ccc !important; }
        }
    </style>
</body>
</html>
