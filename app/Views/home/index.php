<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative bg-cover bg-center min-h-screen flex items-center justify-center overflow-hidden" style="background-image: url('<?= base_url('assets/images/river_gazebo.png') ?>?v=<?= time() ?>');">
    <!-- Elegant Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/60 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent"></div>
    
    <div class="relative container mx-auto px-4 h-full flex items-center pt-20">
        <div class="text-white max-w-3xl z-10">
            <div data-aos="fade-right" data-aos-duration="1000" class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-5 py-2 mb-6 shadow-lg">
                <i class="fas fa-leaf text-emerald-400"></i>
                <span class="text-sm md:text-base font-medium tracking-wide">Destinasi Wisata Pilihan</span>
            </div>

            <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight tracking-tight drop-shadow-lg">
                Jelajahi <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Keajaiban</span><br> Desa Tampa
            </h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="text-xl md:text-2xl mb-10 text-gray-200 leading-relaxed font-light max-w-2xl">
                Nikmati keindahan alam yang mempesona, pesan tiket dengan mudah dan cepat secara online untuk pengalaman liburan tak terlupakan.
            </p>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" class="flex flex-wrap gap-4">
                <a href="<?= base_url('wisata') ?>" class="w-full sm:w-auto btn-premium bg-emerald-600 hover:bg-emerald-500 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-[0_0_20px_rgba(16,185,129,0.4)] text-center flex justify-center items-center">
                    <i class="fas fa-map-marked-alt mr-2"></i>Mulai Petualangan
                </a>
                <a href="#tentang" class="w-full sm:w-auto btn-premium glass text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/20 text-center flex justify-center items-center">
                    <i class="fas fa-info-circle mr-2"></i>Tentang Desa
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Down -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#wisata" class="text-white text-4xl">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

    <!-- Objek Wisata Section -->
    <section id="wisata" class="py-24 bg-gray-50 relative">
        <!-- Dekorasi Background -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">Destinasi <span class="text-gradient">Favorit</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Temukan berbagai destinasi wisata alam yang menakjubkan di Desa Tampa. Dari air terjun yang mempesona hingga perbukitan dengan panorama indah.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php /** @var array $wisata_list */ ?>
                <?php $delay = 0; foreach ($wisata_list as $wisata): ?>
                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="bg-white/70 backdrop-blur-3xl rounded-[2.5rem] p-3 shadow-[0_15px_40px_-10px_rgba(0,0,0,0.05)] border border-white/80 overflow-hidden hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.2)] transition-all duration-500 transform hover:-translate-y-3 relative group/card flex flex-col h-full">
                    <div class="relative overflow-hidden aspect-[4/3] rounded-[2rem] shadow-inner mb-4 flex-shrink-0">
                        <!-- Glow Effect Behind Image -->
                        <div class="absolute inset-0 bg-emerald-500/20 opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 mix-blend-overlay z-10 pointer-events-none"></div>
                        
                        <img loading="lazy" decoding="async" src="<?= base_url('uploads/wisata/' . $wisata['gambar']) ?>" alt="<?= $wisata['nama_wisata'] ?>" 
                             class="w-full h-full object-cover group-hover/card:scale-[1.15] group-hover/card:rotate-1 transition-all duration-700 ease-out"
                             onerror="this.src='<?= base_url('assets/images/river_gazebo.png') ?>'">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/10 to-transparent opacity-60 group-hover/card:opacity-40 transition-opacity duration-500"></div>
                        
                        <!-- Badge Kategori -->
                        <div class="absolute top-4 left-4 bg-white/30 backdrop-blur-xl border border-white/50 text-white font-black px-4 py-2 rounded-2xl text-[10px] uppercase tracking-widest shadow-[0_8px_20px_rgba(0,0,0,0.15)] flex items-center group-hover/card:bg-emerald-500 group-hover/card:border-emerald-400 group-hover/card:shadow-emerald-500/40 transition-all duration-300 z-20">
                            <i class="fas fa-layer-group mr-2 opacity-90 text-xs"></i> <?= $wisata['nama_kategori'] ?>
                        </div>

                        <!-- Rating Badge -->
                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-xl border border-white/50 text-gray-800 font-black px-3 py-1.5 rounded-2xl text-[11px] shadow-[0_8px_20px_rgba(0,0,0,0.15)] flex items-center z-20 transform hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-star text-amber-400 mr-1.5 text-xs drop-shadow-sm"></i> 
                            <?= $wisata['avg_rating'] ? number_format($wisata['avg_rating'], 1) : 'Baru' ?>
                        </div>
                    </div>
                    
                    <div class="px-5 pb-5 flex flex-col flex-grow">
                        <h3 class="text-2xl font-black text-gray-900 mb-2 group-hover/card:text-transparent group-hover/card:bg-clip-text group-hover/card:bg-gradient-to-r group-hover/card:from-emerald-600 group-hover/card:to-teal-500 transition-all duration-300 tracking-tight flex-shrink-0"><?= $wisata['nama_wisata'] ?></h3>
                        
                        <div class="inline-flex items-center text-xs font-bold text-gray-500 mb-4 bg-gray-100/80 px-3 py-1.5 rounded-xl self-start flex-shrink-0 group-hover/card:bg-emerald-50 group-hover/card:text-emerald-700 transition-colors duration-300">
                            <i class="fas fa-map-marker-alt text-red-500 mr-1.5 group-hover/card:animate-bounce"></i>Desa Tampa
                        </div>
                        
                        <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed text-sm font-medium flex-grow"><?= htmlspecialchars(mb_strimwidth((string)$wisata['deskripsi'], 0, 150, '...')) ?></p>
                        
                        <div class="flex items-end justify-between pt-5 border-t border-gray-200/50 flex-shrink-0">
                            <div>
                                <span class="block text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1.5">Harga Tiket / Orang</span>
                                <div class="inline-flex items-center px-3 py-1.5 rounded-xl bg-emerald-50/50 border border-emerald-100/50 group-hover/card:border-emerald-200 transition-colors duration-300">
                                    <span class="text-emerald-600 font-black text-xl drop-shadow-sm">
                                        <?= $wisata['harga_tiket'] > 0 ? 'Rp ' . number_format($wisata['harga_tiket'], 0, ',', '.') : 'Gratis' ?>
                                    </span>
                                </div>
                            </div>
                            <a href="<?= base_url('wisata/detail/' . $wisata['id']) ?>" 
                               class="bg-gradient-to-br from-gray-800 to-gray-900 text-white group-hover/card:from-emerald-500 group-hover/card:to-teal-500 group-hover/card:shadow-[0_10px_20px_-5px_rgba(16,185,129,0.5)] w-14 h-14 flex items-center justify-center rounded-[1.2rem] shadow-md transition-all duration-500 transform group-hover/card:-rotate-12 group-hover/card:scale-110">
                                <i class="fas fa-arrow-right text-lg transition-transform group-hover/card:translate-x-1 duration-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php $delay += 100; endforeach; ?>
            </div>

            <div class="text-center mt-16" data-aos="zoom-in">
                <a href="<?= base_url('wisata') ?>" class="inline-block w-full sm:w-auto btn-premium bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white px-10 py-4 rounded-full font-bold shadow-sm transition duration-300">
                    Lihat Semua Destinasi <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50/50 relative overflow-hidden">
        <!-- Dekorasi Background -->
        <div class="absolute top-40 left-0 w-72 h-72 bg-emerald-100/50 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-10 right-0 w-80 h-80 bg-blue-100/50 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-600 rounded-full px-4 py-2 mb-4 font-semibold text-sm tracking-wide">
                    <i class="fas fa-gem"></i> Layanan Premium
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 tracking-tight">Kenapa Memilih Kami?</h2>
                <p class="text-gray-500 font-medium text-lg max-w-2xl mx-auto">Pengalaman wisata alam tak terlupakan yang didukung dengan standar pelayanan dan fasilitas berkelas tinggi.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Keunggulan 1 -->
                <div data-aos="fade-up" data-aos-delay="0" class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(16,185,129,0.2)] transition-all duration-500 group border border-white relative overflow-hidden hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-emerald-500/10 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl shadow-lg shadow-emerald-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 relative z-10">
                        <i class="fas fa-ticket-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-4 tracking-tight relative z-10">Pemesanan Mudah</h3>
                    <p class="text-gray-500 leading-relaxed font-medium relative z-10">Pesan tiket kapan saja dan di mana saja secara online dengan cepat tanpa perlu antri panjang.</p>
                </div>
                
                <!-- Keunggulan 2 -->
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(59,130,246,0.2)] transition-all duration-500 group border border-white relative overflow-hidden hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-blue-500/10 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl shadow-lg shadow-blue-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:-rotate-6 transition-transform duration-500 relative z-10">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-4 tracking-tight relative z-10">Aman & Terpercaya</h3>
                    <p class="text-gray-500 leading-relaxed font-medium relative z-10">Transaksi tiket Anda dijamin keamanannya dengan sistem pembayaran digital yang terintegrasi penuh.</p>
                </div>
                
                <!-- Keunggulan 3 -->
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(245,158,11,0.2)] transition-all duration-500 group border border-white relative overflow-hidden hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-amber-500/10 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl shadow-lg shadow-amber-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 relative z-10">
                        <i class="fas fa-leaf text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-4 tracking-tight relative z-10">Alam Terjaga</h3>
                    <p class="text-gray-500 leading-relaxed font-medium relative z-10">Nikmati pesona alam yang masih sangat asri, perawan, dan senantiasa dijaga kelestariannya dengan baik.</p>
                </div>
                
                <!-- Keunggulan 4 -->
                <div data-aos="fade-up" data-aos-delay="300" class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_50px_-15px_rgba(139,92,246,0.2)] transition-all duration-500 group border border-white relative overflow-hidden hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/5 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-purple-500/10 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-fuchsia-500 rounded-2xl shadow-lg shadow-purple-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:-rotate-6 transition-transform duration-500 relative z-10">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-4 tracking-tight relative z-10">Layanan Ramah</h3>
                    <p class="text-gray-500 leading-relaxed font-medium relative z-10">Staf pengelola dan pemandu lokal kami selalu siap menyambut kedatangan Anda dengan penuh keramahan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
