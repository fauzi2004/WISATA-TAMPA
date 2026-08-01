<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Informasi Manajemen Pengelolaan Objek Wisata Alam Desa Tampa' ?></title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-gray-50">
    
    <!-- Navbar -->
    <?= $this->include('layouts/navbar') ?>

    <!-- Content -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('layouts/footer') ?>

    <!-- Back to Top Button -->
    <button id="backToTop" aria-label="Kembali ke atas" class="fixed bottom-8 right-8 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg hover:bg-green-700 transition duration-300 hidden z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- AOS JS for Scroll Animations -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                once: true,
                offset: 50,
            });
        }
    </script>
    <!-- JavaScript -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script>
        // Toggle dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const notifButton = document.getElementById('frontNotifBtn');
            const notifDropdown = document.getElementById('frontNotifDropdown');
            if (notifButton && notifDropdown) {
                if (!notifButton.contains(event.target) && !notifDropdown.contains(event.target)) {
                    notifDropdown.classList.add('hidden');
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
