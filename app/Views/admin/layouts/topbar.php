<?php
$notifikasiModel = new \App\Models\NotifikasiModel();
$notifikasi = $notifikasiModel->where('id_user', session()->get('user_id'))->orderBy('created_at', 'DESC')->limit(5)->findAll();
$unread_count = $notifikasiModel->where('id_user', session()->get('user_id'))->where('is_read', 0)->countAllResults();
?>
<header class="bg-white/80 backdrop-blur-xl shadow-sm border-b border-emerald-500/10 px-8 py-4 sticky top-0 z-[80] transition-all duration-300">
    <div class="flex items-center justify-between relative">
        <!-- Glowing orb behind title -->
        <div class="absolute -left-4 top-1/2 -translate-y-1/2 w-20 h-20 bg-emerald-400/20 rounded-full blur-2xl pointer-events-none"></div>
        
        <div class="flex items-center gap-5 relative z-10">
            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuToggle" class="md:hidden flex items-center justify-center w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg hover:bg-emerald-100 transition-colors focus:outline-none">
                <i class="fas fa-bars text-lg"></i>
            </button>

            <!-- Animated Icon Container -->
            <div class="relative group cursor-pointer hidden sm:flex">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-[1.2rem] blur opacity-40 group-hover:opacity-75 group-hover:scale-110 transition-all duration-300"></div>
                <div class="relative w-14 h-14 rounded-[1.2rem] bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 border border-white/20 transform group-hover:scale-[1.05] transition-all duration-300">
                    <i class="fas fa-compass text-2xl group-hover:rotate-12 transition-transform duration-300"></i>
                </div>
            </div>
            
            <div class="flex flex-col justify-center">
                <?php
                $headerTitle = $title ?? 'Dashboard';
                $headerTitle = str_replace(' - Admin Wisata Desa Tampa', '', $headerTitle);
                $headerTitle = str_replace(' - Wisata Desa Tampa', '', $headerTitle);
                
                $titleSuffix = 'Wisata Desa Tampa';
                $isSuperAdmin = true;
                if (session()->get('role') == 'pengelola') {
                    $isSuperAdmin = false;
                    $db = \Config\Database::connect();
                    $wisataTitle = $db->table('objek_wisata')->select('nama_wisata')->where('id', session()->get('id_wisata'))->get()->getRowArray();
                    if ($wisataTitle) {
                        $titleSuffix = esc($wisataTitle['nama_wisata']);
                    }
                }
                
                // Ganti judul "Dashboard Admin" dengan nama spesifik wisata atau Super Admin
                if ($headerTitle === 'Dashboard Admin') {
                    $headerTitle = $isSuperAdmin ? 'Dashboard Super Admin' : 'Dashboard ' . $titleSuffix;
                }
                ?>
                <div class="flex items-center gap-3 mb-1.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-100 text-[10px] font-black uppercase tracking-widest text-emerald-700 shadow-[0_2px_10px_rgba(16,185,129,0.05)]">
                        <i class="<?= $isSuperAdmin ? 'fas fa-crown text-amber-500' : 'fas fa-map-marked-alt text-emerald-500' ?> text-[11px]"></i>
                        <?= $isSuperAdmin ? 'SUPER ADMIN' : 'ADMIN ' . strtoupper($titleSuffix) ?>
                    </span>
                    <div class="h-3 w-px bg-gray-200 hidden md:block"></div>
                    <p class="text-[11px] text-gray-500 font-bold flex items-center gap-1.5 hidden md:flex">
                        <i class="far fa-calendar-alt text-emerald-500"></i> <?= date('l, d F Y') ?>
                    </p>
                </div>
                <h2 class="text-[1.65rem] leading-tight font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-emerald-800 drop-shadow-sm">
                    <?= esc($headerTitle) ?>
                </h2>
            </div>
        </div>
        
        <div class="flex items-center space-x-6">
            <!-- Notifications Dropdown -->
            <div class="relative group/notif">
                <button id="notifButton" onclick="document.getElementById('notifDropdown').classList.toggle('hidden')" class="relative flex items-center justify-center w-11 h-11 bg-emerald-50/50 hover:bg-emerald-100/50 border border-emerald-100 rounded-[1.2rem] text-emerald-600 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                    <i class="fas fa-bell text-xl"></i>
                        <span id="notifBadge" class="absolute top-0 right-0 h-4 w-4 -mt-1 -mr-1 <?= $unread_count > 0 ? 'flex' : 'hidden' ?>">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span id="notifCount" class="relative inline-flex rounded-full h-4 w-4 bg-red-500 border-2 border-white items-center justify-center text-[9px] font-black text-white shadow-sm">
                                <?= $unread_count ?>
                            </span>
                        </span>
                </button>
                
                <div id="notifDropdown" class="hidden absolute right-0 mt-3 w-80 bg-white/95 backdrop-blur-3xl rounded-[1.5rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.15)] border border-white/60 overflow-hidden z-50">
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

            <!-- User Profile Dropdown -->
            <div class="relative group/profile">
                <button id="profileButton" onclick="document.getElementById('profileDropdown').classList.toggle('hidden')" class="flex items-center gap-3 cursor-pointer focus:outline-none">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-800 group-hover/profile:text-emerald-600 transition-colors"><?= session()->get('nama') ?></p>
                        <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest"><?= session()->get('role') == 'pengelola' ? 'Admin' : 'Super Admin' ?></p>
                    </div>
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 p-0.5 shadow-md group-hover/profile:shadow-lg group-hover/profile:-translate-y-0.5 transition-all duration-300">
                        <?php if (session()->get('foto') && session()->get('foto') != 'default.png' && session()->get('foto') != 'default-user.svg'): ?>
                            <img src="<?= base_url('uploads/profil/' . session()->get('foto')) ?>" alt="Profile" class="w-full h-full rounded-full object-cover border-2 border-white">
                        <?php else: ?>
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center text-emerald-600 text-lg">
                                <i class="fas fa-user-astronaut"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </button>
                
                <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-3xl rounded-[1.5rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.15)] border border-white/60 overflow-hidden z-50">
                    <div class="p-2 space-y-1">
                        <a href="<?= base_url('admin/profil') ?>" class="flex items-center px-4 py-3 text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl transition-all duration-300 group">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-500 mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-user-edit text-xs"></i>
                            </div>
                            Profil Saya
                        </a>
                        <div class="h-px bg-gray-100/80 my-1 mx-2"></div>
                        <a href="<?= base_url('auth/logout') ?>" class="flex items-center px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 rounded-xl transition-all duration-300 group">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-500 mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-sign-out-alt text-xs"></i>
                            </div>
                            Logout
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