<?php if (!empty($testimoni_list)): ?>
    <section class="py-24 bg-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('<?= base_url('assets/images/pattern.svg') ?>')] opacity-5"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Kata Mereka</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Pengalaman nyata dari pengunjung yang telah menjelajahi keindahan Desa Tampa.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $delay = 0; foreach ($testimoni_list as $testi): ?>
                <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="bg-gray-800/80 backdrop-blur-lg rounded-3xl p-8 border border-gray-700/50 hover:bg-gray-700/80 transition-colors">
                    <div class="text-yellow-400 mb-6 text-sm flex gap-1">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $testi['rating']): ?>
                                <i class="fas fa-star drop-shadow-md"></i>
                            <?php else: ?>
                                <i class="far fa-star text-gray-600"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <p class="text-gray-300 italic mb-8 leading-relaxed text-lg">"<?= $testi['komentar'] ?>"</p>
                    <div class="flex items-center mt-auto border-t border-gray-700 pt-6">
                        <img loading="lazy" decoding="async" src="<?= base_url('uploads/profil/' . $testi['foto']) ?>" alt="<?= $testi['nama'] ?>" 
                             class="w-14 h-14 rounded-full object-cover mr-4 border-2 border-emerald-500/30"
                             onerror="this.src='<?= base_url('assets/images/default-user.svg') ?>'">
                        <div>
                            <h4 class="font-bold text-white text-lg"><?= $testi['nama'] ?></h4>
                            <span class="text-sm text-gray-400">Pengunjung</span>
                        </div>
                    </div>
                </div>
                <?php $delay += 100; endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

    <!-- Tentang Desa Section -->
    <section id="tentang" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[40rem] h-[40rem] bg-emerald-50/50 rounded-full blur-3xl -mr-[20rem] -mt-[20rem] pointer-events-none"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div data-aos="fade-right" class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-[3rem] transform rotate-3 scale-105 opacity-20 blur-lg group-hover:opacity-30 group-hover:rotate-6 transition-all duration-700 -z-10"></div>
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-[3rem] transform -rotate-2 scale-105 -z-10 group-hover:-rotate-4 transition-all duration-700"></div>
                    <div class="rounded-[3rem] overflow-hidden shadow-[0_20px_50px_-10px_rgba(0,0,0,0.2)] border-4 border-white relative z-0">
                        <img src="<?= base_url('assets/images/tentang-desa.png') ?>?v=<?= time() ?>" alt="Tentang Desa Tampa" 
                             class="w-full object-cover h-[400px] sm:h-[550px] group-hover:scale-110 transition-transform duration-1000"
                             onerror="this.src='<?= base_url('assets/images/river_gazebo.png') ?>'">
                    </div>
                    
                    <div class="absolute -bottom-10 -right-4 sm:-right-10 bg-white/80 backdrop-blur-2xl p-6 md:p-8 rounded-[2.5rem] shadow-[0_20px_50px_-15px_rgba(0,0,0,0.15)] hidden md:block animate-float border border-white group-hover:-translate-y-2 transition-transform duration-500">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-[1.2rem] flex items-center justify-center shadow-lg shadow-emerald-500/30 text-white text-3xl">
                                <i class="fas fa-tree"></i>
                            </div>
                            <div>
                                <p class="text-[11px] text-gray-500 font-bold uppercase tracking-widest mb-0.5">Lingkungan</p>
                                <p class="font-black text-gray-900 text-xl tracking-tight">Asri & Terjaga</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" class="lg:pl-10">
                    <div class="inline-flex items-center gap-2 bg-emerald-50/80 backdrop-blur-sm border border-emerald-100/50 text-emerald-600 rounded-full px-5 py-2.5 mb-8 font-bold text-sm shadow-sm">
                        <span class="relative flex h-2 w-2 mr-1">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Jelajahi Keindahan
                    </div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-6 tracking-tight leading-tight">Pesona Alam <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">Desa Tampa</span></h2>
                    <p class="text-gray-500 mb-6 leading-relaxed text-lg md:text-xl font-medium">
                        Selamat datang di Desa Tampa, surga kecil yang memadukan gemercik air sungai jernih dengan hembusan angin sejuk perbukitan hijau. Kami menawarkan pelarian sempurna dari hiruk-pikuk perkotaan.
                    </p>
                    <p class="text-gray-500 mb-10 leading-relaxed text-lg md:text-xl font-medium">
                        Nikmati ketenangan hakiki di bawah rindangnya pepohonan tropis dan gazebo tradisional kami. Harmoni alam Tampa siap merangkul jiwa Anda dan memberikan pengalaman wisata yang tak terlupakan.
                    </p>
                    <a href="<?= base_url('tentang') ?>" class="inline-flex items-center bg-gradient-to-r from-gray-900 to-gray-800 hover:from-emerald-600 hover:to-teal-600 text-white px-9 py-4 rounded-full font-bold shadow-[0_15px_30px_-10px_rgba(0,0,0,0.3)] hover:shadow-[0_20px_40px_-10px_rgba(16,185,129,0.4)] hover:-translate-y-1 transition-all duration-300 text-lg">
                        Kenali Lebih Dalam <i class="fas fa-arrow-right ml-3 bg-white/20 p-2 rounded-full text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
