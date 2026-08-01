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

    <div class="mb-8" data-aos="fade-up">
        <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Manajemen Galeri</h3>
        <p class="text-sm text-gray-500 mt-1">Kelola foto-foto menarik untuk setiap objek wisata</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Tambah -->
        <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-6 overflow-hidden relative sticky top-32">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-3xl -mr-16 -mt-16 z-0"></div>
                <div class="relative z-10">
                    <h4 class="font-bold text-lg text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-cloud-upload-alt text-blue-500 mr-2"></i> Upload Foto
                    </h4>
                    <form action="<?= base_url('admin/galeri/tambah') ?>" method="POST" enctype="multipart/form-data" class="space-y-5">
                        <?= csrf_field() ?>
                        <?php
                            $selected_wisata = $id_wisata;
                            if (session()->get('role') === 'pengelola') {
                                $selected_wisata = session()->get('id_wisata');
                            }
                        ?>
                        <input type="hidden" name="id_wisata" value="<?= $selected_wisata ?>">
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Pilih Foto</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-blue-400 hover:bg-blue-50/50 transition-colors group relative cursor-pointer" id="drop-zone">
                                <div class="space-y-1 text-center" id="upload-prompt">
                                    <i class="fas fa-images text-3xl text-gray-400 group-hover:text-blue-500 mb-2 transition-colors"></i>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="foto" class="relative cursor-pointer bg-white rounded-md font-bold text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload file</span>
                                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/*" required onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">atau drag & drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                                </div>
                                <img id="preview" src="#" alt="Preview" class="hidden max-h-32 rounded-lg object-contain">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Keterangan (Opsional)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                    <i class="fas fa-align-left text-gray-400"></i>
                                </div>
                                <textarea name="keterangan" rows="3" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none text-sm" placeholder="Deskripsi singkat foto..."></textarea>
                            </div>
                        </div>
                        
                        <div class="pt-2">
                            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 rounded-xl hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5 transition-all duration-300">
                                <i class="fas fa-upload mr-2"></i>Upload Foto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Galeri Grid -->
        <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden mb-6">
                <div class="px-6 py-5 bg-gray-50/50 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <h4 class="font-bold text-lg text-gray-800"><i class="fas fa-images text-blue-500 mr-2"></i> Koleksi Foto</h4>
                    

                </div>
            </div>

            <?php if (empty($galeri_list)): ?>
            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 text-center py-16">
                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                    <i class="fas fa-image text-4xl text-gray-300"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-900">Belum ada foto</h4>
                <p class="text-gray-500 text-sm mt-1">Galeri wisata masih kosong. Silakan upload foto pertama Anda.</p>
            </div>
            <?php else: ?>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach ($galeri_list as $g): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group relative hover:shadow-md transition-shadow">
                    <div class="aspect-w-1 aspect-h-1 w-full bg-gray-200 relative overflow-hidden">
                        <img src="<?= base_url('uploads/galeri/' . $g['foto']) ?>" alt="<?= $g['keterangan'] ?>" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 translate-y-2 group-hover:translate-y-0">
                            <a href="<?= base_url('admin/galeri/hapus/' . $g['id']) ?>" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 hover:scale-110 transition-all shadow-lg tooltip" title="Hapus Foto" onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                <i class="fas fa-trash-alt text-sm"></i>
                            </a>
                        </div>
                        
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                            <span class="inline-block px-2 py-1 bg-white/20 backdrop-blur-md rounded text-[10px] font-bold text-white uppercase tracking-wider border border-white/30 mb-1">
                                <?= $g['nama_wisata'] ?>
                            </span>
                            <?php if ($g['keterangan']): ?>
                                <p class="text-white text-xs font-medium line-clamp-2"><?= $g['keterangan'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function previewImage(input) {
        const preview = document.getElementById("preview");
        const prompt = document.getElementById("upload-prompt");
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove("hidden");
                prompt.classList.add("hidden");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>
