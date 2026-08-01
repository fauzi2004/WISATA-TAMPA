<?php
$pageTitle = $title ?? 'Admin Dashboard';
$pageTitle = str_replace(' - Admin Wisata Desa Tampa', '', $pageTitle);
$pageTitle = str_replace(' - Wisata Desa Tampa', '', $pageTitle);

$titleSuffix = 'Wisata Desa Tampa';
if (session()->get('role') == 'pengelola') {
    $db = \Config\Database::connect();
    $wisataTitle = $db->table('objek_wisata')->select('nama_wisata')->where('id', session()->get('id_wisata'))->get()->getRowArray();
    if ($wisataTitle) {
        $titleSuffix = 'Admin ' . esc($wisataTitle['nama_wisata']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle . ' - ' . $titleSuffix ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased overflow-x-hidden">
    
    <div class="flex min-h-screen relative w-full overflow-hidden">
        <!-- Mobile Overlay -->
        <div id="mobileOverlay" class="fixed inset-0 bg-gray-900/50 z-[90] hidden md:hidden backdrop-blur-sm transition-opacity duration-300 opacity-0"></div>

        <!-- Sidebar -->
        <?= $this->include('admin/layouts/sidebar') ?>

        <!-- Main Content -->
        <div class="flex-1 w-full min-w-0 md:ml-64 transition-all duration-300">
            <!-- Topbar -->
            <?= $this->include('admin/layouts/topbar') ?>

            <!-- Content -->
            <div class="p-8">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    
    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
        });

        // Mobile Sidebar Toggle Logic
        const sidebar = document.getElementById('sidebar');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileOverlay = document.getElementById('mobileOverlay');

        if (mobileMenuToggle && sidebar && mobileOverlay) {
            mobileMenuToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.remove('-translate-x-full');
                mobileOverlay.classList.remove('hidden');
                setTimeout(() => {
                    mobileOverlay.classList.add('opacity-100');
                }, 10);
            });

            mobileOverlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                mobileOverlay.classList.remove('opacity-100');
                setTimeout(() => {
                    mobileOverlay.classList.add('hidden');
                }, 300);
            });
        }


        // Toggle dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const notifButton = document.getElementById('notifButton');
            const notifDropdown = document.getElementById('notifDropdown');
            if (notifButton && notifDropdown) {
                if (!notifButton.contains(event.target) && !notifDropdown.contains(event.target)) {
                    notifDropdown.classList.add('hidden');
                }
            }

            const profileButton = document.getElementById('profileButton');
            const profileDropdown = document.getElementById('profileDropdown');
            if (profileButton && profileDropdown) {
                if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            }
        });

        function markAsRead(id) {
            fetch('<?= base_url('notifikasi/read/') ?>' + id, {
                method: 'GET'
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      location.reload();
                  }
              });
        }

        function markAllAsRead() {
            fetch('<?= base_url('notifikasi/read-all') ?>', {
                method: 'GET'
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      location.reload();
                  }
              });
        }

        <?php if(session()->get('isLoggedIn')): ?>
        // Notification polling & sound
        let currentUnreadCount = -1;
        const notifSound = new Audio('<?= base_url('assets/audio/notif.mp3?v=3') ?>');
        let audioUnlocked = false;

        // Unlock audio context for strict browsers (Edge/Chrome) on first interaction
        // function unlockAudio() {
        //     if (!audioUnlocked) {
        //         notifSound.volume = 0; // mute temporarily
        //         // let playPromise = notifSound.play();
        //         // if (playPromise !== undefined) {
        //         //     playPromise.then(() => {
        //         //         notifSound.pause();
        //         //         notifSound.currentTime = 0;
        //         //         notifSound.volume = 1; // restore volume
        //         //         audioUnlocked = true;
        //         //         document.body.removeEventListener('click', unlockAudio);
        //         //         document.body.removeEventListener('keydown', unlockAudio);
        //         //     }).catch(err => {
        //         //         console.log('Audio unlock failed:', err);
        //         //     });
        //         // }
        //     }
        // }
        // document.body.addEventListener('click', unlockAudio);
        // document.body.addEventListener('keydown', unlockAudio);

        setInterval(() => {
            fetch('<?= base_url('notifikasi/check-new') ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (currentUnreadCount === -1) {
                            currentUnreadCount = data.unread_count;
                        } else if (data.unread_count > currentUnreadCount) {
                            console.log('New notification! Playing sound...');
                            if(audioUnlocked) {
                                notifSound.volume = 1; // ensure volume is up
                            }
                            // Play custom sound and catch error if blocked by browser
                            // Suara notifikasi dinonaktifkan sementara agar tidak bunyi terus
                            // let playPromise = notifSound.play();
                            // if (playPromise !== undefined) {
                            //     playPromise.catch(e => {
                            //         console.log('Audio autoplay blocked. User must interact first:', e);
                            //     });
                            // }
                            currentUnreadCount = data.unread_count;
                        } else {
                            currentUnreadCount = data.unread_count;
                        }
                        
                        // Update UI badge
                        const badge = document.getElementById('notifBadge');
                        const countSpan = document.getElementById('notifCount');
                        if (badge && countSpan) {
                            if (data.unread_count > 0) {
                                badge.classList.remove('hidden');
                                badge.classList.add('flex');
                                countSpan.innerText = data.unread_count;
                            } else {
                                badge.classList.add('hidden');
                                badge.classList.remove('flex');
                            }
                        }
                    }
                })
                .catch(err => console.error('Error checking notifications:', err));
        }, 3000); // Check every 3 seconds for faster response
        <?php endif; ?>
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
