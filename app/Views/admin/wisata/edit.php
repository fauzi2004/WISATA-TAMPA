<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <a href="<?= base_url('admin/wisata') ?>" class="inline-flex items-center text-gray-500 hover:text-emerald-600 mb-6 transition-all duration-300 font-bold bg-white/80 backdrop-blur-md px-5 py-2.5 rounded-full shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100/80 hover:shadow-[0_8px_20px_rgba(16,185,129,0.1)] hover:-translate-x-1 group">
        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>Kembali
    </a>
    
    <div class="mb-10 relative" data-aos="fade-up">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-20 w-32 h-32 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10">
            <h3 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-800 tracking-tight drop-shadow-sm">Edit Objek Wisata</h3>
            <p class="text-gray-500 font-medium mt-2 text-lg">Perbarui informasi dan pengaturan wisata Anda secara detail.</p>
        </div>
    </div>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div data-aos="fade-down" class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl shadow-sm mb-8 flex items-center">
            <i class="fas fa-exclamation-circle text-2xl mr-3"></i>
            <div>
                <span class="font-bold block mb-1">Gagal menyimpan data:</span>
                <ul class="list-disc list-inside text-sm font-medium">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 p-8 md:p-12 relative overflow-hidden group/form" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-emerald-200/40 to-teal-200/40 rounded-full blur-3xl -mr-32 -mt-32 z-0 transition-transform duration-1000 group-hover/form:scale-[2] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-amber-200/20 to-orange-200/20 rounded-full blur-3xl -ml-20 -mb-20 z-0 transition-transform duration-1000 group-hover/form:scale-[2] pointer-events-none"></div>
        
        <div class="relative z-10">
        <form action="<?= base_url('admin/wisata/update/' . $wisata['id']) ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Nama Wisata</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-map-signs"></i>
                        </div>
                        <input type="text" name="nama_wisata" value="<?= htmlspecialchars($wisata['nama_wisata']) ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none" required>
                    </div>
                </div>
                
                <?php if (session()->get('role') == 'admin'): ?>
                <div>
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Kategori</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-tags"></i>
                        </div>
                        <select name="id_kategori" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none appearance-none cursor-pointer" required>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $k['id'] == $wisata['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Admin Wisata</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <select name="id_pengelola" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none appearance-none cursor-pointer" required>
                            <?php foreach ($pengelola as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= $p['id'] == $wisata['id_pengelola'] ? 'selected' : '' ?>><?= $p['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <div>
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Lokasi</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-red-500 text-gray-400">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <input type="text" name="lokasi" value="<?= htmlspecialchars($wisata['lokasi']) ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-red-500/10 focus:border-red-400 transition-all font-bold text-gray-800 outline-none" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Kontak WhatsApp</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-green-500 text-gray-400">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <input type="text" name="kontak_wa" value="<?= htmlspecialchars($wisata['kontak_wa'] ?? '') ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-green-500/10 focus:border-green-400 transition-all font-bold text-gray-800 outline-none" placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Kontak Email</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-blue-500 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="kontak_email" value="<?= htmlspecialchars($wisata['kontak_email'] ?? '') ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-400 transition-all font-bold text-gray-800 outline-none" placeholder="email@example.com">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Harga Tiket (Rp)</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-amber-500 text-gray-400">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <input type="number" name="harga_tiket" value="<?= $wisata['harga_tiket'] ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all font-black text-emerald-600 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Status</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <select name="status" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none appearance-none cursor-pointer" required>
                            <option value="aktif" <?= $wisata['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= $wisata['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Jam Buka</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                <i class="far fa-clock"></i>
                            </div>
                            <input type="time" name="jam_buka" value="<?= $wisata['jam_buka'] ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Jam Tutup</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                <i class="far fa-clock"></i>
                            </div>
                            <input type="time" name="jam_tutup" value="<?= $wisata['jam_tutup'] ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none">
                        </div>
                    </div>
                </div>
                
                <!-- Pengaturan Pembayaran -->
                <div class="md:col-span-2 mt-8 pt-8 border-t border-gray-200/50">
                    <div class="flex items-center mb-8">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-200/50 to-orange-200/50 text-amber-600 rounded-2xl flex items-center justify-center mr-5 shadow-sm border border-amber-300/30 transform -rotate-3">
                            <i class="fas fa-wallet text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 tracking-tight">Pengaturan Pembayaran</h4>
                            <p class="text-sm text-gray-500 font-bold mt-1">Rekening ini akan ditampilkan ke wisatawan saat pemesanan tiket.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white/50 backdrop-blur-md p-8 md:p-10 rounded-[2.5rem] border border-white shadow-[0_10px_40px_rgba(0,0,0,0.03)] relative overflow-hidden group/pay">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-100/40 to-orange-100/40 rounded-full blur-2xl -mr-10 -mt-10 z-0 transition-transform duration-1000 group-hover/pay:scale-150 pointer-events-none"></div>
                        
                        <!-- Rekening Bank -->
                        <div class="space-y-6 relative z-10">
                            <h5 class="font-black text-gray-800 text-sm mb-6 flex items-center uppercase tracking-widest"><i class="fas fa-university text-emerald-500 mr-3 text-lg"></i>Bank Utama</h5>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Nama Bank</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <input type="text" name="bank_nama" placeholder="Contoh: BCA / Mandiri / BNI" value="<?= $wisata["bank_nama"] ?? '' ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/90 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Nomor Rekening</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <input type="text" name="bank_rekening" placeholder="Contoh: 1234567890" value="<?= $wisata["bank_rekening"] ?? '' ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/90 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-mono font-bold tracking-widest text-emerald-700 outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Atas Nama</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <input type="text" name="bank_atas_nama" placeholder="Contoh: BUMDes Tampa" value="<?= $wisata["bank_atas_nama"] ?? '' ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/90 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none uppercase">
                                </div>
                            </div>
                        </div>

                        <!-- E-Wallet -->
                        <div class="space-y-6 relative z-10">
                            <h5 class="font-black text-gray-800 text-sm mb-6 flex items-center uppercase tracking-widest"><i class="fas fa-mobile-alt text-teal-500 mr-3 text-lg"></i>E-Wallet <span class="ml-3 text-[9px] font-bold text-gray-500 bg-gray-200/50 px-2 py-0.5 rounded-md">OPSIONAL</span></h5>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Jenis E-Wallet</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-teal-500 text-gray-400">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <input type="text" name="ewallet_nama" placeholder="Contoh: Dana / Gopay / OVO" value="<?= $wisata["ewallet_nama"] ?? '' ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/90 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-teal-500/10 focus:border-teal-400 transition-all font-bold text-gray-800 outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Nomor E-Wallet</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-teal-500 text-gray-400">
                                        <i class="fas fa-phone-square"></i>
                                    </div>
                                    <input type="text" name="ewallet_nomor" placeholder="Contoh: 081234567890" value="<?= $wisata["ewallet_nomor"] ?? '' ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/90 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-teal-500/10 focus:border-teal-400 transition-all font-mono font-bold tracking-widest text-teal-700 outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 mt-8 pt-8 border-t border-gray-200/50">
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-4 ml-1">Foto Utama Wisata</label>
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8 bg-white/40 p-8 rounded-[2.5rem] border border-white shadow-[0_10px_40px_rgba(0,0,0,0.03)] hover:shadow-[0_15px_50px_rgba(16,185,129,0.05)] transition-shadow duration-500">
                        <div class="flex-1 w-full relative group/file">
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full pl-4 pr-4 py-3 bg-white/80 border-2 border-white rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all file:mr-5 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-[11px] file:font-black file:uppercase file:tracking-widest file:bg-gradient-to-r file:from-emerald-500 file:to-teal-500 file:text-white hover:file:shadow-[0_8px_20px_rgba(16,185,129,0.3)] hover:file:-translate-y-0.5 cursor-pointer shadow-[0_4px_15px_rgba(0,0,0,0.02)] font-bold text-gray-400" onchange="previewImage(this)">
                            <p class="text-[10px] font-bold text-gray-400 mt-3 ml-2 tracking-wide uppercase"><i class="fas fa-lightbulb text-amber-400 mr-1.5"></i>Biarkan kosong jika tidak mengubah gambar.</p>
                        </div>
                        <div class="shrink-0 group/img w-full sm:w-auto flex flex-col items-center">
                            <p class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-4 bg-emerald-50 px-3 py-1 rounded-md">Pratinjau Saat Ini</p>
                            <div class="relative w-48 h-32 rounded-[1.5rem] overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.15)] border-4 border-white group-hover/img:scale-110 group-hover/img:-rotate-2 transition-transform duration-500">
                                <img src="<?= base_url('uploads/wisata/' . $wisata['gambar']) ?>" id="preview" class="w-full h-full object-cover" onerror="this.src='<?= base_url('assets/images/river_gazebo.png') ?>'">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover/img:opacity-100 transition-opacity duration-300"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="md:col-span-2 mt-8">
                    <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-4 ml-1">Deskripsi Lengkap</label>
                    <div class="relative group/input">
                        <textarea name="deskripsi" rows="7" class="w-full px-6 py-5 bg-white/80 border-2 border-white shadow-[0_8px_30px_rgba(0,0,0,0.03)] rounded-[2rem] focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-700 outline-none leading-relaxed resize-none custom-scrollbar" required><?= htmlspecialchars($wisata['deskripsi']) ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 pt-10 border-t border-gray-200/50 flex flex-col sm:flex-row items-center gap-6">
                <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-black px-12 py-4 rounded-[1.5rem] shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_20px_40px_rgba(16,185,129,0.4)] hover:-translate-y-1 transition-all duration-500 tracking-[0.2em] uppercase text-sm relative overflow-hidden group/btn flex items-center justify-center">
                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-teal-500 to-emerald-400 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></span>
                    <i class="fas fa-save mr-3 relative z-10 group-hover/btn:scale-125 transition-transform duration-300"></i>
                    <span class="relative z-10">SIMPAN PERUBAHAN</span>
                </button>
                <a href="<?= base_url('admin/wisata') ?>" class="w-full sm:w-auto bg-white border-2 border-emerald-100/80 text-emerald-600 font-black px-12 py-4 rounded-[1.5rem] hover:bg-emerald-50/50 hover:border-emerald-300 transition-all duration-300 shadow-[0_4px_15px_rgba(0,0,0,0.02)] hover:shadow-[0_10px_25px_rgba(16,185,129,0.1)] hover:-translate-y-1 text-center flex items-center justify-center tracking-[0.2em] uppercase text-sm">
                    Batal
                </a>
            </div>
        </form>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function previewImage(input) {
        const preview = document.getElementById("preview");
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>
