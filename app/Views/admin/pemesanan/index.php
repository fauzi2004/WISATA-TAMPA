<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div data-aos="fade-down" class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3 text-emerald-500"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 relative z-50" data-aos="fade-up">
        <div>
            <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Pemesanan</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola semua pesanan tiket wisata dari pengunjung</p>
        </div>
        <div class="mt-4 md:mt-0 relative z-[100] flex flex-col md:flex-row gap-4 items-center w-full md:w-auto">
            <!-- Form Pencarian Premium -->
            <form action="" method="GET" class="relative w-full md:w-auto group/search">
                <?php if(isset($_GET['status'])): ?>
                    <input type="hidden" name="status" value="<?= esc($_GET['status']) ?>">
                <?php endif; ?>
                <div class="relative flex items-center">
                    <input type="text" name="search" value="<?= esc($_GET['search'] ?? '') ?>" placeholder="Cari kode booking, nama..." 
                           class="peer pl-12 pr-12 py-3 w-full md:w-80 rounded-full border-2 border-emerald-100/80 bg-white/80 backdrop-blur-xl text-sm font-bold text-gray-700 placeholder-gray-400 focus:outline-none focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-500/20 shadow-[0_4px_15px_-3px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_25px_-5px_rgba(16,185,129,0.15)] hover:border-emerald-300 transition-all duration-500">
                    
                    <!-- Search Icon with animation -->
                    <div class="absolute left-4 flex items-center justify-center text-gray-400 peer-focus:text-emerald-500 peer-focus:scale-110 transition-all duration-500">
                        <i class="fas fa-search text-[15px]"></i>
                    </div>

                    <!-- Submit Arrow Button (appears on hover/focus) -->
                    <button type="submit" class="absolute right-2 w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-r from-emerald-400 to-teal-500 text-white shadow-md shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:scale-105 opacity-0 invisible peer-focus:opacity-100 peer-focus:visible peer-focus:-translate-x-1 hover:opacity-100 hover:visible hover:-translate-x-1 transition-all duration-500 cursor-pointer border border-emerald-200">
                        <i class="fas fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </form>
            
            <div class="relative inline-block text-left w-full md:w-auto" id="statusDropdownWrapper">
                <button type="button" class="inline-flex justify-between items-center w-full md:w-60 rounded-full border-2 border-emerald-100/80 shadow-[0_4px_15px_-3px_rgba(0,0,0,0.05)] px-5 py-3 bg-white/80 backdrop-blur-xl text-sm font-bold text-gray-700 hover:bg-white hover:shadow-[0_8px_25px_-5px_rgba(16,185,129,0.15)] hover:border-emerald-300 focus:outline-none focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-500 group" id="status-menu-button" aria-expanded="false" aria-haspopup="true">
                    <div class="flex items-center">
                        <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3 group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                            <i class="fas fa-filter text-xs"></i>
                        </div>
                        <span id="status-selected-text">Semua Status</span>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-xs ml-2 transition-transform duration-300" id="status-chevron"></i>
                </button>

                <div class="origin-top-right absolute right-0 mt-3 w-60 rounded-2xl shadow-[0_15px_40px_-15px_rgba(0,0,0,0.15)] bg-white/95 backdrop-blur-2xl ring-1 ring-black ring-opacity-5 divide-y divide-gray-50 focus:outline-none hidden transform opacity-0 scale-95 transition-all duration-200 z-[100]" role="menu" aria-orientation="vertical" aria-labelledby="status-menu-button" tabindex="-1" id="status-menu-dropdown">
                    <?php $searchQuery = isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>
                    <div class="p-2 space-y-1" role="none">
                        <a href="?status=<?= $searchQuery ?>" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-4 py-2.5 text-sm rounded-xl transition-all cursor-pointer <?= empty($_GET['status']) ? 'bg-gray-50 font-bold' : 'font-medium' ?>" role="menuitem">
                            <div class="w-8 flex justify-center"><i class="fas fa-globe text-gray-400 group-hover:text-gray-600 transition-colors <?= empty($_GET['status']) ? 'text-gray-600' : '' ?>"></i></div>
                            <span>Semua Status</span>
                        </a>
                        <a href="?status=lunas<?= $searchQuery ?>" class="text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 group flex items-center px-4 py-2.5 text-sm rounded-xl transition-all cursor-pointer <?= (isset($_GET['status']) && $_GET['status'] == 'lunas') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'font-medium' ?>" role="menuitem">
                            <div class="w-8 flex justify-center"><i class="fas fa-check-circle text-emerald-400 group-hover:text-emerald-500 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'lunas') ? 'text-emerald-600' : '' ?>"></i></div>
                            <span>Lunas</span>
                        </a>
                        <a href="?status=menunggu_pembayaran<?= $searchQuery ?>" class="text-gray-600 hover:bg-amber-50 hover:text-amber-700 group flex items-center px-4 py-2.5 text-sm rounded-xl transition-all cursor-pointer <?= (isset($_GET['status']) && $_GET['status'] == 'menunggu_pembayaran') ? 'bg-amber-50 text-amber-700 font-bold' : 'font-medium' ?>" role="menuitem">
                            <div class="w-8 flex justify-center"><i class="fas fa-clock text-amber-400 group-hover:text-amber-500 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'menunggu_pembayaran') ? 'text-amber-600' : '' ?>"></i></div>
                            <span>Menunggu Pembayaran</span>
                        </a>
                        <a href="?status=menunggu_konfirmasi<?= $searchQuery ?>" class="text-gray-600 hover:bg-blue-50 hover:text-blue-700 group flex items-center px-4 py-2.5 text-sm rounded-xl transition-all cursor-pointer <?= (isset($_GET['status']) && $_GET['status'] == 'menunggu_konfirmasi') ? 'bg-blue-50 text-blue-700 font-bold' : 'font-medium' ?>" role="menuitem">
                            <div class="w-8 flex justify-center"><i class="fas fa-spinner text-blue-400 group-hover:text-blue-500 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'menunggu_konfirmasi') ? 'text-blue-600' : '' ?>"></i></div>
                            <span>Menunggu Konfirmasi</span>
                        </a>
                        <a href="?status=ditolak<?= $searchQuery ?>" class="text-gray-600 hover:bg-red-50 hover:text-red-700 group flex items-center px-4 py-2.5 text-sm rounded-xl transition-all cursor-pointer <?= (isset($_GET['status']) && $_GET['status'] == 'ditolak') ? 'bg-red-50 text-red-700 font-bold' : 'font-medium' ?>" role="menuitem">
                            <div class="w-8 flex justify-center"><i class="fas fa-times-circle text-red-400 group-hover:text-red-500 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'ditolak') ? 'text-red-600' : '' ?>"></i></div>
                            <span>Ditolak / Dibatalkan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white/90 backdrop-blur-3xl rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/80 overflow-hidden relative group/card" data-aos="fade-up" data-aos-delay="100">
        <!-- Dekorasi Background Tabel -->
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-emerald-200/50 to-teal-300/40 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/card:scale-125 pointer-events-none"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-amber-200/30 to-orange-300/30 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/card:scale-125 pointer-events-none"></div>
        
        <div class="relative z-10 overflow-x-auto custom-scrollbar p-2 md:p-6">
            <table class="w-full min-w-[1100px] border-collapse" style="border-spacing: 0 10px; border-collapse: separate;">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Kode Booking</th>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Pemesan</th>
                        <?php if (session()->get('role') === 'admin'): ?>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Wisata</th>
                        <?php endif; ?>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Tanggal</th>
                        <th class="px-6 py-4 text-center text-[11px] font-black text-gray-400 uppercase tracking-widest">Tiket</th>
                        <?php if (session()->get('role') !== 'admin'): ?>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Total Harga</th>
                        <?php endif; ?>
                        <th class="px-6 py-4 text-left text-[11px] font-black text-gray-400 uppercase tracking-widest">Status Bayar</th>
                        <?php if (session()->get('role') !== 'admin'): ?>
                        <th class="px-6 py-4 text-center text-[11px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="space-y-4">
                    <?php foreach ($pemesanan as $p): ?>
                    <tr class="bg-white hover:bg-emerald-50/50 rounded-2xl shadow-sm hover:shadow-[0_8px_30px_rgba(16,185,129,0.12)] transition-all duration-300 group/row transform hover:-translate-y-1">
                        <td class="px-6 py-5 rounded-l-2xl border-y border-l border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 text-gray-500 font-mono text-sm font-bold tracking-wide group-hover/row:bg-emerald-100 group-hover/row:text-emerald-700 transition-colors">
                                <i class="fas fa-hashtag text-[10px] opacity-70"></i><?= $p['kode_booking'] ?>
                            </div>
                        </td>
                        <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                            <div class="flex items-center gap-4">
                                <?php if (!empty($p['foto_user']) && $p['foto_user'] != 'default.png' && $p['foto_user'] != 'default-user.svg'): ?>
                                    <div class="h-12 w-12 rounded-[1rem] shadow-sm overflow-hidden border-2 border-white group-hover/row:scale-110 group-hover/row:rotate-3 group-hover/row:shadow-md transition-all duration-500">
                                        <img src="<?= base_url('uploads/profil/' . $p['foto_user']) ?>" alt="Profile" class="w-full h-full object-cover">
                                    </div>
                                <?php else: ?>
                                    <div class="h-12 w-12 rounded-[1rem] bg-gradient-to-br from-blue-400 to-indigo-500 text-white flex items-center justify-center font-black text-lg shadow-sm border-2 border-white group-hover/row:scale-110 group-hover/row:-rotate-3 group-hover/row:shadow-md transition-all duration-500 relative overflow-hidden">
                                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover/row:translate-x-0 transition-transform duration-500"></div>
                                        <?= strtoupper(substr($p['nama_user'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h4 class="font-black text-gray-800 text-base group-hover/row:text-emerald-600 transition-colors tracking-tight"><?= $p['nama_user'] ?></h4>
                                </div>
                            </div>
                        </td>
                        <?php if (session()->get('role') === 'admin'): ?>
                        <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover/row:bg-emerald-50 group-hover/row:text-emerald-500 transition-colors"><i class="fas fa-map-marker-alt text-[11px]"></i></div>
                                <span class="font-bold text-gray-600 text-sm group-hover/row:text-gray-800 transition-colors"><?= $p['nama_wisata'] ?></span>
                            </div>
                        </td>
                        <?php endif; ?>
                        <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-[10px] bg-blue-50/50 group-hover/row:bg-blue-100 flex items-center justify-center text-blue-400 group-hover/row:text-blue-600 transition-colors"><i class="fas fa-calendar-alt text-xs"></i></div>
                                <p class="text-sm text-gray-600 font-bold group-hover/row:text-blue-900 transition-colors"><?= date('d M Y', strtotime($p['tanggal_kunjungan'])) ?></p>
                            </div>
                        </td>
                        <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors text-center">
                            <div class="inline-flex items-center gap-2 bg-gray-50 group-hover/row:bg-indigo-50 border border-gray-100 group-hover/row:border-indigo-100 text-gray-600 group-hover/row:text-indigo-700 font-black px-4 py-1.5 rounded-full text-sm shadow-sm transition-all duration-300">
                                <?= $p['jumlah_tiket'] ?> <i class="fas fa-ticket-alt opacity-50 text-[10px] group-hover/row:opacity-100 transition-opacity"></i>
                            </div>
                        </td>
                        <?php if (session()->get('role') !== 'admin'): ?>
                        <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                            <div class="flex items-center text-base text-gray-600 group-hover/row:text-emerald-700 bg-gray-50 group-hover/row:bg-emerald-50 px-3 py-1.5 rounded-xl border border-gray-100 group-hover/row:border-emerald-200 transition-colors w-max">
                                <span class="text-[9px] font-black mr-2 px-1.5 py-0.5 bg-gray-300 group-hover/row:bg-emerald-500 text-white rounded-[4px] uppercase tracking-wider transition-colors">IDR</span>
                                <span class="font-bold tracking-tight"><?= number_format($p['total_harga'], 0, ',', '.') ?></span>
                            </div>
                        </td>
                        <?php endif; ?>
                        <td class="px-6 py-5 border-y border-gray-100 group-hover/row:border-emerald-100 transition-colors">
                            <?php 
                                $statusClass = '';
                                $statusIcon = '';
                                $statusText = str_replace('_', ' ', $p['status_pembayaran']);
                                switch($p['status_pembayaran']) {
                                    case 'lunas': 
                                        $statusClass = 'from-emerald-400 to-teal-500 shadow-emerald-500/30'; 
                                        $statusIcon = 'fa-check-circle';
                                        break;
                                    case 'menunggu_pembayaran': 
                                    case 'belum_bayar':
                                        $statusClass = 'from-amber-400 to-orange-500 shadow-amber-500/30'; 
                                        $statusIcon = 'fa-clock';
                                        break;
                                    case 'menunggu_konfirmasi': 
                                        $statusClass = 'from-blue-400 to-indigo-500 shadow-blue-500/30'; 
                                        $statusIcon = 'fa-spinner fa-spin';
                                        break;
                                    case 'ditolak': 
                                    case 'dibatalkan': 
                                        $statusClass = 'from-red-400 to-rose-500 shadow-red-500/30'; 
                                        $statusIcon = 'fa-times-circle';
                                        break;
                                    default:
                                        $statusClass = 'from-gray-400 to-slate-500 shadow-gray-500/30';
                                        $statusIcon = 'fa-info-circle';
                                }
                            ?>
                            <div class="inline-flex items-center px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest text-white bg-gradient-to-r <?= $statusClass ?> shadow-md group-hover/row:shadow-lg transform group-hover/row:scale-105 transition-all duration-300 cursor-default">
                                <i class="fas <?= $statusIcon ?> mr-1.5 text-[11px]"></i>
                                <?= ucwords($statusText) ?>
                            </div>
                        </td>
                        <?php if (session()->get('role') !== 'admin'): ?>
                        <td class="px-6 py-5 rounded-r-2xl border-y border-r border-gray-100 group-hover/row:border-emerald-100 transition-colors text-center">
                            <a href="<?= base_url('admin/pemesanan/detail/' . $p['id']) ?>" class="group/action relative inline-flex items-center justify-center w-11 h-11 bg-emerald-50 text-emerald-500 border border-emerald-100 hover:bg-emerald-500 hover:text-white rounded-[1rem] overflow-hidden shadow-sm hover:shadow-[0_8px_20px_rgba(16,185,129,0.4)] hover:-translate-y-1 transition-all duration-300 tooltip" title="Lihat Detail Pesanan">
                                <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover/action:translate-x-0 transition-transform duration-500"></div>
                                <i class="fas fa-chevron-right relative z-10 transition-transform group-hover/action:translate-x-0.5"></i> 
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php if (empty($pemesanan)): ?>
        <div class="text-center py-16 border-t border-gray-100 relative z-10">
            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100 shadow-sm">
                <i class="fas fa-ticket-alt text-4xl text-gray-300"></i>
            </div>
            <h4 class="text-lg font-bold text-gray-900">Belum ada pemesanan</h4>
            <p class="text-gray-500 text-sm mt-1">Data pemesanan akan muncul di sini setelah pengunjung memesan tiket.</p>
        </div>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('status-menu-button');
    const dropdown = document.getElementById('status-menu-dropdown');
    const chevron = document.getElementById('status-chevron');
    const textEl = document.getElementById('status-selected-text');
    
    // Set selected text based on URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const statusTextMap = {
        'lunas': 'Lunas',
        'menunggu_pembayaran': 'Menunggu Pembayaran',
        'menunggu_konfirmasi': 'Menunggu Konfirmasi',
        'ditolak': 'Ditolak / Dibatalkan'
    };
    
    if (status && statusTextMap[status]) {
        textEl.innerText = statusTextMap[status];
    }
    
    if(btn && dropdown) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isHidden = dropdown.classList.contains('hidden');
            if(isHidden) {
                dropdown.classList.remove('hidden');
                // trigger reflow
                void dropdown.offsetWidth;
                dropdown.classList.remove('opacity-0', 'scale-95');
                dropdown.classList.add('opacity-100', 'scale-100');
                chevron.classList.add('rotate-180');
            } else {
                dropdown.classList.add('opacity-0', 'scale-95');
                dropdown.classList.remove('opacity-100', 'scale-100');
                chevron.classList.remove('rotate-180');
                setTimeout(() => dropdown.classList.add('hidden'), 200);
            }
        });

        document.addEventListener('click', function(e) {
            if (!btn.contains(e.target) && !dropdown.contains(e.target) && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('opacity-0', 'scale-95');
                dropdown.classList.remove('opacity-100', 'scale-100');
                chevron.classList.remove('rotate-180');
                setTimeout(() => dropdown.classList.add('hidden'), 200);
            }
        });
    }
});
</script>
<?= $this->endSection() ?>
