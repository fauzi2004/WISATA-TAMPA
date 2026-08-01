<?php
$unread_count = 0;
$notifikasi = [];
if (session()->get('isLoggedIn')) {
    $notifikasiModel = new \App\Models\NotifikasiModel();
    $notifikasi = $notifikasiModel->where('id_user', session()->get('user_id'))->orderBy('created_at', 'DESC')->limit(5)->findAll();
    $unread_count = $notifikasiModel->where('id_user', session()->get('user_id'))->where('is_read', 0)->countAllResults();
}
?>
<nav class="bg-white/80 backdrop-blur-3xl shadow-[0_15px_40px_-10px_rgba(0,0,0,0.08)] border border-white/60 fixed w-[96%] md:w-[92%] max-w-7xl left-1/2 -translate-x-1/2 top-5 rounded-[2rem] z-50 transition-all duration-500" id="navbar">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center py-3.5">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="flex items-center space-x-3.5 group">
                <div class="w-11 h-11 bg-white rounded-[1rem] flex items-center justify-center shadow-md p-1 overflow-hidden border border-emerald-100 group-hover:shadow-[0_8px_20px_rgba(16,185,129,0.2)] group-hover:-translate-y-0.5 transition-all duration-300">
                    <img src="<?= base_url('assets/images/logo.png') ?>?v=<?= time() ?>" alt="Logo Wisata Tampa" class="w-full h-full object-cover rounded-[0.8rem]">
                </div>
                <div>
                    <span class="text-xl font-black text-gray-900 tracking-tight group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-emerald-600 group-hover:to-teal-500 transition-all duration-300">Wisata Tampa</span>
                    <span class="block text-[11px] text-gray-500 font-bold uppercase tracking-widest mt-0.5">Desa Tampa</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="<?= base_url() ?>" class="text-gray-600 hover:text-emerald-600 font-bold text-[15px] transition duration-300 relative after:content-[''] after:absolute after:-bottom-1.5 after:left-0 after:w-0 after:h-0.5 after:bg-emerald-500 after:transition-all after:duration-300 hover:after:w-full">Beranda</a>
                <a href="<?= base_url('wisata') ?>" class="text-gray-600 hover:text-emerald-600 font-bold text-[15px] transition duration-300 relative after:content-[''] after:absolute after:-bottom-1.5 after:left-0 after:w-0 after:h-0.5 after:bg-emerald-500 after:transition-all after:duration-300 hover:after:w-full">Daftar Wisata</a>
                <a href="<?= base_url('tentang') ?>" class="text-gray-600 hover:text-emerald-600 font-bold text-[15px] transition duration-300 relative after:content-[''] after:absolute after:-bottom-1.5 after:left-0 after:w-0 after:h-0.5 after:bg-emerald-500 after:transition-all after:duration-300 hover:after:w-full">Tentang Desa</a>
                
                <?php if (session()->get('isLoggedIn')): ?>
                    <!-- Notifikasi Dropdown -->
                    <div class="relative group/notif">
                        <button id="frontNotifBtn" onclick="document.getElementById('frontNotifDropdown').classList.toggle('hidden')" class="relative flex items-center justify-center w-11 h-11 bg-emerald-50/50 hover:bg-emerald-100/50 border border-emerald-100 rounded-[1.2rem] text-emerald-600 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                            <i class="fas fa-bell text-xl"></i>
                            <span id="notifBadge" class="absolute top-0 right-0 h-4 w-4 -mt-1 -mr-1 <?= $unread_count > 0 ? 'flex' : 'hidden' ?>">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span id="notifCount" class="relative inline-flex rounded-full h-4 w-4 bg-red-500 border-2 border-white items-center justify-center text-[9px] font-black text-white shadow-sm">
                                    <?= $unread_count ?>
                                </span>
                            </span>
                        </button>
                        
                        <div id="frontNotifDropdown" class="hidden absolute right-0 mt-3 w-80 bg-white/95 backdrop-blur-3xl rounded-[1.5rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.15)] border border-white/60 overflow-hidden z-50">
                            <div class="px-5 py-4 bg-gradient-to-r from-emerald-500 to-teal-500 flex justify-between items-center shadow-inner">
                                <h3 class="text-sm font-black text-white tracking-wide">Notifikasi</h3>
                                <?php if ($unread_count > 0): ?>
                                    <button onclick="markAllAsRead()" class="text-[11px] text-emerald-50 bg-white/20 hover:bg-white/30 px-2.5 py-1 rounded-full font-bold transition-colors border border-white/20 shadow-sm">Tandai semua dibaca</button>
                                <?php endif; ?>
                            </div>
                            <div class="max-h-[350px] overflow-y-auto custom-scrollbar">
                                <?php if (empty($notifikasi)): ?>
                                    <div class="p-8 text-center text-gray-400 flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-3 border border-gray-100">
                                            <i class="fas fa-bell-slash text-2xl text-gray-300"></i>
                                        </div>
                                        <p class="text-sm font-medium">Belum ada notifikasi baru</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($notifikasi as $notif): ?>
                                        <div class="px-5 py-4 border-b border-gray-100 hover:bg-emerald-50/50 transition-colors <?= $notif['is_read'] ? 'opacity-70 bg-white' : 'bg-emerald-50/20' ?>">
                                            <div class="flex justify-between items-start mb-1.5">
                                                <h4 class="text-sm font-bold <?= $notif['is_read'] ? 'text-gray-600' : 'text-gray-900' ?>"><?= esc($notif['judul']) ?></h4>
                                                <span class="text-[10px] <?= $notif['is_read'] ? 'text-gray-400' : 'text-emerald-500 font-bold' ?> whitespace-nowrap ml-3 mt-0.5"><?= date('d M, H:i', strtotime($notif['created_at'])) ?></span>
                                            </div>
                                            <p class="text-xs text-gray-500 leading-relaxed mb-3"><?= esc($notif['pesan']) ?></p>
                                            <div class="flex items-center gap-3">
                                                <?php if ($notif['link']): ?>
                                                    <a href="<?= base_url($notif['link']) ?>" class="inline-flex items-center text-[11px] font-bold text-emerald-600 hover:text-teal-600 transition-colors bg-emerald-50 px-2 py-1 rounded-md border border-emerald-100">Lihat Detail <i class="fas fa-chevron-right text-[9px] ml-1"></i></a>
                                                <?php endif; ?>
                                                <?php if (!$notif['is_read']): ?>
                                                    <button onclick="markAsRead(<?= $notif['id'] ?>)" class="text-[11px] font-bold text-gray-400 hover:text-emerald-500 transition-colors">Tandai Dibaca</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="relative group ml-4 border-l border-gray-200 pl-6">
                        <button class="flex items-center text-gray-700 hover:text-emerald-600 font-bold transition duration-300 focus:outline-none bg-emerald-50/50 hover:bg-emerald-100/50 px-4 py-2 rounded-full border border-emerald-100">
                            <?php if (session()->get('foto') && session()->get('foto') != 'default.png' && session()->get('foto') != 'default-user.svg'): ?>
                                <img src="<?= base_url('uploads/profil/' . session()->get('foto')) ?>" alt="Profile" class="w-6 h-6 rounded-full mr-2 object-cover border border-emerald-200">
                            <?php else: ?>
                                <i class="fas fa-user-circle text-xl mr-2 text-emerald-500"></i>
                            <?php endif; ?>
                            <?= session()->get('nama') === 'Pengunjung' ? 'Wisatawan' : session()->get('nama') ?> <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-3 w-56 bg-white/90 backdrop-blur-xl rounded-[1.5rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.1)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-white/50 p-2 translate-y-2 group-hover:translate-y-0">
                            <a href="<?= base_url('profil') ?>" class="flex items-center px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl font-bold transition-colors">
                                <i class="fas fa-id-card w-6 text-center mr-2 text-emerald-400"></i>Profil Saya
                            </a>
                            <a href="<?= base_url('pesanan') ?>" class="flex items-center px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl font-bold transition-colors mb-2">
                                <i class="fas fa-ticket-alt w-6 text-center mr-2 text-teal-400"></i>Pesanan Saya
                            </a>
                            <hr class="border-gray-100 mb-2">
                            <a href="<?= base_url('auth/logout') ?>" class="flex items-center px-4 py-3 text-red-500 hover:bg-red-50 hover:text-red-600 rounded-xl font-bold transition-colors">
                                <i class="fas fa-sign-out-alt w-6 text-center mr-2 text-red-400"></i>Logout
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center space-x-3 ml-4 border-l border-gray-200 pl-6">
                        <a href="<?= base_url('login') ?>" class="flex items-center text-gray-600 hover:text-emerald-600 font-bold transition-all duration-300 px-4 py-2 hover:bg-emerald-50 rounded-full">
                            <i class="fas fa-sign-in-alt mr-2 text-emerald-500"></i>Login
                        </a>
                        <a href="<?= base_url('register') ?>" class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-7 py-2.5 rounded-full hover:from-emerald-600 hover:to-teal-600 font-bold shadow-[0_8px_20px_rgba(16,185,129,0.3)] hover:shadow-[0_12px_25px_rgba(16,185,129,0.4)] hover:-translate-y-0.5 transition-all duration-300">
                            <i class="fas fa-user-plus mr-1.5"></i>Register
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden pb-4">
            <a href="<?= base_url() ?>" class="block py-3 text-gray-700 hover:text-green-600 font-medium border-b">Beranda</a>
            <a href="<?= base_url('wisata') ?>" class="block py-3 text-gray-700 hover:text-green-600 font-medium border-b">Daftar Wisata</a>
            <a href="<?= base_url('tentang') ?>" class="block py-3 text-gray-700 hover:text-green-600 font-medium border-b">Tentang Desa</a>
            
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= base_url('profil') ?>" class="block py-3 text-gray-700 hover:text-green-600 font-medium border-b">Profil Saya</a>
                <a href="<?= base_url('pesanan') ?>" class="block py-3 text-gray-700 hover:text-green-600 font-medium border-b">Pesanan Saya</a>
                <a href="<?= base_url('auth/logout') ?>" class="block py-3 text-red-600 hover:text-red-700 font-medium">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="block py-3 text-gray-700 hover:text-emerald-600 font-medium border-b">Login</a>
                <a href="<?= base_url('register') ?>" class="block mt-4 text-center bg-emerald-600 text-white px-5 py-3 rounded-full font-bold shadow-md shadow-emerald-600/20 active:bg-emerald-700 transition-colors">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
