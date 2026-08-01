<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div data-aos="fade-down" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3 text-emerald-500"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <div class="mb-8" data-aos="fade-up">
        <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Manajemen Kategori</h3>
        <p class="text-sm text-gray-500 mt-1">Kelola kategori objek wisata</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Tambah -->
        <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-6 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-full blur-3xl -mr-16 -mt-16 z-0"></div>
                <div class="relative z-10">
                    <h4 class="font-bold text-lg text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-plus-circle text-purple-500 mr-2"></i> Tambah Kategori
                    </h4>
                    <form action="<?= base_url('admin/kategori/tambah') ?>" method="POST" class="space-y-4">
                        <?= csrf_field() ?>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Kategori</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-tag text-gray-400"></i>
                                </div>
                                <input type="text" name="nama_kategori" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all outline-none" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Ikon (Font Awesome)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-icons text-gray-400"></i>
                                </div>
                                <input type="text" name="ikon" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all outline-none" placeholder="fas fa-tree">
                            </div>
                            <p class="text-xs text-gray-500 mt-1 italic">Contoh: fas fa-tree, fas fa-water</p>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                    <i class="fas fa-align-left text-gray-400"></i>
                                </div>
                                <textarea name="deskripsi" rows="3" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all outline-none"></textarea>
                            </div>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-bold py-3 rounded-xl hover:shadow-lg hover:shadow-purple-500/30 hover:-translate-y-0.5 transition-all duration-300">
                                <i class="fas fa-plus mr-2"></i>Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar -->
        <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <h4 class="font-bold text-lg text-gray-800"><i class="fas fa-list-ul text-purple-500 mr-2"></i> Daftar Kategori</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[500px]">
                        <thead class="bg-purple-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">Ikon</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Info Kategori</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori_list as $k): ?>
                            <tr class="border-t border-gray-100 hover:bg-purple-50/30 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mx-auto text-purple-600">
                                        <i class="<?= htmlspecialchars($k['ikon'] ?? 'fas fa-tags') ?> text-lg"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-bold text-gray-800"><?= htmlspecialchars($k['nama_kategori']) ?></p>
                                    <p class="text-sm text-gray-500 mt-1 line-clamp-2"><?= htmlspecialchars($k['deskripsi']) ?></p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button onclick="openEditModal(<?= $k['id'] ?>, '<?= htmlspecialchars($k['nama_kategori'], ENT_QUOTES) ?>', '<?= htmlspecialchars($k['ikon'] ?? 'fas fa-tags', ENT_QUOTES) ?>', '<?= htmlspecialchars($k['deskripsi'], ENT_QUOTES) ?>')" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= base_url('admin/kategori/hapus/' . $k['id']) ?>" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-colors tooltip" title="Hapus" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if (empty($kategori_list)): ?>
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                        <i class="fas fa-tags text-3xl text-gray-300"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900">Belum ada kategori</h4>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
    <div id="modalEdit" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h4 class="text-lg font-bold text-gray-800"><i class="fas fa-edit text-blue-500 mr-2"></i>Edit Kategori</h4>
                <button onclick="document.getElementById('modalEdit').classList.add('hidden')" class="text-gray-400 hover:text-red-500 transition-colors w-8 h-8 flex items-center justify-center rounded-full hover:bg-red-50">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/kategori/update') ?>" method="POST" class="p-6">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="editId">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Kategori</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-gray-400"></i>
                            </div>
                            <input type="text" name="nama_kategori" id="editNama" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Ikon (Font Awesome)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-icons text-gray-400"></i>
                            </div>
                            <input type="text" name="ikon" id="editIkon" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                <i class="fas fa-align-left text-gray-400"></i>
                            </div>
                            <textarea name="deskripsi" id="editDeskripsi" rows="3" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 rounded-xl hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function openEditModal(id, nama, ikon, deskripsi) {
        document.getElementById("editId").value = id;
        document.getElementById("editNama").value = nama;
        document.getElementById("editIkon").value = ikon;
        document.getElementById("editDeskripsi").value = deskripsi;
        document.getElementById("modalEdit").classList.remove("hidden");
    }
</script>
<?= $this->endSection() ?>
