<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div data-aos="fade-down" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3 text-emerald-500"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8" data-aos="fade-up">
        <div>
            <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Testimoni</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola ulasan dan penilaian dari pengunjung wisata</p>
        </div>
        <?php if (isset($is_specific) && $is_specific): ?>
        <div class="mt-4 md:mt-0">
            <a href="<?= base_url('admin/wisata') ?>" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-200 transition-all duration-300 flex items-center shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Objek Wisata
            </a>
        </div>
        <?php endif; ?>
    </div>

    <div class="bg-white/90 backdrop-blur-2xl rounded-[2rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white overflow-hidden relative" data-aos="fade-up" data-aos-delay="100">
        <!-- Dekorasi Background Tabel -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-50 rounded-full blur-[80px] -mr-20 -mt-20 opacity-60"></div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gradient-to-r from-gray-50 to-emerald-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">User</th>
                        <th class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Wisata</th>
                        <th class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Rating</th>
                        <th class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-widest w-1/3">Komentar</th>
                        <th class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-center text-xs font-bold text-gray-500 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimoni_list as $t): ?>
                    <tr class="border-b border-gray-50 hover:bg-emerald-50/30 hover:shadow-sm transition-all duration-300 relative z-10 group">
                        <td class="px-8 py-5">
                            <div class="flex items-center">
                                <?php if (!empty($t['foto'])): ?>
                                    <img src="<?= base_url('uploads/profil/' . $t['foto']) ?>" alt="<?= $t['nama'] ?>" class="h-10 w-10 rounded-full object-cover shadow-sm mr-3 flex-shrink-0 border-2 border-emerald-500/30" onerror="this.src='<?= base_url('assets/images/default-user.svg') ?>'">
                                <?php else: ?>
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 text-white flex items-center justify-center font-bold shadow-sm mr-3 flex-shrink-0">
                                        <?= strtoupper(substr($t['nama'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                                <p class="font-bold text-gray-800 text-base"><?= $t['nama'] ?></p>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-gray-600 font-medium">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-50/80 text-blue-700 font-semibold text-sm border border-blue-100 shadow-[inset_0_1px_2px_rgba(255,255,255,0.5)] whitespace-nowrap">
                                <i class="fas fa-map-marker-alt mr-1.5 opacity-60 text-xs"></i> <?= $t['nama_wisata'] ?>
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="inline-flex items-center px-3 py-1.5 rounded-xl bg-amber-50 border border-amber-100 text-amber-500 text-sm shadow-sm group-hover:scale-105 transition-transform cursor-default">
                                <?= str_repeat('<i class="fas fa-star mr-0.5"></i>', $t['rating']) ?>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-gray-500 italic text-sm leading-relaxed">"<?= substr($t['komentar'], 0, 100) ?>..."</td>
                        <td class="px-8 py-5">
                            <span class="px-4 py-1.5 rounded-full text-[11px] font-black uppercase tracking-widest shadow-sm hover:scale-105 transition-transform cursor-default <?= $t['status'] == 'approved' ? 'bg-gradient-to-r from-emerald-400 to-teal-500 text-white ring-2 ring-emerald-100 ring-offset-1' : ($t['status'] == 'rejected' ? 'bg-gradient-to-r from-red-400 to-rose-500 text-white ring-2 ring-red-100 ring-offset-1' : 'bg-gradient-to-r from-amber-400 to-orange-500 text-white ring-2 ring-amber-100 ring-offset-1') ?>">
                                <?= empty($t['status']) || $t['status'] == 'pending' ? 'Menunggu' : ($t['status'] == 'approved' ? 'Disetujui' : 'Ditolak') ?>
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <div class="flex justify-center items-center space-x-3 opacity-80 group-hover:opacity-100 transition-opacity">
                                <?php if ($t['status'] == 'pending' || empty($t['status'])): ?>
                                    <a href="<?= base_url('admin/testimoni/setujui/' . $t['id']) ?>" class="w-10 h-10 flex items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 font-bold hover:bg-gradient-to-br hover:from-emerald-500 hover:to-teal-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1 tooltip" title="Setujui">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="<?= base_url('admin/testimoni/tolak/' . $t['id']) ?>" class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-50 text-amber-600 font-bold hover:bg-gradient-to-br hover:from-amber-400 hover:to-orange-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1 tooltip" title="Tolak">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="<?= base_url('admin/testimoni/hapus/' . $t['id']) ?>" class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-50 text-red-600 font-bold hover:bg-gradient-to-br hover:from-red-500 hover:to-rose-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1 tooltip" title="Hapus" onclick="return confirm('Yakin ingin menghapus testimoni ini?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (empty($testimoni_list)): ?>
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                    <i class="fas fa-comments text-4xl text-gray-300"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-900">Belum ada testimoni</h4>
                <p class="text-gray-500 text-sm mt-1">Ulasan pengunjung akan muncul di sini.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?= $this->endSection() ?>
