<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div data-aos="fade-down" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3 text-emerald-500"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="mb-10 relative" data-aos="fade-up">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-20 w-32 h-32 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h3 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-800 tracking-tight drop-shadow-sm">Daftar Objek Wisata</h3>
            </div>
            <?php if (session()->get('role') == 'admin'): ?>
            <div>
                <a href="<?= base_url('admin/wisata/tambah') ?>" class="group bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-7 py-3.5 rounded-[1.2rem] font-bold shadow-[0_8px_20px_rgba(16,185,129,0.25)] hover:shadow-[0_15px_30px_rgba(16,185,129,0.35)] hover:-translate-y-1 hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center gap-3">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:rotate-90 transition-transform duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </div>
                    Tambah Wisata
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 relative overflow-hidden group/container" data-aos="fade-up" data-aos-delay="100">
        <!-- Dekorasi Background Tabel -->
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-emerald-200/50 to-teal-300/40 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/container:scale-125 pointer-events-none"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-amber-200/30 to-orange-300/30 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/container:scale-125 pointer-events-none"></div>
        
        <div class="relative z-10 overflow-x-auto custom-scrollbar p-6">
            <table class="w-full min-w-[1000px] border-separate" style="border-spacing: 0 16px;">
                <thead class="sticky top-0 z-20">
                    <tr class="bg-gray-50/80 backdrop-blur-md rounded-2xl">
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest rounded-l-2xl border-b border-gray-200/50">Objek Wisata</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Kategori</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Tarif Tiket</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Status</th>
                        <th class="px-8 py-4 text-center text-[10px] font-black text-gray-500 uppercase tracking-widest rounded-r-2xl border-b border-gray-200/50">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wisata_list as $w): ?>
                    <tr class="bg-white hover:bg-emerald-50/30 transition-all duration-300 relative z-10 group/row border-b border-gray-100 last:border-0 hover:shadow-[0_-4px_20px_rgba(16,185,129,0.05),0_4px_20px_rgba(16,185,129,0.05)]">
                        <td class="px-6 py-5 rounded-l-2xl">
                            <div class="flex items-center gap-5">
                                <div class="relative w-28 h-20 rounded-2xl overflow-hidden shadow-md group-hover/row:shadow-[0_8px_25px_rgba(16,185,129,0.3)] transition-all duration-500 border-2 border-white group-hover/row:border-emerald-100 flex-shrink-0">
                                    <img src="<?= base_url('uploads/wisata/' . $w['gambar']) ?>" alt="<?= $w['nama_wisata'] ?>" class="w-full h-full object-cover group-hover/row:scale-110 transition-transform duration-700" onerror="this.src='<?= base_url('assets/images/river_gazebo.png') ?>'">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover/row:opacity-100 transition-opacity duration-500"></div>
                                </div>
                                <div>
                                    <h4 class="font-black text-gray-900 text-lg group-hover/row:text-transparent group-hover/row:bg-clip-text group-hover/row:bg-gradient-to-r group-hover/row:from-emerald-600 group-hover/row:to-teal-600 transition-all duration-300"><?= $w['nama_wisata'] ?></h4>
                                    <div class="flex items-center mt-1.5">
                                        <div class="w-5 h-5 rounded-full bg-red-50 flex items-center justify-center text-red-500 mr-2 shadow-sm">
                                            <i class="fas fa-map-marker-alt text-[10px]"></i>
                                        </div>
                                        <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider"><?= (strlen($w['lokasi']) > 25) ? substr($w['lokasi'], 0, 25).'...' : $w['lokasi'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 font-bold text-[11px] border border-blue-100 shadow-[0_2px_10px_rgba(59,130,246,0.1)] uppercase tracking-wider group-hover/row:shadow-[0_5px_15px_rgba(59,130,246,0.2)] transition-all">
                                <div class="w-5 h-5 rounded-full bg-blue-200/50 flex items-center justify-center mr-2"><i class="fas fa-layer-group text-[10px]"></i></div>
                                <?= $w['nama_kategori'] ?>
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center text-lg text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-xl border border-emerald-100 shadow-sm group-hover/row:border-emerald-200 group-hover/row:bg-emerald-50 transition-colors w-max">
                                <span class="text-[10px] font-black mr-2 px-1.5 py-0.5 bg-emerald-600 text-white rounded-[4px] uppercase tracking-wider">IDR</span>
                                <span class="font-bold tracking-tight"><?= number_format($w['harga_tiket'], 0, ',', '.') ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <?php 
                                $isAktif = ($w['status'] == 'aktif');
                                $bgClass = $isAktif ? 'from-emerald-400 to-teal-500 shadow-emerald-500/30' : 'from-red-400 to-rose-500 shadow-red-500/30';
                                $iconClass = $isAktif ? 'fa-check-circle' : 'fa-times-circle';
                            ?>
                            <div class="inline-flex items-center px-4 py-2 rounded-full text-[11px] font-black uppercase tracking-widest text-white bg-gradient-to-r <?= $bgClass ?> shadow-lg transform group-hover/row:scale-105 transition-transform">
                                <i class="fas <?= $iconClass ?> mr-2"></i>
                                <?= ucfirst($w['status']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-5 rounded-r-2xl">
                            <div class="flex justify-center items-center gap-3">
                                <a href="<?= base_url('admin/testimoni/wisata/' . $w['id']) ?>" class="relative w-11 h-11 flex items-center justify-center rounded-2xl bg-white text-purple-500 font-bold hover:text-white transition-all duration-300 shadow-sm hover:shadow-[0_8px_20px_rgba(168,85,247,0.4)] hover:-translate-y-1 border border-purple-100 group/btn tooltip" title="Testimoni">
                                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl opacity-0 group-hover/btn:opacity-100 transition-opacity -z-10"></div>
                                    <i class="fas fa-comments group-hover/btn:animate-pulse"></i>
                                </a>
                                <?php if (session()->get('role') !== 'admin'): ?>
                                <a href="<?= base_url('admin/fasilitas?id_wisata=' . $w['id']) ?>" class="relative w-11 h-11 flex items-center justify-center rounded-2xl bg-white text-amber-500 font-bold hover:text-white transition-all duration-300 shadow-sm hover:shadow-[0_8px_20px_rgba(245,158,11,0.4)] hover:-translate-y-1 border border-amber-100 group/btn tooltip" title="Fasilitas">
                                    <div class="absolute inset-0 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl opacity-0 group-hover/btn:opacity-100 transition-opacity -z-10"></div>
                                    <i class="fas fa-tools group-hover/btn:rotate-12"></i>
                                </a>
                                <?php endif; ?>
                                <a href="<?= base_url('admin/wisata/edit/' . $w['id']) ?>" class="relative w-11 h-11 flex items-center justify-center rounded-2xl bg-white text-blue-500 font-bold hover:text-white transition-all duration-300 shadow-sm hover:shadow-[0_8px_20px_rgba(59,130,246,0.4)] hover:-translate-y-1 border border-blue-100 group/btn tooltip" title="Edit">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl opacity-0 group-hover/btn:opacity-100 transition-opacity -z-10"></div>
                                    <i class="fas fa-edit group-hover/btn:scale-110"></i>
                                </a>
                                <?php if (session()->get('role') == 'admin'): ?>
                                <a href="<?= base_url('admin/wisata/hapus/' . $w['id']) ?>" class="relative w-11 h-11 flex items-center justify-center rounded-2xl bg-white text-red-500 font-bold hover:text-white transition-all duration-300 shadow-sm hover:shadow-[0_8px_20px_rgba(239,68,68,0.4)] hover:-translate-y-1 border border-red-100 group/btn tooltip" title="Hapus" onclick="return confirm('Yakin ingin menghapus wisata ini?')">
                                    <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl opacity-0 group-hover/btn:opacity-100 transition-opacity -z-10"></div>
                                    <i class="fas fa-trash-alt group-hover/btn:-rotate-12"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($wisata_list)): ?>
        <div class="text-center py-16 border-t border-gray-100">
            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                <i class="fas fa-mountain text-4xl text-gray-300"></i>
            </div>
            <h4 class="text-lg font-bold text-gray-900">Belum ada wisata</h4>
            <p class="text-gray-500 text-sm mt-1">Silakan tambahkan data objek wisata terlebih dahulu.</p>
        </div>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>
