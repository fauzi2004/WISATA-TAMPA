<div class="relative mt-20">
    <svg class="absolute bottom-full w-full h-12 md:h-24 text-gray-900 pointer-events-none" preserveAspectRatio="none" viewBox="0 0 1440 100" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,50 C320,150 420,-50 1440,50 L1440,100 L0,100 Z"></path>
    </svg>
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <!-- Tentang -->
                <div data-aos="fade-up" data-aos-duration="800">
                    <h4 class="text-2xl font-extrabold mb-6 flex items-center">
                        <i class="fas fa-leaf text-emerald-500 mr-3"></i>Wisata Tampa
                    </h4>
                    <p class="text-gray-400 leading-relaxed">
                        Sistem Informasi Manajemen Pengelolaan Objek Wisata Alam Desa Tampa. Temukan ketenangan alam dan kemudahan pemesanan tiket dalam satu sentuhan.
                    </p>

                </div>

                <!-- Link Cepat -->
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h4 class="text-xl font-bold mb-6 border-b border-gray-800 pb-2 inline-block">Link Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="<?= base_url() ?>" class="text-gray-400 hover:text-emerald-400 transition-colors duration-300 flex items-center group"><i class="fas fa-chevron-right mr-3 text-xs text-gray-600 group-hover:text-emerald-400 group-hover:translate-x-1 transition-all"></i>Beranda</a></li>
                        <li><a href="<?= base_url('wisata') ?>" class="text-gray-400 hover:text-emerald-400 transition-colors duration-300 flex items-center group"><i class="fas fa-chevron-right mr-3 text-xs text-gray-600 group-hover:text-emerald-400 group-hover:translate-x-1 transition-all"></i>Daftar Wisata</a></li>
                        <li><a href="<?= base_url('tentang') ?>" class="text-gray-400 hover:text-emerald-400 transition-colors duration-300 flex items-center group"><i class="fas fa-chevron-right mr-3 text-xs text-gray-600 group-hover:text-emerald-400 group-hover:translate-x-1 transition-all"></i>Tentang Desa</a></li>
                        <li><a href="<?= base_url('login') ?>" class="text-gray-400 hover:text-emerald-400 transition-colors duration-300 flex items-center group"><i class="fas fa-chevron-right mr-3 text-xs text-gray-600 group-hover:text-emerald-400 group-hover:translate-x-1 transition-all"></i>Login</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h4 class="text-xl font-bold mb-6 border-b border-gray-800 pb-2 inline-block">Lokasi</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start group">
                            <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center mr-4 mt-1 shrink-0 group-hover:bg-emerald-600/20 transition-colors">
                                <i class="fas fa-map-marked-alt text-emerald-500"></i>
                            </div>
                            <div class="flex-1">
                                <span class="text-gray-300 font-bold block mb-1">Objek Wisata Alam Desa Tampa</span>
                                <span class="text-gray-400 text-sm leading-relaxed block">Desa Tampa, Kecamatan Ponrang, Kabupaten Luwu, Provinsi Sulawesi Selatan</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Batas -->
            <hr class="border-gray-800 mb-8">

            <!-- Copyright -->
            <div class="flex flex-col md:flex-row items-center justify-between text-gray-500 text-sm">
                <p>&copy; <?= date('Y') ?> <span class="font-semibold text-gray-300">Wisata Desa Tampa</span>. Hak Cipta Dilindungi.</p>
                <p class="mt-4 md:mt-0 flex items-center">
                    Dibuat dengan <i class="fas fa-heart text-red-500 mx-1 animate-pulse"></i> untuk Desa Tampa
                </p>
            </div>
        </div>
    </footer>
</div>
