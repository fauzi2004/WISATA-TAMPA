<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        /* Force hide Edge/IE password reveal icon */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none !important;
        }
    </style>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center py-12 px-4 relative overflow-x-hidden" style="background-image: url('<?= base_url('assets/images/tentang-desa.png') ?>');">
    <!-- Overlay & Cinematic Effects -->
    <div class="absolute inset-0 bg-gray-950/70 backdrop-blur-md"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/50 to-gray-900/80 mix-blend-multiply"></div>
    <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/20 rounded-full mix-blend-screen filter blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-teal-500/20 rounded-full mix-blend-screen filter blur-[100px] pointer-events-none"></div>

    <div class="max-w-md w-full bg-white/10 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_25px_60px_-15px_rgba(0,0,0,0.5)] p-6 md:p-10 relative z-10 border border-white/20 hover:border-white/30 transition-colors duration-500 my-8">
        <!-- Logo -->
        <div class="text-center mb-10">
            <div class="flex justify-center mb-6 relative z-20">
                <div class="w-24 h-24 bg-white/20 backdrop-blur-xl rounded-[1.2rem] flex items-center justify-center shadow-[0_10px_30px_rgba(0,0,0,0.2)] p-1 overflow-hidden border border-white/30 transform hover:scale-105 transition-transform duration-500">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Wisata Tampa" class="w-full h-full object-cover rounded-[1rem] bg-white">
                </div>
            </div>
            <h2 class="text-4xl font-black text-white tracking-tight drop-shadow-md">Register</h2>
            <p class="text-gray-300 mt-2 font-medium">Buat akun baru Wisata Desa Tampa</p>
        </div>

        <!-- Error Alert -->
        <?php if (!empty($errors)): ?>
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
            <div class="flex items-start">
                <i class="fas fa-exclamation-circle mr-2 mt-0.5"></i>
                <div>
                    <?php if(is_array($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p><?= $errors ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Form Register -->
        <form action="<?= base_url('register/process') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-4">
                <label for="nama" class="block text-gray-200 font-bold mb-2 ml-1">Nama Lengkap</label>
                <div class="relative group/input">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within/input:text-emerald-400 transition-colors">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" id="nama" name="nama" 
                           class="w-full pl-11 pr-4 py-3.5 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400/70 focus:bg-white/10 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 outline-none transition-all duration-300"
                           placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-200 font-bold mb-2 ml-1">Email</label>
                <div class="relative group/input">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within/input:text-emerald-400 transition-colors">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" 
                           class="w-full pl-11 pr-4 py-3.5 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400/70 focus:bg-white/10 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 outline-none transition-all duration-300"
                           placeholder="Masukkan email" value="<?= old('email') ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="no_telp" class="block text-gray-200 font-bold mb-2 ml-1">Nomor Telepon</label>
                <div class="relative group/input">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within/input:text-emerald-400 transition-colors">
                        <i class="fas fa-phone"></i>
                    </span>
                    <input type="text" id="no_telp" name="no_telp" 
                           class="w-full pl-11 pr-4 py-3.5 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400/70 focus:bg-white/10 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 outline-none transition-all duration-300"
                           placeholder="Contoh: 081234567890" value="<?= old('no_telp') ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-200 font-bold mb-2 ml-1">Password</label>
                <div class="relative group/input">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within/input:text-emerald-400 transition-colors">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" 
                           class="w-full pl-11 pr-12 py-3.5 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400/70 focus:bg-white/10 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 outline-none transition-all duration-300"
                           placeholder="Minimal 6 karakter" required>
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-white transition-colors focus:outline-none">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="mb-8">
                <label for="konfirmasi_password" class="block text-gray-200 font-bold mb-2 ml-1">Konfirmasi Password</label>
                <div class="relative group/input">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within/input:text-emerald-400 transition-colors">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="konfirmasi_password" name="konfirmasi_password" 
                           class="w-full pl-11 pr-4 py-3.5 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400/70 focus:bg-white/10 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 outline-none transition-all duration-300"
                           placeholder="Ulangi password" required>
                </div>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-emerald-500 to-teal-500 text-white py-4 rounded-[1.2rem] font-black tracking-wide hover:from-emerald-400 hover:to-teal-400 focus:outline-none shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-user-plus mr-2"></i> DAFTAR SEKARANG
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-white/10 text-center">
            <p class="text-gray-300 text-sm font-medium">
                Sudah punya akun? 
                <a href="<?= base_url('login') ?>" class="text-emerald-400 hover:text-emerald-300 font-bold hover:underline transition-colors">Login di sini</a>
            </p>
            
            <p class="mt-4">
                <a href="<?= base_url() ?>" class="inline-flex items-center text-gray-400 hover:text-white text-sm font-medium transition-colors">
                    <span class="w-6 h-6 rounded-full bg-white/10 flex items-center justify-center mr-2"><i class="fas fa-arrow-left text-[10px]"></i></span>
                    Kembali ke Beranda
                </a>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>
