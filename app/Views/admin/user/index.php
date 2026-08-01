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
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8" data-aos="fade-up">
        <div>
            <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar User</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola akun wisatawan, admin, dan super admin</p>
        </div>
        <div class="mt-4 md:mt-0">
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                <i class="fas fa-user-plus mr-2 text-lg"></i>Tambah User
            </button>
        </div>
    </div>
    <div class="bg-white/90 backdrop-blur-3xl rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/80 overflow-hidden relative group/card" data-aos="fade-up" data-aos-delay="100">
        <!-- Premium Decorative Backgrounds -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-br from-emerald-200/30 to-teal-300/20 rounded-full blur-[100px] z-0 pointer-events-none group-hover/card:bg-emerald-300/30 transition-colors duration-1000"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-cyan-200/20 to-emerald-300/20 rounded-full blur-[80px] z-0 pointer-events-none"></div>

        <div class="overflow-x-auto relative z-10 p-2 md:p-6">
            <table class="w-full min-w-[900px] border-collapse" style="border-spacing: 0 10px; border-collapse: separate;">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">No</th>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Info User</th>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Akses / Role</th>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Tgl Daftar</th>
                        <th class="px-6 py-4 text-center text-[11px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody class="space-y-4">
                    <?php $no = 1; foreach ($user_list as $user): ?>
                        <tr class="bg-white hover:bg-emerald-50/50 rounded-2xl shadow-sm hover:shadow-[0_8px_30px_rgba(16,185,129,0.12)] transition-all duration-300 group/row transform hover:-translate-y-1">
                            <td class="px-6 py-5 rounded-l-2xl border-y border-l border-gray-100 group-hover/row:border-emerald-100 font-bold text-gray-400 group-hover/row:text-emerald-500 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover/row:bg-emerald-100 transition-colors">
                                    #<?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?>
                                </div>
                            </td>
                            <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                                <div class="flex items-center">
                                    <?php if (!empty($user['foto']) && $user['foto'] != 'default.png' && $user['foto'] != 'default-user.svg'): ?>
                                        <div class="h-14 w-14 rounded-[1.2rem] shadow-md mr-5 flex-shrink-0 overflow-hidden border-2 border-white transform group-hover/row:scale-110 group-hover/row:rotate-3 transition-all duration-500">
                                            <img src="<?= base_url('uploads/profil/' . $user['foto']) ?>" alt="Foto" class="w-full h-full object-cover">
                                        </div>
                                    <?php else: ?>
                                        <div class="h-14 w-14 rounded-[1.2rem] bg-gradient-to-br from-emerald-400 to-teal-500 text-white flex items-center justify-center font-black text-2xl shadow-md mr-5 flex-shrink-0 border-2 border-white transform group-hover/row:scale-110 group-hover/row:-rotate-3 transition-all duration-500 relative overflow-hidden">
                                            <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover/row:translate-x-0 transition-transform duration-500"></div>
                                            <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="font-black text-gray-800 text-base group-hover/row:text-emerald-600 transition-colors tracking-tight"><?= $user['nama'] ?></p>
                                        <p class="text-sm text-gray-500 mb-1 font-medium"><?= $user['email'] ?></p>
                                        <div class="inline-flex items-center px-2.5 py-1 rounded-full bg-gray-50 border border-gray-100 group-hover/row:bg-white group-hover/row:border-emerald-100 transition-colors">
                                            <i class="fas fa-phone-alt text-[10px] text-emerald-500 mr-1.5"></i>
                                            <span class="text-xs text-gray-600 font-bold"><?= $user['no_telp'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors w-64">
                                <form action="<?= base_url('admin/user/update_role') ?>" method="POST" class="flex flex-col gap-2 relative z-20">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <div class="relative group/select">
                                        <?php 
                                            $roleColor = 'emerald';
                                            $roleIcon = 'user';
                                            if($user['role'] == 'admin') { $roleColor = 'blue'; $roleIcon = 'crown'; }
                                            elseif($user['role'] == 'pengelola') { $roleColor = 'indigo'; $roleIcon = 'user-tie'; }
                                        ?>
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none z-10 text-<?= $roleColor ?>-500 transition-transform group-hover/select:scale-110 duration-300">
                                            <i class="fas fa-<?= $roleIcon ?> text-[13px]"></i>
                                        </div>
                                        <select name="role" class="w-full pl-10 pr-8 py-2.5 bg-<?= $roleColor ?>-50/50 hover:bg-<?= $roleColor ?>-50 border border-<?= $roleColor ?>-100 rounded-xl text-sm font-black text-<?= $roleColor ?>-700 focus:ring-4 focus:ring-<?= $roleColor ?>-500/20 focus:border-<?= $roleColor ?>-400 role-select transition-all duration-300 outline-none appearance-none cursor-pointer shadow-sm group-hover/select:shadow-md">
                                            <option value="pengunjung" <?= $user['role'] == 'pengunjung' ? 'selected' : '' ?>>Wisatawan</option>
                                            <option value="pengelola" <?= $user['role'] == 'pengelola' ? 'selected' : '' ?>>Admin</option>
                                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Super Admin</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none z-10">
                                            <i class="fas fa-chevron-down text-<?= $roleColor ?>-500/70 text-[10px] transition-transform group-hover/select:translate-y-0.5 duration-300"></i>
                                        </div>
                                    </div>
                                    <div class="relative group/select wisata-select <?= $user['role'] == 'pengelola' ? '' : 'hidden' ?>">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none z-10 text-amber-500 transition-transform group-hover/select:scale-110 duration-300">
                                            <i class="fas fa-map-marker-alt text-[13px]"></i>
                                        </div>
                                        <select name="id_wisata" class="w-full pl-10 pr-8 py-2.5 bg-amber-50/50 hover:bg-amber-50 border border-amber-100 rounded-xl text-sm font-black text-amber-700 focus:ring-4 focus:ring-amber-500/20 focus:border-amber-400 transition-all duration-300 outline-none appearance-none cursor-pointer shadow-sm group-hover/select:shadow-md">
                                            <option value="">- Pilih Wisata -</option>
                                            <?php foreach ($wisata_list as $w): ?>
                                                <option value="<?= $w['id'] ?>" <?= $user['id_wisata'] == $w['id'] ? 'selected' : '' ?>><?= $w['nama_wisata'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="w-full bg-gray-50 hover:bg-gradient-to-r hover:from-emerald-500 hover:to-teal-500 text-gray-500 hover:text-white text-xs font-black px-3 py-2 rounded-xl transition-all duration-300 border border-gray-200 hover:border-transparent flex items-center justify-center gap-1.5 group/btn hover:shadow-[0_8px_20px_-3px_rgba(16,185,129,0.3)] opacity-0 group-hover/row:opacity-100 translate-y-2 group-hover/row:translate-y-0 absolute -bottom-10 left-0">
                                        <i class="fas fa-save group-hover/btn:animate-bounce"></i> Update Role
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                                <div class="inline-flex flex-col">
                                    <span class="text-sm font-bold text-gray-700"><?= date('d M Y', strtotime($user['created_at'])) ?></span>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider"><?= date('H:i', strtotime($user['created_at'])) ?> WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 rounded-r-2xl border-y border-r border-gray-100 group-hover/row:border-emerald-100 transition-colors text-center">
                                <div class="flex justify-center items-center space-x-3">
                                    <button onclick="openResetModal(<?= $user['id'] ?>, '<?= htmlspecialchars($user['nama'], ENT_QUOTES) ?>')" class="relative flex items-center justify-center w-11 h-11 rounded-[1rem] bg-amber-50 text-amber-500 border border-amber-100 hover:bg-amber-500 hover:text-white hover:shadow-[0_8px_20px_rgba(245,158,11,0.4)] hover:-translate-y-1 transition-all duration-300 group/action overflow-hidden" title="Reset Password">
                                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover/action:translate-x-0 transition-transform duration-500"></div>
                                        <i class="fas fa-key text-lg group-hover/action:animate-pulse relative z-10"></i>
                                    </button>
                                    <?php if ($user['id'] != session()->get('user_id')): ?>
                                    <a href="<?= base_url('admin/user/hapus/' . $user['id']) ?>" class="relative flex items-center justify-center w-11 h-11 rounded-[1rem] bg-rose-50 text-rose-500 border border-rose-100 hover:bg-rose-500 hover:text-white hover:shadow-[0_8px_20px_rgba(244,63,94,0.4)] hover:-translate-y-1 transition-all duration-300 group/action overflow-hidden" title="Hapus User" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover/action:translate-x-0 transition-transform duration-500"></div>
                                        <i class="fas fa-trash-alt text-lg relative z-10"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah User -->
    <div id="modalTambah" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h4 class="text-lg font-bold text-gray-800"><i class="fas fa-user-plus text-emerald-500 mr-2"></i>Tambah User Baru</h4>
                <button onclick="document.getElementById('modalTambah').classList.add('hidden')" class="text-gray-400 hover:text-red-500 transition-colors w-8 h-8 flex items-center justify-center rounded-full hover:bg-red-50">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/user/tambah') ?>" method="POST" class="p-6">
                <?= csrf_field() ?>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="nama" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none" required minlength="6">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">No. WhatsApp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fab fa-whatsapp text-gray-400"></i>
                            </div>
                            <input type="text" name="no_telp" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Role Akun</label>
                        <select name="role" id="roleTambah" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none font-medium text-gray-700">
                            <option value="pengunjung">Wisatawan</option>
                            <option value="pengelola">Admin</option>
                            <option value="admin">Super Admin</option>
                        </select>
                    </div>
                    <div class="hidden" id="wisataTambahContainer">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tugaskan ke Wisata</label>
                        <select name="id_wisata" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none font-medium text-gray-700">
                            <option value="">- Pilih Wisata -</option>
                            <?php foreach ($wisata_list as $w): ?>
                                <option value="<?= $w['id'] ?>"><?= $w['nama_wisata'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold py-3 rounded-xl hover:shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        <i class="fas fa-save mr-2"></i>Simpan User Baru
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Reset Password -->
    <div id="modalReset" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h4 class="text-lg font-bold text-gray-800"><i class="fas fa-key text-amber-500 mr-2"></i>Reset Password</h4>
                <button onclick="document.getElementById('modalReset').classList.add('hidden')" class="text-gray-400 hover:text-red-500 transition-colors w-8 h-8 flex items-center justify-center rounded-full hover:bg-red-50">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/user/reset_password') ?>" method="POST" class="p-6">
                <?= csrf_field() ?>
                <input type="hidden" name="user_id" id="resetUserId">
                <p class="text-sm text-gray-500 mb-4">Reset password untuk user: <span id="resetNama" class="font-bold text-gray-800"></span></p>
                
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Password Baru</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none" required minlength="6">
                    </div>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-orange-500 text-white font-bold py-3 rounded-xl hover:shadow-lg hover:shadow-amber-500/30 hover:-translate-y-0.5 transition-all duration-300">
                    <i class="fas fa-check-circle mr-2"></i>Simpan Password Baru
                </button>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function openResetModal(id, nama) {
        document.getElementById("resetUserId").value = id;
        document.getElementById("resetNama").textContent = nama;
        document.getElementById("modalReset").classList.remove("hidden");
    }

    // Toggle dropdown wisata di form tambah
    document.getElementById('roleTambah').addEventListener('change', function() {
        var container = document.getElementById('wisataTambahContainer');
        if (this.value === 'pengelola') {
            container.classList.remove('hidden');
            container.querySelector('select').setAttribute('required', 'required');
        } else {
            container.classList.add('hidden');
            container.querySelector('select').removeAttribute('required');
        }
    });

    // Toggle dropdown wisata di tabel
    document.querySelectorAll('.role-select').forEach(function(select) {
        select.addEventListener('change', function() {
            var wisataSelect = this.nextElementSibling;
            if (this.value === 'pengelola') {
                wisataSelect.classList.remove('hidden');
            } else {
                wisataSelect.classList.add('hidden');
            }
        });
    });
</script>
<?= $this->endSection() ?>
