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

    <div class="mb-10 relative" data-aos="fade-up">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-20 w-32 h-32 bg-teal-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10">
            <h3 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-800 tracking-tight drop-shadow-sm">Profil Saya</h3>
            <p class="text-gray-500 font-medium mt-2 text-lg">Kelola informasi pribadi dan keamanan akun Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Kartu Foto Profil -->
        <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 p-8 relative overflow-hidden group/card flex flex-col items-center text-center">
                <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-emerald-200/40 to-teal-200/40 rounded-full blur-3xl -mr-20 -mt-20 z-0 transition-transform duration-1000 group-hover/card:scale-[2]"></div>
                
                <div class="relative z-10 w-40 h-40 mt-4 mb-6">
                    <div class="absolute inset-0 bg-gradient-to-tr from-emerald-400 to-teal-500 rounded-full blur-md opacity-40 group-hover/card:opacity-60 transition-opacity duration-500"></div>
                    <div class="relative w-full h-full rounded-full border-4 border-white shadow-xl overflow-hidden bg-white flex items-center justify-center text-emerald-200">
                        <?php if ($user['foto'] && $user['foto'] != 'default.png' && $user['foto'] != 'default-user.svg'): ?>
                            <img id="previewFoto" src="<?= base_url('uploads/profil/' . $user['foto']) ?>" alt="Foto Profil" class="w-full h-full object-cover">
                        <?php else: ?>
                            <img id="previewFoto" src="" class="hidden w-full h-full object-cover">
                            <i id="defaultFotoIcon" class="fas fa-user-astronaut text-6xl text-emerald-500"></i>
                        <?php endif; ?>
                    </div>
                </div>
                
                <h4 class="text-2xl font-black text-gray-800 tracking-tight mb-1"><?= esc($user['nama']) ?></h4>
                <p class="text-xs font-bold text-emerald-500 uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100 inline-block">
                    <?= $user['role'] == 'pengelola' ? 'Admin Wisata' : 'Super Admin' ?>
                </p>
            </div>
        </div>

        <!-- Form Edit Profil -->
        <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 p-8 md:p-10 relative overflow-hidden group/form">
                <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-emerald-200/40 to-teal-200/40 rounded-full blur-3xl -mr-20 -mt-20 z-0 transition-transform duration-1000 group-hover/form:scale-[2]"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-amber-200/20 to-orange-200/20 rounded-full blur-3xl -ml-10 -mb-10 z-0 transition-transform duration-1000 group-hover/form:scale-[2]"></div>
                
                <div class="relative z-10">
                    <h4 class="font-black text-xl text-gray-800 mb-8 flex items-center border-b border-gray-200/50 pb-5">
                        <div class="w-12 h-12 rounded-[1.2rem] bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 mr-4 transform -rotate-3">
                            <i class="fas fa-user-edit text-lg"></i>
                        </div>
                        Edit Informasi Profil
                    </h4>
                    
                    <form action="<?= base_url('admin/profil/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <?= csrf_field() ?>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="nama" value="<?= esc($user['nama']) ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none" required>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Email Login</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" value="<?= esc($user['email']) ?>" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none" required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Ganti Password</label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input type="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengganti password" class="w-full pl-12 pr-4 py-3.5 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all font-bold text-gray-800 outline-none placeholder:font-normal placeholder:text-gray-400">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Ubah Foto Profil</label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within/input:text-emerald-500 text-gray-400">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <input type="file" name="foto" id="fotoInput" accept="image/*" class="w-full pl-12 pr-4 py-3 bg-white/80 border-2 border-white shadow-[0_4px_15px_rgba(0,0,0,0.02)] rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-400 transition-all text-sm font-bold text-gray-700 outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                            </div>
                            <p class="text-[10px] font-bold text-gray-400 mt-2 ml-1">* Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                        </div>

                        <div class="pt-6 border-t border-gray-100">
                            <button type="submit" class="relative group/btn inline-flex items-center justify-center w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-black rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_30px_rgba(16,185,129,0.4)] hover:-translate-y-1 transition-all duration-300">
                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300 ease-out"></div>
                                <i class="fas fa-save mr-2 relative z-10 group-hover/btn:scale-110 transition-transform"></i>
                                <span class="relative z-10">Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('fotoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('previewFoto');
                    const icon = document.getElementById('defaultFotoIcon');
                    
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    
                    if(icon) {
                        icon.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

<?= $this->endSection() ?>
