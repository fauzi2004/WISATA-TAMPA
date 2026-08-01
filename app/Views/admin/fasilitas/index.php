<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div data-aos="fade-down" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3 text-emerald-500"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div data-aos="fade-down" class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-exclamation-circle mr-3 text-red-500"></i> <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <a href="<?= base_url('admin/wisata') ?>" class="inline-flex items-center text-gray-500 hover:text-emerald-600 mb-6 transition-all duration-300 font-bold bg-white/80 backdrop-blur-md px-5 py-2.5 rounded-full shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100/80 hover:shadow-[0_8px_20px_rgba(16,185,129,0.1)] hover:-translate-x-1 group">
        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>Kembali
    </a>

    <div class="mb-10 relative" data-aos="fade-up">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-20 w-32 h-32 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10">
            <h3 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-800 tracking-tight drop-shadow-sm">Manajemen Fasilitas</h3>
            <p class="text-gray-500 font-medium mt-2 text-lg">Kelola fasilitas premium yang tersedia di objek wisata Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Tambah -->
        <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 p-8 relative overflow-hidden group/form">
                <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-emerald-200/40 to-teal-200/40 rounded-full blur-3xl -mr-20 -mt-20 z-0 transition-transform duration-1000 group-hover/form:scale-[2]"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-amber-200/20 to-orange-200/20 rounded-full blur-3xl -ml-10 -mb-10 z-0 transition-transform duration-1000 group-hover/form:scale-[2]"></div>
                
                <div class="relative z-10">
                    <h4 class="font-black text-xl text-gray-800 mb-8 flex items-center border-b border-gray-200/50 pb-5">
                        <div class="w-12 h-12 rounded-[1.2rem] bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 mr-4 transform -rotate-3">
                            <i class="fas fa-plus text-lg"></i>
                        </div>
                        Tambah Fasilitas
                    </h4>
                    <form action="<?= base_url('admin/fasilitas/tambah') ?>" method="POST" class="space-y-5" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <?php
                            $selected_wisata = $id_wisata;
                            if (session()->get('role') === 'pengelola') {
                                $selected_wisata = session()->get('id_wisata');
                            }
                        ?>
                        <input type="hidden" name="id_wisata" value="<?= $selected_wisata ?>">
                        
                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Nama Fasilitas</label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-600">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <input type="text" name="nama_fasilitas" placeholder="Misal: Gazebo, Area Parkir..." class="w-full pl-12 pr-4 py-3.5 bg-white/50 backdrop-blur-xl border border-white shadow-[0_8px_30px_-10px_rgba(0,0,0,0.05)] rounded-2xl focus:bg-white focus:shadow-[0_15px_30px_-10px_rgba(16,185,129,0.2)] focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Ikon (FontAwesome)</label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-600">
                                    <i class="fas fa-icons"></i>
                                </div>
                                <input type="text" name="ikon" value="fas fa-check" class="w-full pl-12 pr-4 py-3.5 bg-white/50 backdrop-blur-xl border border-white shadow-[0_8px_30px_-10px_rgba(0,0,0,0.05)] rounded-2xl focus:bg-white focus:shadow-[0_15px_30px_-10px_rgba(16,185,129,0.2)] focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none">
                            </div>
                            <p class="text-[10px] font-bold text-gray-600 mt-2 ml-2 uppercase tracking-wide"><i class="fas fa-lightbulb text-amber-400 mr-1"></i>Contoh: fas fa-parking</p>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1 flex items-center">
                                Foto Fasilitas 
                                <span class="text-[9px] font-bold text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full ml-2">OPSIONAL</span>
                            </label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-600">
                                    <i class="fas fa-image"></i>
                                </div>
                                <input type="file" name="foto" accept="image/*" class="w-full pl-12 pr-4 py-3 bg-white/50 backdrop-blur-xl border border-white shadow-[0_8px_30px_-10px_rgba(0,0,0,0.05)] rounded-2xl focus:bg-white focus:shadow-[0_15px_30px_-10px_rgba(16,185,129,0.2)] focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all text-sm font-medium file:mr-4 file:py-2 file:px-5 file:rounded-xl file:border-0 file:text-[11px] file:font-black file:uppercase file:tracking-wider file:bg-gradient-to-r file:from-emerald-50 file:to-teal-50 file:text-emerald-700 hover:file:shadow-md cursor-pointer">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Deskripsi Singkat</label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-600">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                <input type="text" name="deskripsi" placeholder="Fasilitas ini memiliki..." class="w-full pl-12 pr-4 py-3.5 bg-white/50 backdrop-blur-xl border border-white shadow-[0_8px_30px_-10px_rgba(0,0,0,0.05)] rounded-2xl focus:bg-white focus:shadow-[0_15px_30px_-10px_rgba(16,185,129,0.2)] focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none">
                            </div>
                        </div>
                        
                        <div class="pt-6">
                            <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-black py-4 rounded-2xl shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.4)] hover:-translate-y-1 transition-all duration-300 tracking-[0.2em] uppercase text-sm relative overflow-hidden group/submit">
                                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-teal-500 to-emerald-400 opacity-0 group-hover/submit:opacity-100 transition-opacity duration-500"></span>
                                <span class="relative flex items-center justify-center z-10"><i class="fas fa-paper-plane mr-2 group-hover/submit:-translate-y-1 group-hover/submit:translate-x-1 group-hover/submit:scale-110 transition-transform duration-300"></i> SIMPAN</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar -->
        <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 relative overflow-hidden group/container">
                <div class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-br from-emerald-200/50 to-teal-300/40 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/container:scale-125 pointer-events-none"></div>
                <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-gradient-to-tr from-cyan-200/30 to-blue-300/30 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/container:scale-125 pointer-events-none"></div>
                
                <div class="px-8 py-6 border-b border-white/50 bg-white/40 backdrop-blur-md flex justify-between items-center relative z-10">
                    <h4 class="font-black text-xl text-gray-800 flex items-center">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center text-emerald-600 mr-3 shadow-sm border border-emerald-200/50">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        Daftar Fasilitas
                    </h4>
                </div>
                
                <div class="relative z-10 overflow-x-auto custom-scrollbar p-6">
                    <table class="w-full min-w-[500px] border-separate" style="border-spacing: 0 16px;">
                        <thead class="sticky top-0 z-20">
                            <tr class="bg-gray-50/80 backdrop-blur-md rounded-2xl">
                                <th class="px-6 py-4 text-center text-[10px] font-black text-gray-500 uppercase tracking-widest w-20 rounded-l-2xl border-b border-gray-200/50">Media</th>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Detail Fasilitas</th>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Objek Wisata</th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-gray-500 uppercase tracking-widest w-28 rounded-r-2xl border-b border-gray-200/50">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fasilitas_list as $f): ?>
                            <tr class="bg-white hover:bg-emerald-50/30 transition-all duration-300 relative z-10 group/row border-b border-gray-100 last:border-0 hover:shadow-[0_-4px_20px_rgba(16,185,129,0.05),0_4px_20px_rgba(16,185,129,0.05)]">
                                <td class="px-6 py-5 text-center rounded-l-2xl">
                                    <?php if(!empty($f['foto'])): ?>
                                        <div class="relative w-14 h-14 rounded-2xl overflow-hidden shadow-sm border-2 border-white mx-auto group-hover/row:border-emerald-200 group-hover/row:shadow-[0_8px_15px_rgba(16,185,129,0.2)] transition-all duration-300">
                                            <img src="<?= base_url('uploads/fasilitas/' . $f['foto']) ?>" class="w-full h-full object-cover group-hover/row:scale-110 transition-transform duration-500">
                                        </div>
                                    <?php else: ?>
                                        <div class="w-14 h-14 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl flex items-center justify-center mx-auto text-gray-600 shadow-[inset_0_2px_5px_rgba(0,0,0,0.02)] border-2 border-white group-hover/row:border-emerald-200 group-hover/row:shadow-[0_8px_15px_rgba(16,185,129,0.2)] group-hover/row:text-emerald-500 group-hover/row:bg-gradient-to-br group-hover/row:from-emerald-50 group-hover/row:to-teal-50 transition-all duration-300 transform group-hover/row:rotate-3 group-hover/row:scale-110">
                                            <i class="<?= htmlspecialchars($f['ikon']) ?> text-xl"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-black text-gray-800 text-lg group-hover/row:text-transparent group-hover/row:bg-clip-text group-hover/row:bg-gradient-to-r group-hover/row:from-emerald-600 group-hover/row:to-teal-600 transition-all duration-300"><?= htmlspecialchars($f['nama_fasilitas']) ?></p>
                                    <p class="text-[12px] font-bold text-gray-600 mt-1 line-clamp-1"><?= htmlspecialchars($f['deskripsi']) ?></p>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 font-bold text-[11px] border border-blue-100 shadow-[0_2px_10px_rgba(59,130,246,0.1)] uppercase tracking-wider group-hover/row:shadow-[0_5px_15px_rgba(59,130,246,0.2)] transition-all">
                                        <div class="w-5 h-5 rounded-full bg-blue-200/50 flex items-center justify-center mr-2 text-blue-600"><i class="fas fa-map-marker-alt text-[10px]"></i></div>
                                        <?= $f['nama_wisata'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center rounded-r-2xl">
                                    <a href="<?= base_url('admin/fasilitas/hapus/' . $f['id']) ?>" class="group/btn relative inline-flex items-center justify-center w-12 h-12 bg-white text-rose-500 border border-rose-100 hover:border-transparent rounded-2xl overflow-hidden shadow-sm hover:shadow-[0_10px_20px_rgba(244,63,94,0.3)] hover:-translate-y-1 transition-all duration-300 tooltip" title="Hapus Fasilitas" onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">
                                        <div class="absolute inset-0 bg-gradient-to-br from-rose-500 to-red-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300 -z-10"></div>
                                        <i class="fas fa-trash-alt group-hover/btn:text-white transition-colors group-hover/btn:scale-110 group-hover/btn:rotate-12"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if (empty($fasilitas_list)): ?>
                <div class="text-center py-16 relative z-10 border-t border-white/50">
                    <div class="w-24 h-24 bg-white/60 backdrop-blur-md rounded-[2rem] flex items-center justify-center mx-auto mb-5 border border-white shadow-sm transform rotate-3">
                        <i class="fas fa-box-open text-4xl text-emerald-200"></i>
                    </div>
                    <h4 class="text-xl font-black text-gray-800 tracking-tight">Belum Ada Fasilitas</h4>
                    <p class="text-gray-500 text-sm mt-2 max-w-sm mx-auto font-bold">Anda belum menambahkan fasilitas apapun untuk objek wisata ini.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>
