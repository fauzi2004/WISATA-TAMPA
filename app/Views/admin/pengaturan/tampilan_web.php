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
    
    <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-8" data-aos="fade-up">Pengaturan Tampilan Web</h3>
    
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-8 relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute -right-12 -top-12 w-32 h-32 bg-pink-50 rounded-full blur-2xl pointer-events-none"></div>
        
        <h4 class="text-xl font-extrabold mb-6 flex items-center border-b border-gray-100 pb-4 relative z-10">
            <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center mr-4">
                <i class="fas fa-image text-lg"></i>
            </div>
            Ubah Gambar Utama
        </h4>
        
        <form action="<?= base_url('admin/pengaturan/update_tampilan_web') ?>" method="POST" enctype="multipart/form-data" class="relative z-10 space-y-8">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Hero Image -->
                <div class="bg-gradient-to-b from-white to-gray-50 rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 mr-3">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <div>
                            <label class="block text-lg font-black text-gray-800">Background Utama</label>
                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider mt-0.5">Min. 1920x1080 (Landscape)</p>
                        </div>
                    </div>
                    
                    <div class="w-full aspect-video rounded-[1.5rem] overflow-hidden border-[6px] border-white shadow-md relative group bg-gray-100 mb-6">
                        <img src="<?= base_url('assets/images/river_gazebo.png') ?>?v=<?= time() ?>" alt="Background Utama Saat Ini" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <span class="text-white font-bold text-xs flex items-center"><i class="fas fa-eye mr-2 text-emerald-400"></i> Preview Hero Aktif</span>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <input type="file" name="hero_image" accept="image/png, image/jpeg, image/jpg" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="this.nextElementSibling.querySelector('span').textContent = this.files[0].name">
                        <div class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-dashed border-emerald-200 rounded-xl text-emerald-600 font-bold text-sm hover:bg-emerald-50 hover:border-emerald-300 transition-colors">
                            <i class="fas fa-upload mr-2"></i><span class="truncate">Pilih File Baru...</span>
                        </div>
                    </div>
                </div>

                <!-- Tentang Desa Image -->
                <div class="bg-gradient-to-b from-white to-gray-50 rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 mr-3">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div>
                            <label class="block text-lg font-black text-gray-800">Foto Tentang Desa</label>
                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider mt-0.5">Rasio Seimbang (Persegi/Potret)</p>
                        </div>
                    </div>
                    
                    <div class="w-full aspect-square md:aspect-video lg:aspect-square rounded-[1.5rem] overflow-hidden border-[6px] border-white shadow-md relative group bg-gray-100 mb-6 mx-auto max-w-[200px] lg:max-w-full">
                        <img src="<?= base_url('assets/images/tentang-desa.png') ?>?v=<?= time() ?>" alt="Foto Tentang Desa Saat Ini" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <span class="text-white font-bold text-xs flex items-center"><i class="fas fa-eye mr-2 text-teal-400"></i> Preview Tentang Aktif</span>
                        </div>
                    </div>
                    
                    <div class="relative max-w-sm mx-auto">
                        <input type="file" name="tentang_image" accept="image/png, image/jpeg, image/jpg" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="this.nextElementSibling.querySelector('span').textContent = this.files[0].name">
                        <div class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-dashed border-teal-200 rounded-xl text-teal-600 font-bold text-sm hover:bg-teal-50 hover:border-teal-300 transition-colors">
                            <i class="fas fa-upload mr-2"></i><span class="truncate">Pilih File Baru...</span>
                        </div>
                    </div>
                </div>

                <!-- Logo Image -->
                <div class="bg-gradient-to-b from-white to-gray-50 rounded-3xl p-6 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 mr-3">
                            <i class="fas fa-gem"></i>
                        </div>
                        <div>
                            <label class="block text-lg font-black text-gray-800">Logo Website</label>
                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider mt-0.5">Format Transparan (PNG) disarankan</p>
                        </div>
                    </div>
                    
                    <div class="w-full aspect-square rounded-[1.5rem] overflow-hidden border-[6px] border-white shadow-md relative group bg-white mb-6 mx-auto max-w-[200px] flex items-center justify-center p-4">
                        <img src="<?= base_url('assets/images/logo.png') ?>?v=<?= time() ?>" alt="Logo Saat Ini" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <span class="text-white font-bold text-xs flex items-center"><i class="fas fa-eye mr-2 text-indigo-400"></i> Preview Logo Aktif</span>
                        </div>
                    </div>
                    
                    <div class="relative max-w-sm mx-auto">
                        <input type="file" name="logo_image" accept="image/png, image/jpeg, image/jpg" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="this.nextElementSibling.querySelector('span').textContent = this.files[0].name">
                        <div class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-dashed border-indigo-200 rounded-xl text-indigo-600 font-bold text-sm hover:bg-indigo-50 hover:border-indigo-300 transition-colors">
                            <i class="fas fa-upload mr-2"></i><span class="truncate">Pilih File Baru...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold py-3 px-8 rounded-xl hover:shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-0.5 transition-all duration-300 flex justify-center items-center">
                    <i class="fas fa-cloud-upload-alt mr-2"></i>Simpan Perubahan Tampilan
                </button>
            </div>
        </form>
    </div>

<?= $this->endSection() ?>
