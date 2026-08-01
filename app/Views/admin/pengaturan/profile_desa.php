<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div data-aos="fade-down" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3 text-emerald-500"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8" data-aos="fade-up">
        <div>
            <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Edit Profile Desa</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi tentang desa, visi, misi, dan sejarah</p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 relative z-10">
        <?php
        $profiles = [
            ['tipe' => 'tentang', 'judul' => $tentang['judul'] ?? '', 'konten' => $tentang['konten'] ?? '', 'label' => 'Tentang Desa', 'icon' => 'fa-info-circle', 'color' => 'emerald', 'delay' => '100'],
            ['tipe' => 'visi', 'judul' => $visi['judul'] ?? '', 'konten' => $visi['konten'] ?? '', 'label' => 'Visi', 'icon' => 'fa-eye', 'color' => 'blue', 'delay' => '200'],
            ['tipe' => 'misi', 'judul' => $misi['judul'] ?? '', 'konten' => $misi['konten'] ?? '', 'label' => 'Misi', 'icon' => 'fa-bullseye', 'color' => 'indigo', 'delay' => '300'],
            ['tipe' => 'sejarah', 'judul' => $sejarah['judul'] ?? '', 'konten' => $sejarah['konten'] ?? '', 'label' => 'Sejarah', 'icon' => 'fa-history', 'color' => 'amber', 'delay' => '400']
        ];
        foreach ($profiles as $p):
        ?>
        <div class="bg-white/90 backdrop-blur-3xl rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.08)] border border-white/80 p-8 transition-all duration-500 relative overflow-hidden group transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="<?= $p['delay'] ?>">
            <!-- Premium Dynamic Backgrounds -->
            <div class="absolute -right-20 -top-20 w-48 h-48 bg-gradient-to-br from-<?= $p['color'] ?>-200/40 to-<?= $p['color'] ?>-400/10 rounded-full blur-[40px] pointer-events-none group-hover:scale-150 transition-transform duration-1000"></div>
            <div class="absolute -left-20 -bottom-20 w-48 h-48 bg-gradient-to-tr from-white to-<?= $p['color'] ?>-200/20 rounded-full blur-[40px] pointer-events-none group-hover:scale-150 transition-transform duration-1000"></div>
            
            <div class="flex items-center mb-8 relative z-10">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-<?= $p['color'] ?>-50 to-<?= $p['color'] ?>-100/50 border border-<?= $p['color'] ?>-100 text-<?= $p['color'] ?>-600 flex items-center justify-center mr-5 shadow-sm group-hover:shadow-<?= $p['color'] ?>-200/50 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/40 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    <i class="fas <?= $p['icon'] ?> text-2xl relative z-10"></i>
                </div>
                <div>
                    <h4 class="text-xl font-black text-gray-800 tracking-tight"><?= $p['label'] ?></h4>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Ubah Informasi</p>
                </div>
            </div>
            
            <form action="<?= base_url('admin/pengaturan/update_profile') ?>" method="POST" class="relative z-10">
                <?= csrf_field() ?>
                <input type="hidden" name="tipe" value="<?= $p['tipe'] ?>">
                <div class="space-y-6">
                    <div class="group/input">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 group-hover/input:text-<?= $p['color'] ?>-500 transition-colors">Judul</label>
                        <div class="relative">
                            <input type="text" name="judul" value="<?= htmlspecialchars($p['judul']) ?>" class="w-full px-5 py-4 bg-gray-50/50 border border-gray-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-<?= $p['color'] ?>-500/10 focus:border-<?= $p['color'] ?>-300 hover:border-<?= $p['color'] ?>-200 transition-all outline-none font-black text-gray-800 text-lg shadow-sm" required placeholder="Masukkan judul <?= strtolower($p['label']) ?>...">
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none opacity-0 group-hover/input:opacity-100 transition-opacity">
                                <i class="fas fa-pen text-<?= $p['color'] ?>-300 text-sm"></i>
                            </div>
                        </div>
                    </div>
                    <div class="group/textarea">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 group-hover/textarea:text-<?= $p['color'] ?>-500 transition-colors">Konten / Penjelasan</label>
                        <div class="relative">
                            <textarea name="konten" rows="5" class="w-full px-5 py-4 bg-gray-50/50 border border-gray-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-<?= $p['color'] ?>-500/10 focus:border-<?= $p['color'] ?>-300 hover:border-<?= $p['color'] ?>-200 transition-all outline-none font-medium text-gray-600 leading-relaxed custom-scrollbar shadow-sm" required placeholder="Tuliskan penjelasan lengkap di sini..."><?= htmlspecialchars($p['konten']) ?></textarea>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-<?= $p['color'] ?>-50 hover:bg-gradient-to-r hover:from-<?= $p['color'] ?>-500 hover:to-<?= $p['color'] ?>-600 text-<?= $p['color'] ?>-600 hover:text-white font-black py-4 rounded-2xl transition-all duration-500 border border-<?= $p['color'] ?>-200 hover:border-transparent flex justify-center items-center gap-2 group/btn hover:shadow-[0_10px_25px_-5px_rgba(var(--color-<?= $p['color'] ?>-500),0.4)] relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover/btn:translate-x-0 transition-transform duration-700"></div>
                            <i class="fas fa-save text-lg group-hover/btn:animate-bounce relative z-10"></i> 
                            <span class="relative z-10">Simpan <?= $p['label'] ?></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php endforeach; ?>
    </div>

<?= $this->endSection() ?>
