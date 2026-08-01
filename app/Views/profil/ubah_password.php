<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <section class="pt-40 pb-24 relative overflow-hidden min-h-[80vh] flex items-center bg-cover bg-center bg-fixed" style="background-image: url('<?= base_url('assets/images/river_gazebo.png') ?>');">
        <!-- Frosted Glass Overlay -->
        <div class="absolute inset-0 bg-emerald-50/80 backdrop-blur-2xl"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-300/40 rounded-full mix-blend-multiply filter blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-300/40 rounded-full mix-blend-multiply filter blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 max-w-lg relative z-10" data-aos="zoom-in">
            <div class="bg-white/60 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.1)] p-8 md:p-12 border border-white hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.2)] transition-shadow duration-500">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-tr from-emerald-400 to-teal-400 rounded-[1.2rem] flex items-center justify-center shadow-lg shadow-emerald-500/30 text-white text-3xl mx-auto mb-6 transform rotate-3 hover:rotate-6 transition-transform duration-300">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight">Ubah Password</h2>
                    <p class="text-gray-500 font-medium mt-2">Pastikan akun Anda tetap aman</p>
                </div>
                
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="bg-red-50/80 backdrop-blur-sm border border-red-200 text-red-700 p-4 rounded-2xl mb-6 shadow-sm flex items-start">
                        <i class="fas fa-exclamation-triangle mr-3 mt-1 text-red-500"></i>
                        <div class="font-medium text-sm">
                        <?php foreach (session()->getFlashdata('errors') as $e): ?>
                            <p><?= $e ?></p>
                        <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('profil/process_ubah_password') ?>" method="POST" class="space-y-5">
                    <?= csrf_field() ?>
                    <div>
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Password Lama</label>
                        <div class="relative group/input">
                            <span class="absolute left-4 top-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors"><i class="fas fa-unlock-alt"></i></span>
                            <input type="password" name="password_lama" class="w-full pl-12 pr-4 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" placeholder="Masukkan password lama" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Password Baru</label>
                        <div class="relative group/input">
                            <span class="absolute left-4 top-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password_baru" class="w-full pl-12 pr-4 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" placeholder="Minimal 6 karakter" minlength="6" required>
                        </div>
                        <p class="text-[11px] text-gray-500 font-bold uppercase tracking-widest mt-2 ml-2">Minimal 6 karakter</p>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Konfirmasi Password Baru</label>
                        <div class="relative group/input">
                            <span class="absolute left-4 top-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors"><i class="fas fa-check-circle"></i></span>
                            <input type="password" name="password_konfirm" class="w-full pl-12 pr-4 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" placeholder="Ulangi password baru" required>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-500 text-white py-4 rounded-2xl font-black tracking-wide hover:from-emerald-400 hover:to-teal-400 focus:outline-none shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 transition-all duration-300 text-lg">
                            <i class="fas fa-key mr-2"></i> PERBARUI PASSWORD
                        </button>
                    </div>
                </form>
                <div class="mt-8 pt-6 border-t border-gray-200/50 text-center">
                    <a href="<?= base_url('profil') ?>" class="inline-flex items-center text-gray-500 hover:text-emerald-600 text-sm font-bold transition-colors">
                        <span class="w-8 h-8 rounded-full bg-white shadow-sm flex items-center justify-center mr-2 border border-gray-100"><i class="fas fa-arrow-left text-[10px]"></i></span>
                        Kembali ke Profil Saya
                    </a>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
