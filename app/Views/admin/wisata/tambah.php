<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <a href="<?= base_url('admin/wisata') ?>" class="inline-flex items-center text-gray-500 hover:text-emerald-600 mb-6 transition-all duration-300 font-bold bg-white/80 backdrop-blur-md px-5 py-2.5 rounded-full shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100/80 hover:shadow-[0_8px_20px_rgba(16,185,129,0.1)] hover:-translate-x-1 group">
        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>Kembali
    </a>
    
    <div class="mb-10 relative" data-aos="fade-up">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-20 w-32 h-32 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10">
            <h3 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-800 tracking-tight drop-shadow-sm">Tambah Objek Wisata</h3>
            <p class="text-gray-500 font-medium mt-2 text-lg">Tambahkan objek wisata baru dengan detail informasi yang lengkap.</p>
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
    
    <div class="bg-white/60 backdrop-blur-3xl rounded-[2.5rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.05)] border border-white p-8 md:p-12 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-emerald-100/50 to-teal-100/50 rounded-full blur-3xl -mr-32 -mt-32 z-0 transition-transform duration-700 group-hover:scale-150"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-amber-100/30 to-orange-100/30 rounded-full blur-3xl -ml-20 -mb-20 z-0"></div>
        <div class="relative z-10">
        <form action="<?= base_url('admin/wisata/simpan') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Wisata</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-map-signs"></i>
                        </div>
                        <input type="text" name="nama_wisata" value="<?= old('nama_wisata') ?>" placeholder="Misal: Gazebo 99" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kategori</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-tags"></i>
                        </div>
                        <select name="id_kategori" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none appearance-none cursor-pointer" required>
                            <option value="">- Pilih Kategori -</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= old('id_kategori') == $k['id'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Akun Admin Wisata</label>
                    <div class="space-y-4 p-5 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                        <!-- Nama Admin -->
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <input type="text" name="nama_admin" value="<?= old('nama_admin') ?>" placeholder="Nama Admin (misal: Budi)" class="w-full pl-11 pr-4 py-3.5 bg-white border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Email Admin -->
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input type="email" name="email_admin" value="<?= old('email_admin') ?>" placeholder="Email untuk Login" class="w-full pl-11 pr-4 py-3.5 bg-white border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                            </div>
                            
                            <!-- Password Admin -->
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input type="text" name="password_admin" value="<?= old('password_admin') ?>" placeholder="Password untuk Login" class="w-full pl-11 pr-4 py-3.5 bg-white border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                            </div>
                        </div>
                        <p class="text-[11px] text-emerald-600 font-bold ml-1"><i class="fas fa-info-circle mr-1"></i> Sistem akan otomatis membuatkan akun Pengelola baru untuk wisata ini.</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Lokasi</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-red-500 text-gray-400">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <input type="text" name="lokasi" value="<?= old('lokasi') ?>" placeholder="Misal: Dusun Tampa, Desa Ponrang" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kontak WhatsApp</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-green-500 text-gray-400">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <input type="text" name="kontak_wa" value="<?= old('kontak_wa') ?>" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Kontak Email</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-blue-500 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="kontak_email" value="<?= old('kontak_email') ?>" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" placeholder="email@example.com">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Harga Tiket (Rp)</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-amber-500 text-gray-400">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <input type="number" name="harga_tiket" value="<?= old('harga_tiket', '0') ?>" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Status</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <select name="status" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none appearance-none cursor-pointer" required>
                            <option value="aktif" <?= old('status') == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= old('status') == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jam Buka</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                <i class="far fa-clock"></i>
                            </div>
                            <input type="time" name="jam_buka" value="<?= old('jam_buka', '07:00') ?>" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Jam Tutup</label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                <i class="far fa-clock"></i>
                            </div>
                            <input type="time" name="jam_tutup" value="<?= old('jam_tutup', '17:00') ?>" class="w-full pl-11 pr-4 py-3.5 bg-white/70 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none">
                        </div>
                    </div>
                </div>
                
                <!-- Pengaturan Pembayaran -->
                <div class="md:col-span-2 mt-8 pt-8 border-t border-gray-200/50">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-orange-100 text-amber-600 rounded-[1rem] flex items-center justify-center mr-4 shadow-sm border border-amber-200/50">
                            <i class="fas fa-wallet text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-black text-gray-900 tracking-tight">Pengaturan Pembayaran Wisata</h4>
                            <p class="text-sm text-gray-500 font-medium">Rekening ini akan ditampilkan ke wisatawan saat pemesanan tiket.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white/40 p-8 rounded-[2rem] border border-white shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                        <!-- Rekening Bank -->
                        <div class="space-y-5">
                            <h5 class="font-bold text-gray-700 text-sm mb-4 pb-2 border-b border-gray-200/50"><i class="fas fa-university text-emerald-500 mr-2"></i>Rekening Bank Utama</h5>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Nama Bank</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <input type="text" name="bank_nama" value="<?= old('bank_nama') ?>" placeholder="Contoh: BCA / Mandiri / BNI" class="w-full pl-11 pr-4 py-3 bg-white/80 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 text-sm outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Nomor Rekening</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    <input type="text" name="bank_rekening" value="<?= old('bank_rekening') ?>" placeholder="Contoh: 1234567890" class="w-full pl-11 pr-4 py-3 bg-white/80 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 text-sm outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Atas Nama</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <input type="text" name="bank_atas_nama" value="<?= old('bank_atas_nama') ?>" placeholder="Contoh: BUMDes Tampa / John Doe" class="w-full pl-11 pr-4 py-3 bg-white/80 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 text-sm outline-none">
                                </div>
                            </div>
                        </div>

                        <!-- E-Wallet -->
                        <div class="space-y-5">
                            <h5 class="font-bold text-gray-700 text-sm mb-4 pb-2 border-b border-gray-200/50"><i class="fas fa-mobile-alt text-teal-500 mr-2"></i>E-Wallet (Opsional)</h5>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Jenis E-Wallet</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-teal-500 text-gray-400">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <input type="text" name="ewallet_nama" value="<?= old('ewallet_nama') ?>" placeholder="Contoh: Dana / Gopay / OVO" class="w-full pl-11 pr-4 py-3 bg-white/80 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 text-sm outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Nomor E-Wallet</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-teal-500 text-gray-400">
                                        <i class="fas fa-phone-square"></i>
                                    </div>
                                    <input type="text" name="ewallet_nomor" value="<?= old('ewallet_nomor') ?>" placeholder="Contoh: 081234567890" class="w-full pl-11 pr-4 py-3 bg-white/80 border border-white shadow-sm rounded-xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 text-sm outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 mt-8 pt-8 border-t border-gray-200/50">
                    <label class="block text-sm font-bold text-gray-700 mb-4 ml-1">Foto Utama Wisata <span class="text-[10px] text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full ml-1">Wajib</span></label>
                    <div class="flex flex-col sm:flex-row items-start gap-8 bg-white/40 p-6 rounded-[2rem] border border-white shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                        <div class="flex-1 w-full">
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full px-4 py-3 bg-white/80 border border-white rounded-xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-600 hover:file:bg-emerald-100 cursor-pointer shadow-sm text-sm font-medium" onchange="previewImage(this)" required>
                            <p class="text-[11px] text-gray-500 mt-2 font-medium ml-1"><i class="fas fa-info-circle mr-1"></i>Format JPG, PNG, atau JPEG. Rekomendasi rasio 16:9.</p>
                        </div>
                        <div class="shrink-0 group/img">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3 ml-1">Pratinjau</p>
                            <div class="relative w-40 h-28 rounded-2xl overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.1)] border-[3px] border-white group-hover/img:scale-105 transition-transform duration-300">
                                <img id="preview" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                                <div id="preview-placeholder" class="absolute inset-0 bg-gray-50 flex items-center justify-center text-gray-300">
                                    <i class="fas fa-image text-3xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="md:col-span-2 mt-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Deskripsi Lengkap</label>
                    <div class="relative group/input">
                        <textarea name="deskripsi" rows="6" class="w-full px-5 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none leading-relaxed resize-none custom-scrollbar" placeholder="Tuliskan daya tarik, keunikan, atau informasi penting lainnya..." required><?= old('deskripsi') ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="mt-10 pt-8 border-t border-gray-200/50 flex flex-col sm:flex-row items-center gap-4">
                <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-black px-10 py-4 rounded-[1.2rem] shadow-[0_10px_20px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_30px_rgba(16,185,129,0.4)] hover:-translate-y-1 hover:scale-[1.02] active:scale-95 transition-all duration-300 tracking-wide text-lg flex items-center justify-center">
                    <i class="fas fa-plus-circle mr-2"></i>SIMPAN WISATA BARU
                </button>
                <a href="<?= base_url('admin/wisata') ?>" class="w-full sm:w-auto bg-white border-2 border-emerald-100 text-emerald-600 font-bold px-10 py-3.5 rounded-[1.2rem] hover:bg-emerald-50 hover:border-emerald-200 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-1 text-center flex items-center justify-center">
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
        const placeholder = document.getElementById("preview-placeholder");
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove("hidden");
                placeholder.classList.add("hidden");
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add("hidden");
            placeholder.classList.remove("hidden");
        }
    }
</script>
<?= $this->endSection() ?>
