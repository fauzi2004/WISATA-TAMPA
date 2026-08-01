<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <section class="pt-40 pb-24 relative min-h-[90vh] bg-cover bg-center bg-fixed" style="background-image: url('<?= base_url('assets/images/river_gazebo.png') ?>');">
        <!-- Frosted Glass Overlay Background -->
        <div class="absolute inset-0 bg-emerald-50/80 backdrop-blur-2xl"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-300/40 rounded-full mix-blend-multiply filter blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-300/40 rounded-full mix-blend-multiply filter blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                
                <!-- Back Button -->
                <a href="<?= base_url('pesanan') ?>" class="inline-flex items-center justify-center w-12 h-12 bg-white/50 hover:bg-white text-emerald-600 rounded-full mb-8 backdrop-blur-md transition-all duration-300 shadow-sm hover:shadow-lg border border-white group">
                    <i class="fas fa-arrow-left transform group-hover:-translate-x-1 transition-transform"></i>
                </a>

                <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl mb-6 shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-emerald-500 text-xl"></i>
                        <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6 shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-red-500 text-xl"></i>
                        <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Status Card (Receipt Style) -->
                <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_25px_60px_-15px_rgba(0,0,0,0.1)] border border-white overflow-hidden relative">
                    <!-- Dashed line for receipt effect -->
                    <div class="absolute top-[200px] left-0 w-full flex justify-between items-center px-0">
                        <div class="w-6 h-12 bg-emerald-50/50 backdrop-blur-md rounded-r-full border-r border-t border-b border-white shadow-inner"></div>
                        <div class="flex-1 border-t-[3px] border-dashed border-gray-200/60 mt-1"></div>
                        <div class="w-6 h-12 bg-emerald-50/50 backdrop-blur-md rounded-l-full border-l border-t border-b border-white shadow-inner"></div>
                    </div>

                    <div class="p-10 md:p-14 pb-12 text-center">
                        <?php if ($pesanan['status_pembayaran'] == 'lunas'): ?>
                            <div class="w-28 h-28 bg-gradient-to-tr from-emerald-400 to-teal-400 rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 shadow-lg shadow-emerald-500/30 text-white transform rotate-3 hover:rotate-6 transition-transform duration-300">
                                <i class="fas fa-check-circle text-6xl"></i>
                            </div>
                            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight mb-2">Pembayaran Lunas</h2>
                        <?php elseif ($pesanan['status_pembayaran'] == 'menunggu_konfirmasi'): ?>
                            <div class="w-28 h-28 bg-gradient-to-tr from-blue-400 to-indigo-400 rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 shadow-lg shadow-blue-500/30 text-white transform rotate-3 hover:rotate-6 transition-transform duration-300">
                                <i class="fas fa-clock text-6xl"></i>
                            </div>
                            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight mb-2">Menunggu Konfirmasi</h2>
                        <?php else: ?>
                            <div class="w-28 h-28 bg-gradient-to-tr from-amber-400 to-orange-400 rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 shadow-lg shadow-amber-500/30 text-white transform rotate-3 hover:rotate-6 transition-transform duration-300">
                                <i class="fas fa-exclamation-triangle text-6xl"></i>
                            </div>
                            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight mb-2">Belum Dibayar</h2>
                        <?php endif; ?>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-6">
                            <div class="text-gray-600 font-bold bg-white/80 border border-white px-6 py-3 rounded-2xl shadow-sm">
                                Kode Booking: <span class="font-black text-emerald-600 ml-1 text-lg tracking-wider"><?= $pesanan['kode_booking'] ?></span>
                            </div>
                            
                            <?php if ($pesanan['status_pembayaran'] != 'lunas'): ?>
                                <a href="<?= base_url('pesanan/cetak/' . $pesanan['id']) ?>" target="_blank" class="inline-flex items-center bg-white border border-gray-200 text-gray-700 px-6 py-3.5 rounded-2xl font-bold hover:bg-gray-50 hover:text-red-600 transition-colors shadow-sm group">
                                    <i class="fas fa-file-pdf mr-2 text-red-500 group-hover:-translate-y-0.5 transition-transform"></i>Cetak PDF
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="p-10 md:p-14 pt-10">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div>
                                <h3 class="font-black text-gray-900 tracking-wide text-lg mb-4 flex items-center"><span class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center mr-3"><i class="fas fa-map-marked-alt text-emerald-600 text-sm"></i></span>Detail Wisata</h3>
                                <div class="bg-white/60 backdrop-blur-md rounded-[2rem] p-6 md:p-8 border border-white shadow-sm hover:shadow-md transition-shadow">
                                    <div class="flex flex-col sm:flex-row items-center sm:items-start mb-6 pb-6 border-b border-gray-200/60 border-dashed text-center sm:text-left gap-5">
                                        <div class="relative">
                                            <div class="absolute inset-0 bg-emerald-400 rounded-[1.2rem] blur opacity-30"></div>
                                            <img src="<?= base_url('uploads/wisata/' . $pesanan['gambar']) ?>" 
                                                 alt="<?= $pesanan['nama_wisata'] ?>" 
                                                 class="w-24 h-24 object-cover rounded-[1.2rem] shadow-sm relative z-10 border-2 border-white"
                                                onerror="this.src='<?= base_url('assets/images/default-wisata.svg') ?>'">
                                        </div>
                                        <div class="pt-2">
                                            <p class="font-black text-gray-900 text-2xl mb-1"><?= $pesanan['nama_wisata'] ?></p>
                                            <p class="text-sm text-red-500 font-bold bg-red-50 inline-block px-3 py-1 rounded-lg border border-red-100"><i class="fas fa-map-marker-alt mr-1"></i><?= $pesanan['lokasi'] ?></p>
                                        </div>
                                    </div>
                                    <div class="space-y-4 font-bold text-gray-600 text-sm md:text-base">
                                        <div class="flex items-center"><div class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center mr-4 border border-gray-100 shadow-sm"><i class="far fa-clock text-amber-500 text-lg"></i></div> <span class="text-gray-900"><?= date('H:i', strtotime($pesanan['jam_buka'])) ?> - <?= date('H:i', strtotime($pesanan['jam_tutup'])) ?> WITA</span></div>
                                        <div class="flex items-center"><div class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center mr-4 border border-gray-100 shadow-sm"><i class="far fa-calendar-alt text-blue-500 text-lg"></i></div> <span class="text-gray-900"><?= date('d M Y', strtotime($pesanan['tanggal_kunjungan'])) ?></span></div>
                                        <div class="flex items-center"><div class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center mr-4 border border-gray-100 shadow-sm"><i class="fas fa-users text-teal-500 text-lg"></i></div> <span class="text-gray-900"><?= $pesanan['jumlah_tiket'] ?> tiket</span></div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="font-black text-gray-900 tracking-wide text-lg mb-4 flex items-center"><span class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center mr-3"><i class="fas fa-receipt text-amber-600 text-sm"></i></span>Rincian Pembayaran</h3>
                                <div class="bg-white/60 backdrop-blur-md rounded-[2rem] p-6 md:p-8 border border-white shadow-sm hover:shadow-md transition-shadow h-full flex flex-col justify-between">
                                    <div class="space-y-4 mb-6">
                                        <div class="flex justify-between items-center text-gray-600 font-bold bg-white/50 p-4 rounded-2xl border border-white/80 shadow-sm">
                                            <span class="flex items-center"><i class="fas fa-ticket-alt text-emerald-500 mr-2"></i>Harga Tiket</span>
                                            <span class="text-gray-900 text-lg">Rp <?= number_format($pesanan['total_harga'] / $pesanan['jumlah_tiket'], 0, ',', '.') ?></span>
                                        </div>
                                        <div class="flex justify-between items-center text-gray-600 font-bold bg-white/50 p-4 rounded-2xl border border-white/80 shadow-sm">
                                            <span class="flex items-center"><i class="fas fa-times text-emerald-500 mr-2"></i>Jumlah Tiket</span>
                                            <span class="text-gray-900 text-lg"><?= $pesanan['jumlah_tiket'] ?>x</span>
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="w-full h-[2px] bg-gray-200/80 my-5 border-dashed border-b border-gray-300"></div>
                                        <div class="flex flex-col sm:flex-row justify-between items-center sm:items-end bg-emerald-50/50 p-5 rounded-2xl border border-emerald-100 gap-3">
                                            <span class="font-black text-gray-900 uppercase tracking-wider text-sm">Total Tagihan</span>
                                            <span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500 text-3xl md:text-4xl">Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($pesanan['status_pembayaran'] == 'belum_bayar'): ?>
                        <!-- Form Upload Bukti Bayar -->
                        <div class="mt-10 bg-white/40 backdrop-blur-3xl rounded-[2.5rem] p-8 md:p-12 border border-white shadow-xl relative overflow-hidden">
                            <!-- Background gradient for form -->
                            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-400/10 rounded-full blur-3xl -z-10"></div>
                            <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-400/10 rounded-full blur-3xl -z-10"></div>
                            
                            <div class="text-center mb-8">
                                <div class="w-16 h-16 bg-gradient-to-tr from-amber-400 to-orange-400 text-white rounded-[1.2rem] flex items-center justify-center mx-auto mb-4 shadow-lg shadow-amber-500/30 transform rotate-3">
                                    <i class="fas fa-file-invoice-dollar text-2xl"></i>
                                </div>
                                <h3 class="font-black text-gray-900 text-2xl md:text-3xl tracking-tight">Selesaikan Pembayaran</h3>
                                <p class="text-gray-600 font-medium mt-2">Segera unggah bukti pembayaran Anda setelah melakukan transfer ke metode di atas</p>
                            </div>
                            
                            <form action="<?= base_url('pesanan/upload_bukti') ?>" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-2xl mx-auto relative z-10" id="formPembayaran">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id_pemesanan" value="<?= $pesanan['id'] ?>">
                                <input type="hidden" name="total_harga" value="<?= $pesanan['total_harga'] ?>">
                                
                                <div>
                                    <label class="block text-gray-800 mb-2 font-bold ml-1">Metode Pembayaran</label>
                                    <div class="relative group/input">
                                        <span class="absolute left-4 top-4 text-gray-400 group-focus-within/input:text-amber-500 transition-colors"><i class="fas fa-wallet"></i></span>
                                        <select name="metode_bayar" id="metodeBayar" class="w-full pl-12 pr-4 py-4 bg-white/80 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all font-bold text-gray-800 outline-none appearance-none" required onchange="toggleBuktiBayar()">
                                            <?php 
                                            $bank_str = !empty($pesanan['bank_nama']) ? $pesanan['bank_nama'] . ': ' . $pesanan['bank_rekening'] . ' a.n ' . $pesanan['bank_atas_nama'] : 'Belum diatur';
                                            $ewallet_str = !empty($pesanan['ewallet_nama']) ? $pesanan['ewallet_nama'] . ': ' . $pesanan['ewallet_nomor'] : 'Belum diatur';
                                            ?>
                                            <option value="transfer">💳 Transfer Bank (<?= esc($bank_str) ?>)</option>
                                            <option value="e-wallet">📱 E-Wallet (<?= esc($ewallet_str) ?>)</option>
                                            <option value="tunai">💵 Tunai (Langsung bayar ke Loket)</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                            <i class="fas fa-chevron-down text-sm"></i>
                                        </div>
                                    </div>
                                </div>

                                <div id="uploadBuktiContainer" class="bg-gray-100/90 p-6 rounded-2xl border-2 border-gray-300 border-dashed relative shadow-inner hover:bg-gray-100 transition-colors duration-300">
                                    <label class="block text-gray-800 mb-3 font-black text-center">Upload File Bukti (Foto Screenshot)</label>
                                    <div class="relative flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mb-4 shadow-md border border-gray-200 group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-cloud-upload-alt text-2xl text-emerald-600"></i>
                                        </div>
                                        <input type="file" name="bukti_bayar" id="buktiBayarInput" accept="image/*" 
                                               class="w-full text-center px-4 py-2 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-black file:bg-emerald-600 file:text-white file:shadow-md hover:file:bg-emerald-700 transition-all cursor-pointer font-medium text-gray-700 bg-white/50 rounded-xl" required>
                                    </div>
                                    <p class="text-gray-600 text-xs mt-4 font-bold text-center bg-white/80 inline-block px-4 py-2 rounded-full border border-gray-200 mx-auto w-full shadow-sm"><i class="fas fa-info-circle mr-1 text-emerald-600"></i> Format: JPG, PNG (Maks 2MB)</p>
                                </div>
                                
                                <div id="infoTunaiContainer" class="hidden bg-emerald-50/80 border border-emerald-200 p-5 rounded-2xl text-emerald-800 shadow-sm flex items-start">
                                    <i class="fas fa-info-circle mr-3 mt-1 text-emerald-500 text-xl"></i>
                                    <div>
                                        <p class="font-bold text-lg mb-1">Pembayaran Tunai</p>
                                        <p class="text-sm font-medium">Anda memilih pembayaran tunai. Silakan bayar langsung di loket wisata untuk mengonfirmasi tiket Anda pada hari kunjungan.</p>
                                    </div>
                                </div>

                                <div class="pt-4">
                                    <button type="submit" id="btnSubmitPembayaran"
                                            class="w-full bg-gradient-to-r from-amber-500 to-orange-500 text-white py-4.5 py-4 rounded-2xl font-black text-lg tracking-wide hover:from-amber-400 hover:to-orange-400 shadow-[0_10px_30px_rgba(245,158,11,0.3)] hover:shadow-[0_15px_40px_rgba(245,158,11,0.5)] transform hover:-translate-y-1 transition-all duration-300">
                                        <i class="fas fa-upload mr-2"></i> KIRIM BUKTI PEMBAYARAN
                                    </button>
                                </div>
                            </form>
                            
                            <script>
                                function toggleBuktiBayar() {
                                    const metode = document.getElementById('metodeBayar').value;
                                    const uploadContainer = document.getElementById('uploadBuktiContainer');
                                    const fileInput = document.getElementById('buktiBayarInput');
                                    const infoTunai = document.getElementById('infoTunaiContainer');
                                    const btnSubmit = document.getElementById('btnSubmitPembayaran');
                                    
                                    if (metode === 'tunai') {
                                        uploadContainer.classList.add('hidden');
                                        fileInput.removeAttribute('required');
                                        infoTunai.classList.remove('hidden');
                                        btnSubmit.innerHTML = '<i class="fas fa-check mr-2"></i>Konfirmasi Pembayaran Tunai';
                                    } else {
                                        uploadContainer.classList.remove('hidden');
                                        fileInput.setAttribute('required', 'required');
                                        infoTunai.classList.add('hidden');
                                        btnSubmit.innerHTML = '<i class="fas fa-upload mr-2"></i>Kirim Bukti Pembayaran';
                                    }
                                }
                            </script>
                        </div>
                        <?php endif; ?>

                        <?php if ($pembayaran && !empty($pembayaran['bukti_bayar'])): ?>
                        <div class="mt-10 border-t border-gray-200/50 pt-10">
                            <h3 class="font-black text-gray-900 tracking-wide text-lg mb-6 flex items-center justify-center"><span class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3"><i class="fas fa-image text-blue-600 text-sm"></i></span>Bukti Pembayaran Terlampir</h3>
                            <div class="bg-white p-3 rounded-[2rem] border border-gray-100 inline-block relative group shadow-xl">
                                <img src="<?= base_url('uploads/bukti_bayar/' . $pembayaran['bukti_bayar']) ?>" 
                                     alt="Bukti Pembayaran" 
                                     class="w-full max-w-sm rounded-[1.5rem] object-cover">
                                <div class="absolute inset-0 bg-gray-900/60 opacity-0 group-hover:opacity-100 transition-all duration-300 rounded-[2rem] flex flex-col items-center justify-center gap-3 backdrop-blur-sm">
                                    <a href="<?= base_url('uploads/bukti_bayar/' . $pembayaran['bukti_bayar']) ?>" target="_blank" class="bg-white text-gray-900 px-6 py-3 rounded-2xl font-black text-sm shadow-xl hover:bg-emerald-50 hover:text-emerald-600 hover:-translate-y-0.5 transition-all w-48"><i class="fas fa-search-plus mr-2 text-emerald-500"></i> Lihat Penuh</a>
                                    <a href="<?= base_url('uploads/bukti_bayar/' . $pembayaran['bukti_bayar']) ?>" download="Bukti_Pembayaran_<?= $pesanan['kode_booking'] ?>" class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-6 py-3 rounded-2xl font-black text-sm shadow-xl hover:from-emerald-400 hover:to-teal-400 hover:-translate-y-0.5 transition-all w-48"><i class="fas fa-download mr-2"></i> Download File</a>
                                </div>
                            </div>
                            <p class="text-gray-500 text-xs mt-6 font-bold bg-gray-50 inline-block px-4 py-2 rounded-full border border-gray-100"><i class="fas fa-info-circle mr-1 text-emerald-500"></i> Anda dapat mendownload bukti ini untuk ditunjukkan ke petugas.</p>
                        </div>
                        <?php endif; ?>

                        <!-- Cetak Tiket (jika lunas) -->
                        <?php if ($pesanan['status_pembayaran'] == 'lunas'): ?>
                        <div class="mt-10 pt-10 border-t border-gray-200/50 text-center">
                            <a href="<?= base_url('pesanan/cetak/' . $pesanan['id']) ?>" target="_blank"
                               class="inline-flex justify-center items-center w-full md:w-auto bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-12 py-4.5 py-5 rounded-[2rem] font-black text-xl tracking-wide hover:from-emerald-400 hover:to-teal-400 shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 transition-all duration-300">
                                <i class="fas fa-qrcode mr-3 text-2xl"></i> CETAK E-TIKET SEKARANG
                            </a>
                            <p class="text-gray-500 text-sm mt-5 font-bold uppercase tracking-widest"><i class="fas fa-check-circle text-emerald-500 mr-1"></i> Tunjukkan E-Tiket kepada petugas loket</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
