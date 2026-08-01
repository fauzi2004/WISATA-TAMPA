<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <div class="relative z-10" data-aos="fade-right">
        <a href="<?= base_url('admin/pemesanan') ?>" class="group inline-flex items-center text-gray-500 hover:text-emerald-600 mb-8 transition-all duration-300 font-bold bg-white/80 backdrop-blur-md px-5 py-2.5 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/50 hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] hover:-translate-y-0.5">
            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center mr-3 group-hover:bg-emerald-50 transition-colors">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
            </div>
            Kembali ke Daftar Pemesanan
        </a>
    </div>
    
    <div class="max-w-4xl relative" data-aos="fade-up">
        <!-- Floating Blobs Background -->
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-emerald-300/30 rounded-full blur-[80px] -z-10 animate-pulse"></div>
        <div class="absolute bottom-10 -right-20 w-80 h-80 bg-teal-300/20 rounded-full blur-[100px] -z-10" style="animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;"></div>
        
        <div class="bg-white/90 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white overflow-hidden relative">
            
            <!-- Beautiful Header -->
            <div class="relative overflow-hidden bg-gradient-to-br from-emerald-600 via-teal-700 to-emerald-900 p-10 text-white">
                <!-- Abstract Design Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-emerald-400/20 rounded-full blur-2xl -ml-10 -mb-10"></div>
                <div class="absolute right-10 top-1/2 transform -translate-y-1/2 opacity-20 hidden md:block">
                    <i class="fas fa-ticket-alt text-9xl transform rotate-12"></i>
                </div>
                
                <div class="relative z-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30 text-white text-xs font-bold uppercase tracking-widest mb-4">
                            <span class="w-2 h-2 rounded-full bg-emerald-300 animate-ping"></span>
                            <span class="w-2 h-2 rounded-full bg-emerald-300 absolute"></span>
                            <span class="ml-2">Detail Transaksi</span>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-black tracking-tight mb-2 drop-shadow-md">Pesanan Tiket</h3>
                        <p class="text-emerald-100/80 font-medium">Informasi lengkap transaksi pengunjung wisata.</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-4 rounded-2xl text-center shadow-inner min-w-[180px]">
                        <p class="text-emerald-100 text-xs font-bold uppercase tracking-widest mb-1">Kode Booking</p>
                        <div class="text-2xl font-black font-mono tracking-wider drop-shadow-sm">#<?= $pesanan['kode_booking'] ?></div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-8 md:p-10 relative z-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
                    
                    <!-- Card Data Pemesan -->
                    <div class="group bg-white/80 rounded-3xl p-7 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_-10px_rgba(16,185,129,0.1)] hover:-translate-y-1 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <div class="flex items-center mb-6 relative z-10">
                            <?php if (!empty($pesanan['foto_user']) && $pesanan['foto_user'] != 'default.png' && $pesanan['foto_user'] != 'default-user.svg'): ?>
                                <div class="w-14 h-14 rounded-2xl mr-4 overflow-hidden border-2 border-white shadow-md group-hover:shadow-lg transition-shadow">
                                    <img src="<?= base_url('uploads/profil/' . $pesanan['foto_user']) ?>" alt="Profile" class="w-full h-full object-cover">
                                </div>
                            <?php else: ?>
                                <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center mr-4 text-white shadow-md group-hover:shadow-lg transition-shadow">
                                    <i class="fas fa-user text-xl"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h4 class="font-black text-gray-900 text-xl tracking-tight">Data Pemesan</h4>
                                <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Informasi Kontak</p>
                            </div>
                        </div>
                        
                        <div class="space-y-5 relative z-10">
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 mr-3 mt-1">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest">Nama Lengkap</p>
                                    <p class="text-gray-900 font-bold text-lg mt-0.5"><?= $pesanan['nama_user'] ?></p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 mr-3 mt-1">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest">Alamat Email</p>
                                    <p class="text-gray-900 font-bold text-lg mt-0.5"><?= $pesanan['email'] ?></p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 mr-3 mt-1">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest">No. WhatsApp</p>
                                    <p class="text-gray-900 font-bold text-lg mt-0.5"><?= $pesanan['no_telp'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Detail Wisata -->
                    <div class="group bg-white/80 rounded-3xl p-7 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_40px_-10px_rgba(59,130,246,0.1)] hover:-translate-y-1 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <div class="flex items-center mb-6 relative z-10">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 text-white shadow-md group-hover:shadow-lg transition-shadow">
                                <i class="fas fa-map-marked-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-gray-900 text-xl tracking-tight">Tujuan Wisata</h4>
                                <p class="text-xs font-bold text-blue-600 uppercase tracking-widest">Detail Kunjungan</p>
                            </div>
                        </div>
                        
                        <div class="space-y-5 relative z-10">
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 mr-3 mt-1">
                                    <i class="fas fa-mountain"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest">Objek Wisata</p>
                                    <p class="text-gray-900 font-bold text-lg mt-0.5"><?= $pesanan['nama_wisata'] ?></p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 mr-3 mt-1">
                                    <i class="far fa-calendar-check"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest">Tanggal Kunjungan</p>
                                    <p class="text-gray-900 font-bold text-lg mt-0.5"><?= date('d F Y', strtotime($pesanan['tanggal_kunjungan'])) ?></p>
                                </div>
                            </div>
                            
                            <div class="pt-4 border-t border-gray-100 flex items-end justify-between mt-6">
                                <div>
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest mb-1">Tiket Dipesan</p>
                                    <span class="inline-flex items-center justify-center bg-blue-50 text-blue-700 font-black px-4 py-1.5 rounded-xl text-sm border border-blue-100">
                                        <?= $pesanan['jumlah_tiket'] ?> <i class="fas fa-ticket-alt ml-2 opacity-70"></i>
                                    </span>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Tagihan</p>
                                    <p class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500 tracking-tighter">Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-10 group relative">
                    <!-- Glowing Border Effect for section -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-300 via-teal-300 to-blue-300 rounded-[2.5rem] blur opacity-30 group-hover:opacity-60 transition duration-1000 group-hover:duration-200"></div>
                    
                    <div class="relative bg-white rounded-[2rem] p-8 border border-gray-100 shadow-sm">
                        <div class="absolute -top-4 left-8">
                            <span class="bg-gradient-to-r from-gray-900 to-gray-800 text-white px-5 py-2 rounded-full text-xs font-black uppercase tracking-widest shadow-lg flex items-center">
                                <i class="fas fa-tasks mr-2 text-emerald-400"></i> Kelola Pesanan
                            </span>
                        </div>
                        
                        <div class="flex flex-col lg:flex-row gap-10 mt-6">
                            
                            <!-- Left: Action Buttons -->
                            <div class="flex-1 space-y-8">
                                <?php if ($pesanan['status_pembayaran'] == 'belum_bayar' || $pesanan['status_pembayaran'] == 'menunggu_konfirmasi'): ?>
                                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-100 relative overflow-hidden h-full flex flex-col justify-center">
                                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl -mr-10 -mt-10"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center text-blue-800 font-bold mb-5">
                                            <span class="relative flex h-4 w-4 mr-3">
                                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                              <span class="relative inline-flex rounded-full h-4 w-4 bg-blue-500"></span>
                                            </span>
                                            Tindakan Diperlukan
                                        </div>
                                        <p class="text-sm text-blue-700/80 font-medium mb-6">
                                            <?php if ($pesanan['status_pembayaran'] == 'belum_bayar'): ?>
                                                Pesanan ini baru masuk dan pengunjung belum mengunggah bukti pembayaran. Anda dapat mengonfirmasi pesanan ini secara manual jika diperlukan.
                                            <?php else: ?>
                                                Pembayaran ini telah diunggah dan memerlukan verifikasi serta konfirmasi Anda sebagai admin untuk menyelesaikan proses pemesanan tiket.
                                            <?php endif; ?>
                                        </p>
                                        
                                        <div class="flex gap-4 mt-auto">
                                            <form action="<?= base_url('admin/pemesanan/konfirmasi/' . $pesanan['id']) ?>" method="POST" class="flex-1 group/btn">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="w-full relative inline-flex items-center justify-center px-6 py-3.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-black text-sm rounded-xl overflow-hidden shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:-translate-y-1 transition-all duration-300">
                                                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-teal-600 to-emerald-500 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></span>
                                                    <span class="relative flex items-center z-10"><i class="fas fa-check-circle mr-2 text-lg"></i> <?= $pesanan['status_pembayaran'] == 'belum_bayar' ? 'Konfirmasi Pesanan' : 'Terima Pembayaran' ?></span>
                                                </button>
                                            </form>
                                            <form action="<?= base_url('admin/pemesanan/tolak/' . $pesanan['id']) ?>" method="POST" class="flex-1 group/btn2">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="w-full relative inline-flex items-center justify-center px-6 py-3.5 bg-white border-2 border-red-100 text-red-600 font-black text-sm rounded-xl overflow-hidden hover:bg-red-50 hover:border-red-200 shadow-sm hover:shadow transition-all duration-300">
                                                    <span class="relative flex items-center z-10"><i class="fas fa-times-circle mr-2 text-lg"></i> Tolak</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif ($pesanan['status_pembayaran'] == 'lunas'): ?>
                                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-6 rounded-2xl border border-emerald-100 flex flex-col justify-center items-center text-center h-full">
                                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-500 text-white rounded-full flex items-center justify-center text-2xl mb-4 shadow-lg shadow-emerald-500/30">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <h4 class="font-black text-emerald-900 text-lg">Pesanan Selesai</h4>
                                    <p class="text-sm text-emerald-700/80 mt-2 font-medium">Pembayaran telah dikonfirmasi dan e-tiket sudah diterbitkan untuk wisatawan.</p>
                                </div>
                                <?php else: ?>
                                <div class="bg-gradient-to-br from-red-50 to-orange-50 p-6 rounded-2xl border border-red-100 flex flex-col justify-center items-center text-center h-full">
                                    <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-orange-500 text-white rounded-full flex items-center justify-center text-2xl mb-4 shadow-lg shadow-red-500/30">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <h4 class="font-black text-red-900 text-lg">Pesanan Ditolak</h4>
                                    <p class="text-sm text-red-700/80 mt-2 font-medium">Pesanan ini telah Anda tolak atau dibatalkan.</p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Right: Payment Info -->
                            <div class="flex-1">
                                <p class="text-[11px] font-black text-gray-400 uppercase tracking-widest mb-3">Info Pembayaran</p>
                                
                                <?php if ($pembayaran): ?>
                                    <div class="mb-5 inline-flex items-center px-6 py-3 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border border-gray-200 shadow-[inset_0_2px_4px_rgba(0,0,0,0.02)] w-full">
                                        <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-gray-700 shadow-sm mr-4 border border-gray-100">
                                            <i class="fas fa-wallet text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-gray-900 font-black"><?= ucfirst($pembayaran['metode_bayar']) ?></p>
                                            <p class="text-gray-500 text-xs font-medium">Metode Dipilih</p>
                                        </div>
                                    </div>
                                    
                                    <?php if ($pembayaran['metode_bayar'] == 'tunai'): ?>
                                        <div class="h-48 bg-gradient-to-br from-emerald-50 to-teal-50 border-2 border-dashed border-emerald-200 rounded-3xl flex flex-col items-center justify-center text-center p-6 relative overflow-hidden">
                                            <div class="w-16 h-16 bg-white shadow-xl shadow-emerald-500/10 text-emerald-500 rounded-2xl flex items-center justify-center mb-4 relative z-10">
                                                <i class="fas fa-money-bill-wave text-3xl"></i>
                                            </div>
                                            <div class="relative z-10">
                                                <p class="text-emerald-800 font-black text-lg mb-1">Tunai</p>
                                                <p class="text-emerald-600/80 text-xs font-medium">Bayar di loket.</p>
                                            </div>
                                        </div>
                                    <?php elseif ($pembayaran['bukti_bayar']): ?>
                                        <a href="<?= base_url('uploads/bukti_bayar/' . $pembayaran['bukti_bayar']) ?>" target="_blank" class="block group/img relative rounded-3xl overflow-hidden shadow-md border-4 border-white hover:shadow-xl transition-all duration-500 h-48 cursor-zoom-in">
                                            <img src="<?= base_url('uploads/bukti_bayar/' . $pembayaran['bukti_bayar']) ?>" alt="Bukti" class="w-full h-full object-cover group-hover/img:scale-110 transition-transform duration-700">
                                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-end pb-6">
                                                <div class="bg-white/20 backdrop-blur-md text-white px-5 py-2 rounded-full font-bold text-xs border border-white/30 transform translate-y-4 group-hover/img:translate-y-0 transition-transform duration-300">
                                                    <i class="fas fa-search-plus mr-1"></i>Perbesar
                                                </div>
                                            </div>
                                        </a>
                                    <?php else: ?>
                                        <div class="h-48 bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl flex flex-col items-center justify-center text-center p-6">
                                            <p class="text-gray-500 font-bold text-base">Belum Ada Bukti</p>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="h-full min-h-[200px] bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl flex flex-col items-center justify-center text-center p-8">
                                        <div class="w-16 h-16 bg-white shadow-sm text-gray-400 rounded-2xl flex items-center justify-center mb-4">
                                            <i class="fas fa-user-clock text-2xl"></i>
                                        </div>
                                        <p class="text-gray-500 font-bold text-lg mb-1">Belum Ada Pembayaran</p>
                                        <p class="text-gray-400 text-sm font-medium">Pengunjung belum memilih metode bayar atau mengunggah bukti pembayaran.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>
