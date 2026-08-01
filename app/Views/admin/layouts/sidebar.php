<?php
$current_url = uri_string();
$panelName = 'Tampa<span class="text-emerald-400">Panel</span>';
$panelLogo = base_url('assets/images/logo.png');
$isPengelola = session()->get('role') == 'pengelola';
if ($isPengelola) {
    $db = \Config\Database::connect();
    $wisataSidebar = $db->table('objek_wisata')->select('nama_wisata, gambar')->where('id', session()->get('id_wisata'))->get()->getRowArray();
    if ($wisataSidebar) {
        $panelName = esc($wisataSidebar['nama_wisata']);
        if (!empty($wisataSidebar['gambar'])) {
            $panelLogo = base_url('uploads/wisata/' . $wisataSidebar['gambar']);
        }
    }
}
?>
<aside id="sidebar" class="bg-gradient-to-b from-gray-900 to-emerald-950 text-white w-64 h-screen fixed left-0 top-0 overflow-y-auto shadow-[4px_0_24px_rgba(0,0,0,0.15)] z-[100] border-r border-emerald-800/30 -translate-x-full md:translate-x-0 transition-transform duration-300">
    <div class="p-6">
        <a href="<?= base_url('admin') ?>" class="flex items-center space-x-4 mb-10 p-2 rounded-xl hover:bg-white/5 transition-all duration-300 group">
            <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-lg p-0.5 overflow-hidden shrink-0 group-hover:scale-105 transition-transform duration-300">
                <img src="<?= $panelLogo ?>?v=<?= time() ?>" alt="Logo" class="w-full h-full object-cover rounded-xl bg-white">
            </div>
            <div class="<?= $isPengelola ? 'max-w-[140px]' : '' ?>">
                <span class="text-xl font-black tracking-tight text-white drop-shadow-sm block truncate" title="<?= strip_tags($panelName) ?>"><?= $panelName ?></span>
                <span class="block text-[10px] text-emerald-200/80 font-bold uppercase tracking-widest mt-0.5"><?= session()->get('role') == 'pengelola' ? 'Admin' : 'Super Admin' ?></span>
            </div>
        </a>

        <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 px-2">Menu Utama</div>
        <nav class="space-y-1.5">
            <a href="<?= base_url('admin') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= $current_url == 'admin' ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-layer-group w-6 text-center text-lg <?= $current_url == 'admin' ? 'text-emerald-400' : 'group-hover:text-emerald-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Dashboard</span>
            </a>
            
            <a href="<?= base_url('admin/wisata') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= strpos($current_url, 'admin/wisata') === 0 || strpos($current_url, 'admin/testimoni') === 0 ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-map-marked-alt w-6 text-center text-lg <?= strpos($current_url, 'admin/wisata') === 0 || strpos($current_url, 'admin/testimoni') === 0 ? 'text-emerald-400' : 'group-hover:text-emerald-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Objek Wisata</span>
            </a>
            
            <a href="<?= base_url('admin/pemesanan') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= strpos($current_url, 'admin/pemesanan') === 0 ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-ticket-alt w-6 text-center text-lg <?= strpos($current_url, 'admin/pemesanan') === 0 ? 'text-emerald-400' : 'group-hover:text-emerald-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Pemesanan</span>
            </a>



            <?php if (session()->get('role') == 'pengelola'): ?>
            <a href="<?= base_url('admin/laporan/pendapatan') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= strpos($current_url, 'admin/laporan') === 0 ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-chart-line w-6 text-center text-lg <?= strpos($current_url, 'admin/laporan') === 0 ? 'text-emerald-400' : 'group-hover:text-emerald-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Laporan</span>
            </a>
            <?php endif; ?>

            <?php if (session()->get('role') == 'admin'): ?>
            <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-8 mb-4 px-2 block">Pengaturan</div>
            
            <a href="<?= base_url('admin/user') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= strpos($current_url, 'admin/user') === 0 ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-users-cog w-6 text-center text-lg <?= strpos($current_url, 'admin/user') === 0 ? 'text-blue-400' : 'group-hover:text-blue-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Kelola User</span>
            </a>
            

            
            <a href="<?= base_url('admin/pengaturan/profile_desa') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= strpos($current_url, 'admin/pengaturan/profile_desa') === 0 ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-landmark w-6 text-center text-lg <?= strpos($current_url, 'admin/pengaturan/profile_desa') === 0 ? 'text-indigo-400' : 'group-hover:text-indigo-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Tentang Desa</span>
            </a>
            
            <a href="<?= base_url('admin/pengaturan/tampilan_web') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-emerald-500/20 hover:text-white transition-all duration-300 group <?= strpos($current_url, 'admin/pengaturan/tampilan_web') === 0 ? 'bg-gradient-to-r from-emerald-600/40 to-emerald-500/10 text-white shadow-lg border-l-4 border-emerald-400' : 'text-slate-300' ?>">
                <i class="fas fa-image w-6 text-center text-lg <?= strpos($current_url, 'admin/pengaturan/tampilan_web') === 0 ? 'text-pink-400' : 'group-hover:text-pink-400 transition-colors' ?>"></i>
                <span class="ml-3 font-semibold text-sm">Tampilan Web</span>
            </a>
            <?php endif; ?>
            
            <hr class="border-slate-700/50 my-6">
            
            <a href="<?= base_url('logout') ?>" class="flex items-center px-4 py-3.5 rounded-xl hover:bg-red-500/20 hover:text-red-400 transition-all duration-300 text-slate-400 group">
                <i class="fas fa-sign-out-alt w-6 text-center text-lg group-hover:-translate-x-1 transition-transform group-hover:text-red-400"></i>
                <span class="ml-3 font-semibold text-sm">Logout</span>
            </a>
        </nav>
    </div>
</aside>
