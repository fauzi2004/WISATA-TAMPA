<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <!-- Header -->
    <section class="bg-cover bg-center bg-fixed pt-40 pb-28 relative overflow-hidden" style="background-image: url('<?= base_url('assets/images/river_gazebo.png') ?>');">
        <!-- Cinematic Overlay -->
        <div class="absolute inset-0 bg-gray-900/70 backdrop-blur-sm"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-50 via-transparent to-transparent"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/20 rounded-full mix-blend-screen filter blur-[100px] pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10" data-aos="zoom-in" data-aos-duration="1000">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-xl border border-white/20 text-emerald-300 px-6 py-2.5 rounded-full font-bold tracking-widest uppercase mb-6 shadow-lg shadow-emerald-500/10 text-sm">
                    <span class="relative flex h-2 w-2 mr-1">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    Riwayat Transaksi
                </span>
                <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-2xl">Pesanan Saya</h1>
                <p class="text-gray-300 text-xl max-w-2xl mx-auto font-medium leading-relaxed">Pantau status dan daftar riwayat pemesanan tiket wisata Anda</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-20 -mt-16 relative z-20 min-h-[70vh] overflow-hidden">
        <!-- Premium Decorative Backgrounds -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-emerald-50/50 to-white/80 z-0 pointer-events-none"></div>
        <div class="absolute top-40 -right-40 w-[600px] h-[600px] bg-gradient-to-br from-emerald-200/40 to-teal-300/20 rounded-full blur-[100px] z-0 pointer-events-none animate-[pulse_6s_ease-in-out_infinite]"></div>
        <div class="absolute bottom-20 -left-40 w-[500px] h-[500px] bg-gradient-to-tr from-cyan-200/30 to-emerald-300/20 rounded-full blur-[100px] z-0 pointer-events-none animate-[pulse_8s_ease-in-out_infinite_delay-2s]"></div>
        
        <div class="container mx-auto px-4 max-w-4xl relative z-10">
            
            <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl mb-8 shadow-sm" data-aos="fade-down">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-emerald-500 text-xl"></i>
                    <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
            <?php endif; ?>

            <?php if (count($pesanan_list) > 0): ?>
            <div class="space-y-8">
                <?php $delay = 0; foreach ($pesanan_list as $pesanan): ?>
                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="bg-white/80 backdrop-blur-3xl rounded-[2.5rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.05)] p-6 md:p-8 hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.2)] transform hover:-translate-y-1 transition-all duration-500 border border-white relative group overflow-hidden">
                    
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative z-10">
                        <div class="flex items-start space-x-6 w-full md:w-auto">
                            <div class="relative overflow-hidden rounded-[1.5rem] border-4 border-white shadow-lg">
                                <img src="<?= base_url('uploads/wisata/' . $pesanan['gambar']) ?>" 
                                     alt="<?= $pesanan['nama_wisata'] ?>" 
                                     class="w-28 h-28 md:w-32 md:h-32 object-cover transform group-hover:scale-110 transition-transform duration-700"
                                    onerror="this.src='<?= base_url('assets/images/default-wisata.svg') ?>'">
                            </div>
                            <div class="flex-1 py-1">
                                <h3 class="text-2xl font-black text-gray-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-emerald-600 group-hover:to-teal-500 transition-all duration-300"><?= $pesanan['nama_wisata'] ?></h3>
                                <p class="text-gray-500 text-sm mb-4 flex items-center font-medium">
                                    <span class="w-6 h-6 rounded-full bg-red-50 flex items-center justify-center mr-2"><i class="fas fa-map-marker-alt text-red-500 text-xs"></i></span><?= $pesanan['lokasi'] ?>
                                </p>
                                
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-8 text-sm font-medium">
                                    <div class="flex items-center text-gray-600 bg-gray-50/80 px-3 py-1.5 rounded-xl border border-gray-100">
                                        <i class="fas fa-hashtag w-5 text-emerald-500 mr-1"></i>
                                        <span>Kode: <span class="font-black text-emerald-600 ml-1"><?= $pesanan['kode_booking'] ?></span></span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="far fa-calendar-alt w-5 text-teal-500"></i>
                                        <span><span class="font-bold"><?= date('d M Y', strtotime($pesanan['tanggal_kunjungan'])) ?></span></span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-users w-5 text-blue-500"></i>
                                        <span><?= $pesanan['jumlah_tiket'] ?> tiket</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-left md:text-right w-full md:w-auto border-t md:border-t-0 pt-5 md:pt-0 border-gray-100 flex flex-row md:flex-col justify-between items-center md:items-end z-10 relative">
                            <div>
                                <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest mb-1 md:hidden">Total Harga</p>
                                <p class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500 mb-3">Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></p>
                            </div>
                            
                            <div class="flex flex-col items-end gap-3.5">
                                <?php 
                                    $status_config = [
                                        'belum_bayar' => ['class' => 'bg-amber-100/80 text-amber-700 border-amber-200/50 shadow-sm shadow-amber-500/10', 'icon' => 'fa-clock', 'label' => 'Belum Bayar'],
                                        'menunggu_konfirmasi' => ['class' => 'bg-blue-100/80 text-blue-700 border-blue-200/50 shadow-sm shadow-blue-500/10', 'icon' => 'fa-spinner fa-spin', 'label' => 'Menunggu Konfirmasi'],
                                        'lunas' => ['class' => 'bg-emerald-100/80 text-emerald-700 border-emerald-200/50 shadow-sm shadow-emerald-500/10', 'icon' => 'fa-check-circle', 'label' => 'Lunas'],
                                        'ditolak' => ['class' => 'bg-red-100/80 text-red-700 border-red-200/50 shadow-sm shadow-red-500/10', 'icon' => 'fa-times-circle', 'label' => 'Ditolak']
                                    ];
                                    $cfg = $status_config[$pesanan['status_pembayaran']];
                                ?>
                                <span class="px-4 py-2 rounded-xl text-xs font-black border flex items-center gap-2 <?= $cfg['class'] ?> backdrop-blur-sm">
                                    <i class="fas <?= $cfg['icon'] ?>"></i> <?= $cfg['label'] ?>
                                </span>
                                <a href="<?= base_url('pesanan/detail/' . $pesanan['id']) ?>" 
                                   class="inline-flex items-center bg-gradient-to-r from-gray-900 to-gray-800 hover:from-emerald-600 hover:to-teal-600 text-white px-7 py-3 rounded-2xl text-sm font-black shadow-[0_10px_20px_rgba(0,0,0,0.15)] hover:shadow-[0_15px_30px_rgba(16,185,129,0.3)] transform hover:-translate-y-1 transition-all duration-300">
                                    Detail <i class="fas fa-arrow-right ml-2 bg-white/20 p-1.5 rounded-full text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $delay += 100; endforeach; ?>
            </div>
            <?php else: ?>
            <div class="bg-white rounded-3xl shadow-lg p-16 text-center" data-aos="fade-up">
                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-ticket-alt text-4xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-extrabold text-gray-800 mb-3">Belum Ada Pesanan</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto leading-relaxed">Anda belum memiliki riwayat pemesanan tiket. Ayo mulai petualangan Anda di Desa Tampa!</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="<?= base_url('wisata') ?>" class="btn-premium bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-8 py-3.5 rounded-xl hover:from-emerald-500 hover:to-teal-400 font-bold shadow-[0_10px_20px_rgba(16,185,129,0.2)]">
                        <i class="fas fa-map-marked-alt mr-2"></i>Lihat Destinasi
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

<?= $this->endSection() ?>
