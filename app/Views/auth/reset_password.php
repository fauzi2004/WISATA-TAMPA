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

    <div class="max-w-md w-full bg-white/10 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_25px_60px_-15px_rgba(0,0,0,0.5)] p-6 md:p-10 relative z-10 border border-white/20 hover:border-white/30 transition-colors duration-500">
        <!-- Logo -->
        <div class="text-center mb-10">
            <div class="flex justify-center mb-6 relative z-20">
                <div class="w-24 h-24 bg-white/20 backdrop-blur-xl rounded-[1.2rem] flex items-center justify-center shadow-[0_10px_30px_rgba(0,0,0,0.2)] p-1 overflow-hidden border border-white/30 transform hover:scale-105 transition-transform duration-500">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Wisata Tampa" class="w-full h-full object-cover rounded-[1rem] bg-white">
                </div>
            </div>
            <h2 class="text-4xl font-black text-white tracking-tight drop-shadow-md">Buat Password</h2>
            <p class="text-gray-300 mt-2 font-medium">Silakan masukkan password baru Anda</p>
        </div>

        <!-- Error Alert -->
        <?php if (!empty($errors)): ?>
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span>
                    <?php if(is_array($errors)): ?>
                        <?= implode('<br>', $errors) ?>
                    <?php else: ?>
                        <?= $errors ?>
                    <?php endif; ?>
                </span>
            </div>
        </div>
        <?php endif; ?>

        <!-- Form Reset Password -->
        <form action="<?= base_url('reset-password/process') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="token" value="<?= $token ?>">
            
            <div class="mb-5">
                <label for="password" class="block text-gray-200 font-bold mb-2 ml-1">Password Baru</label>
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
                           class="w-full pl-11 pr-12 py-3.5 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400/70 focus:bg-white/10 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 outline-none transition-all duration-300"
                           placeholder="Ketik ulang password" required>
                    <button type="button" id="toggleKonfirmPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-white transition-colors focus:outline-none">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-emerald-500 to-teal-500 text-white py-4 rounded-[1.2rem] font-black tracking-wide hover:from-emerald-400 hover:to-teal-400 focus:outline-none shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-save mr-2"></i> SIMPAN PASSWORD
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-white/10 text-center">
            <p class="text-gray-300 text-sm font-medium">
                Batal reset? 
                <a href="<?= base_url('login') ?>" class="text-emerald-400 hover:text-emerald-300 font-bold hover:underline transition-colors">Kembali ke Login</a>
            </p>
        </div>
    </div>

    <script>
        function setupToggle(inputId, toggleId) {
            document.getElementById(toggleId).addEventListener('click', function() {
                const input = document.getElementById(inputId);
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        }
        
        setupToggle('password', 'togglePassword');
        setupToggle('konfirmasi_password', 'toggleKonfirmPassword');
    </script>
</body>
</html>
