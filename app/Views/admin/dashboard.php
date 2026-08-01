<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<?php
    date_default_timezone_set('Asia/Makassar'); // Atau sesuai zona waktu server
    $hour = date('H');
    if ($hour >= 5 && $hour < 12) {
        $greeting = 'Selamat Pagi';
        $icon = 'sun text-amber-400 animate-spin-slow';
    } elseif ($hour >= 12 && $hour < 15) {
        $greeting = 'Selamat Siang';
        $icon = 'sun text-orange-500 animate-pulse';
    } elseif ($hour >= 15 && $hour < 18) {
        $greeting = 'Selamat Sore';
        $icon = 'cloud-sun text-orange-400';
    } else {
        $greeting = 'Selamat Malam';
        $icon = 'moon text-indigo-300 animate-pulse';
    }
?>

    <!-- Banner Welcome Dinamis -->
    <div class="relative bg-gradient-to-r from-gray-900 via-slate-800 to-emerald-900 rounded-[2.5rem] p-10 mb-12 overflow-hidden shadow-2xl border border-gray-700/50" data-aos="fade-down">
        <!-- Dekorasi Orbs -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-emerald-500/20 rounded-full blur-[80px] animate-pulse"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-teal-500/20 rounded-full blur-[80px] animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute inset-0 bg-[url('<?= base_url('assets/images/pattern.svg') ?>')] opacity-10 mix-blend-overlay"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/10 mb-4 shadow-inner">
                    <i class="fas fa-<?= $icon ?> text-lg drop-shadow-lg"></i>
                    <span class="text-white font-medium tracking-wide text-sm"><?= $greeting ?>, <span class="font-bold text-emerald-300"><?= session()->get('nama') ?></span></span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight leading-tight mb-2 drop-shadow-md">
                    Dashboard <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Ringkasan</span>
                </h1>
                <p class="text-gray-400 font-medium text-lg max-w-2xl">Pantau seluruh aktivitas wisata, pemesanan tiket, dan perkembangan operasional Anda secara real-time di sini.</p>
            </div>
            
            <div class="hidden md:flex items-center gap-4 bg-white/5 p-4 rounded-3xl border border-white/10 backdrop-blur-xl shadow-lg transform hover:scale-105 transition-transform duration-500">
                <div class="text-right">
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-1">Tanggal Hari Ini</p>
                    <p class="text-white font-black text-lg drop-shadow-sm"><?= date('d F Y') ?></p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center text-white text-2xl shadow-[0_0_15px_rgba(52,211,153,0.5)]">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Cards (Premium Glassmorphism) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
        <!-- Card 1: Wisata Utama -->
        <a href="<?= base_url('admin/wisata') ?>" data-aos="fade-up" data-aos-delay="0" class="group relative bg-white/70 backdrop-blur-3xl rounded-[2.5rem] p-8 border border-white shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(16,185,129,0.3)] hover:-translate-y-3 transition-all duration-500 overflow-hidden">
            <div class="absolute -top-16 -right-16 w-40 h-40 bg-gradient-to-br from-emerald-400/20 to-teal-500/10 rounded-full blur-3xl group-hover:scale-[2] transition-transform duration-1000"></div>
            <div class="absolute bottom-0 left-0 w-full h-1.5 bg-gradient-to-r from-emerald-400 to-teal-500 transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500"></div>
            
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 group-hover:rotate-12 group-hover:scale-110 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/30 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                        <i class="fas fa-mountain text-2xl drop-shadow-md"></i>
                    </div>
                    <span class="px-4 py-1.5 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">Total</span>
                </div>
                <div>
                    <h2 class="text-5xl font-black text-gray-900 tracking-tighter mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-emerald-600 group-hover:to-teal-500 transition-all duration-300"><?= $total_wisata ?></h2>
                    <h4 class="text-gray-500 text-sm font-bold uppercase tracking-widest">Wisata Utama</h4>
                </div>
            </div>
            <i class="fas fa-mountain absolute -bottom-8 -right-8 text-9xl text-emerald-500/20 group-hover:scale-110 group-hover:-translate-y-4 transition-all duration-700"></i>
        </a>
        
        <!-- Card 2: Konfirmasi -->
        <a href="<?= base_url('admin/pemesanan') ?>" data-aos="fade-up" data-aos-delay="100" class="group relative bg-white/70 backdrop-blur-3xl rounded-[2.5rem] p-8 border border-white shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(59,130,246,0.3)] hover:-translate-y-3 transition-all duration-500 overflow-hidden">
            <div class="absolute -top-16 -right-16 w-40 h-40 bg-gradient-to-br from-blue-400/20 to-indigo-500/10 rounded-full blur-3xl group-hover:scale-[2] transition-transform duration-1000"></div>
            <div class="absolute bottom-0 left-0 w-full h-1.5 bg-gradient-to-r from-blue-400 to-indigo-500 transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500"></div>
            
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:-rotate-12 group-hover:scale-110 transition-all duration-500 relative overflow-hidden">
                        <?php if($menunggu_konfirmasi > 0): ?>
                            <span class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-rose-500 rounded-full border-[3px] border-white animate-ping"></span>
                            <span class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-rose-500 rounded-full border-[3px] border-white shadow-md"></span>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-white/30 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                        <i class="fas fa-clock text-2xl drop-shadow-md"></i>
                    </div>
                    <span class="px-4 py-1.5 bg-blue-50 text-blue-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-blue-100">Pending</span>
                </div>
                <div>
                    <h2 class="text-5xl font-black text-gray-900 tracking-tighter mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-indigo-500 transition-all duration-300"><?= $menunggu_konfirmasi ?></h2>
                    <h4 class="text-gray-500 text-sm font-bold uppercase tracking-widest">Konfirmasi</h4>
                </div>
            </div>
            <i class="fas fa-clock absolute -bottom-8 -right-8 text-9xl text-blue-500/20 group-hover:scale-110 group-hover:-translate-y-4 transition-all duration-700"></i>
        </a>
        
        <!-- Card 3: Pemesanan -->
        <a href="<?= base_url('admin/pemesanan') ?>" data-aos="fade-up" data-aos-delay="200" class="group relative bg-white/70 backdrop-blur-3xl rounded-[2.5rem] p-8 border border-white shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(245,158,11,0.3)] hover:-translate-y-3 transition-all duration-500 overflow-hidden">
            <div class="absolute -top-16 -right-16 w-40 h-40 bg-gradient-to-br from-amber-400/20 to-orange-500/10 rounded-full blur-3xl group-hover:scale-[2] transition-transform duration-1000"></div>
            <div class="absolute bottom-0 left-0 w-full h-1.5 bg-gradient-to-r from-amber-400 to-orange-500 transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500"></div>
            
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shadow-lg shadow-amber-500/30 group-hover:rotate-45 group-hover:scale-110 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/30 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                        <i class="fas fa-ticket-alt text-2xl drop-shadow-md"></i>
                    </div>
                    <span class="px-4 py-1.5 bg-amber-50 text-amber-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-amber-100">Tiket</span>
                </div>
                <div>
                    <h2 class="text-5xl font-black text-gray-900 tracking-tighter mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-amber-500 group-hover:to-orange-500 transition-all duration-300"><?= $total_pemesanan ?></h2>
                    <h4 class="text-gray-500 text-sm font-bold uppercase tracking-widest">Pemesanan</h4>
                </div>
            </div>
            <i class="fas fa-ticket-alt absolute -bottom-8 -right-8 text-9xl text-amber-500/20 group-hover:scale-110 group-hover:-translate-y-4 transition-all duration-700"></i>
        </a>
        
        <!-- Card 4: Total Pendapatan (Ultra Premium Dark Card) -->
        <?php if (session()->get('role') !== 'admin'): ?>
        <a href="<?= base_url('admin/pemesanan') ?>" data-aos="fade-up" data-aos-delay="300" class="group relative bg-gray-900 rounded-[2.5rem] p-8 shadow-[0_20px_50px_-15px_rgba(0,0,0,0.5)] hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.5)] hover:-translate-y-3 transition-all duration-500 overflow-hidden border border-gray-700/50">
            <!-- Glass/Glossy shine effect -->
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
            <!-- Floating Glowing Orbs -->
            <div class="absolute -top-10 -right-10 w-48 h-48 bg-emerald-500/40 rounded-full blur-[50px] group-hover:scale-150 group-hover:bg-emerald-400/50 transition-all duration-700"></div>
            <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-teal-500/30 rounded-full blur-[50px] group-hover:scale-150 group-hover:bg-teal-400/40 transition-all duration-700"></div>
            
            <div class="relative z-10 flex flex-col h-full justify-between">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-white/10 backdrop-blur-md flex items-center justify-center border border-white/20 shadow-[inset_0_1px_1px_rgba(255,255,255,0.3)] group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                        <i class="fas fa-wallet text-2xl text-emerald-300 drop-shadow-[0_0_10px_rgba(52,211,153,0.8)] relative z-10"></i>
                    </div>
                    <span class="px-4 py-1.5 bg-emerald-500/20 text-emerald-300 rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-500/30 backdrop-blur-sm shadow-[0_0_15px_rgba(16,185,129,0.3)]">IDR</span>
                </div>
                <div>
                    <div class="flex items-end gap-2 mb-1">
                        <span class="text-xl font-black text-gray-400 group-hover:text-emerald-300 transition-colors">Rp</span> 
                        <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tighter leading-none group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-white group-hover:to-emerald-200 transition-all duration-500 drop-shadow-lg" style="word-break: break-word;">
                            <?= number_format($total_pendapatan, 0, ',', '.') ?>
                        </h2>
                    </div>
                    <h4 class="text-gray-400 text-sm font-bold uppercase tracking-widest">Total Pendapatan</h4>
                </div>
            </div>
            <i class="fas fa-chart-pie absolute -bottom-8 -right-8 text-9xl text-emerald-500/30 group-hover:scale-110 group-hover:-translate-y-4 transition-all duration-700"></i>
        </a>
        <?php endif; ?>
    </div>

    <!-- Akses Cepat Premium -->
    <div class="mb-8 mt-12 flex items-center justify-between" data-aos="fade-up">
        <h3 class="text-3xl font-black text-gray-900 tracking-tight flex items-center">
            <i class="fas fa-bolt text-amber-500 mr-3"></i> Akses Cepat
        </h3>
        <div class="h-1.5 flex-1 mx-6 bg-gradient-to-r from-gray-200 to-transparent rounded-full"></div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl">
        <!-- Akses Cepat 1 -->
        <a href="<?= base_url('admin/wisata') ?>" data-aos="fade-up" data-aos-delay="100" class="group relative bg-white rounded-[3rem] p-3 shadow-[0_20px_50px_-10px_rgba(0,0,0,0.08)] hover:shadow-[0_30px_60px_-15px_rgba(16,185,129,0.2)] transition-all duration-500 overflow-hidden flex">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-64 h-full bg-gradient-to-l from-emerald-50/50 to-transparent pointer-events-none group-hover:from-emerald-100/50 transition-colors duration-500"></div>
            
            <div class="flex flex-col sm:flex-row items-center w-full gap-6 p-6">
                <div class="w-28 h-28 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-[2rem] flex items-center justify-center shadow-[0_15px_30px_rgba(16,185,129,0.4)] text-white flex-shrink-0 transform group-hover:scale-105 group-hover:-rotate-6 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    <i class="fas fa-map-marked-alt text-4xl drop-shadow-md"></i>
                </div>
                
                <div class="relative z-10 flex-1 text-center sm:text-left">
                    <h3 class="font-black text-gray-900 text-2xl md:text-3xl mb-3 tracking-tight group-hover:text-emerald-600 transition-colors">Kelola Wisata</h3>
                    <p class="text-base text-gray-500 font-medium leading-relaxed mb-6">Atur gambar, harga tiket, dan informasi objek wisata Anda dengan antarmuka yang sangat mudah digunakan.</p>
                    <div class="inline-flex items-center px-6 py-2.5 rounded-full bg-emerald-50 text-emerald-600 font-bold group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md">
                        Mulai Kelola <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Akses Cepat 2 -->
        <a href="<?= base_url('admin/pemesanan') ?>" data-aos="fade-up" data-aos-delay="200" class="group relative bg-white rounded-[3rem] p-3 shadow-[0_20px_50px_-10px_rgba(0,0,0,0.08)] hover:shadow-[0_30px_60px_-15px_rgba(245,158,11,0.2)] transition-all duration-500 overflow-hidden flex">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-64 h-full bg-gradient-to-l from-amber-50/50 to-transparent pointer-events-none group-hover:from-amber-100/50 transition-colors duration-500"></div>
            
            <div class="flex flex-col sm:flex-row items-center w-full gap-6 p-6">
                <div class="w-28 h-28 bg-gradient-to-br from-amber-400 to-orange-500 rounded-[2rem] flex items-center justify-center shadow-[0_15px_30px_rgba(245,158,11,0.4)] text-white flex-shrink-0 transform group-hover:scale-105 group-hover:rotate-6 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    <i class="fas fa-clipboard-check text-4xl drop-shadow-md"></i>
                </div>
                
                <div class="relative z-10 flex-1 text-center sm:text-left">
                    <h3 class="font-black text-gray-900 text-2xl md:text-3xl mb-3 tracking-tight group-hover:text-amber-600 transition-colors">Cek Pemesanan</h3>
                    <p class="text-base text-gray-500 font-medium leading-relaxed mb-6">Pantau setiap pesanan tiket yang masuk, verifikasi pembayaran, dan berikan pelayanan terbaik untuk pengunjung.</p>
                    <div class="inline-flex items-center px-6 py-2.5 rounded-full bg-amber-50 text-amber-600 font-bold group-hover:bg-amber-500 group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md">
                        Cek Sekarang <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

<?= $this->endSection() ?>

