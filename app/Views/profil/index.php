<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <section class="pt-40 pb-24 relative overflow-hidden min-h-[80vh] bg-cover bg-center bg-fixed" style="background-image: url('<?= base_url('assets/images/river_gazebo.png') ?>');">
        <!-- Frosted Glass Overlay -->
        <div class="absolute inset-0 bg-emerald-50/80 backdrop-blur-2xl"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-300/40 rounded-full mix-blend-multiply filter blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-300/40 rounded-full mix-blend-multiply filter blur-3xl pointer-events-none"></div>
        
        <div class="container mx-auto px-4 max-w-3xl relative z-10" data-aos="fade-up">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl mb-8 shadow-sm flex items-center">
                    <i class="fas fa-check-circle mr-3 text-emerald-500 text-xl"></i>
                    <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-8 shadow-sm flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-red-500 text-xl"></i>
                    <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>
            
            <div class="bg-white/60 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.1)] p-8 md:p-14 border border-white hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.2)] transition-shadow duration-500">
                
                <form action="<?= base_url('profil/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>
                
                <div class="flex flex-col sm:flex-row items-center space-y-5 sm:space-y-0 sm:space-x-8 mb-10 pb-10 border-b border-gray-200/50">
                    <div class="relative group cursor-pointer transform hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-tr from-emerald-400 to-teal-400 rounded-full blur opacity-40 group-hover:opacity-60 transition-opacity"></div>
                        <img src="<?= base_url('uploads/profil/' . $user['foto']) ?>" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-xl relative z-10" id="preview-foto" onerror="this.src='<?= base_url('assets/images/default-user.svg') ?>'">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/40 rounded-full relative z-20 -mt-32">
                            <i class="fas fa-camera text-white text-3xl drop-shadow-lg"></i>
                        </div>
                        <input type="file" name="foto" id="foto-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-30" accept="image/*" onchange="previewImage(this)">
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-4xl font-black text-gray-900 tracking-tight">Profil Saya</h2>
                        <p class="text-gray-500 font-medium mt-2 text-lg">Kelola informasi data diri dan foto profil Anda</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Nama Lengkap</label>
                        <div class="relative group/input">
                            <span class="absolute left-4 top-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors"><i class="fas fa-user"></i></span>
                            <input type="text" name="nama" value="<?= $user["nama"] ?>" class="w-full pl-12 pr-4 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Email</label>
                        <div class="relative group/input">
                            <span class="absolute left-4 top-4 text-emerald-400"><i class="fas fa-envelope"></i></span>
                            <input type="email" value="<?= $user["email"] ?>" class="w-full pl-12 pr-4 py-4 bg-gray-100/50 border border-gray-200/50 rounded-2xl text-gray-500 cursor-not-allowed font-bold" disabled>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Nomor Telepon</label>
                        <div class="relative group/input">
                            <span class="absolute left-4 top-4 text-gray-400 group-focus-within/input:text-emerald-500 transition-colors"><i class="fas fa-phone"></i></span>
                            <input type="text" name="no_telp" value="<?= $user["no_telp"] ?>" class="w-full pl-12 pr-4 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2 font-bold ml-1">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full px-4 py-4 bg-white/70 border border-white shadow-sm rounded-2xl focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-bold text-gray-800 outline-none"><?= $user["alamat"] ?></textarea>
                    </div>

                </div>
                    
                    <div class="pt-8 flex flex-col sm:flex-row gap-5">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-6 py-4 rounded-2xl hover:from-emerald-400 hover:to-teal-400 shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 font-black text-center transition-all duration-300 tracking-wide text-lg">
                            <i class="fas fa-save mr-2"></i> SIMPAN PERUBAHAN
                        </button>
                        <a href="<?= base_url('profil/ubah_password') ?>" class="flex-1 bg-white border-2 border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl hover:bg-emerald-50 hover:border-emerald-200 font-bold text-center transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1 text-lg">
                            <i class="fas fa-key mr-2"></i> Ubah Password
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-foto').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>
