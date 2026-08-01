<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <!-- Header -->
    <section class="bg-gradient-to-br from-emerald-800 to-gray-900 pt-32 pb-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('<?= base_url('assets/images/pattern.svg') ?>')] opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight drop-shadow-md">Daftar Objek Wisata</h1>
            <p class="text-emerald-100 text-lg max-w-2xl mx-auto">Temukan berbagai objek wisata alam di Desa Tampa dan tentukan destinasi liburan Anda selanjutnya.</p>
        </div>
    </section>

    <!-- Filter & Search -->
    <section class="-mt-10 relative z-20 pb-8">
        <div class="container mx-auto px-4 max-w-4xl" data-aos="fade-up" data-aos-delay="200">
            <div class="glass bg-white/90 p-4 md:p-6 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)]">
                <form action="" method="GET" class="flex flex-col md:flex-row gap-4">
                    <!-- Search -->
                    <div class="flex-1 relative">
                        <input type="text" name="search" placeholder="Cari nama wisata atau lokasi..." 
                               class="w-full pl-12 pr-4 py-4 bg-gray-50/50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all text-gray-700"
                               value="<?= htmlspecialchars($search) ?>">
                        <span class="absolute left-4 top-4 text-gray-400 text-lg"><i class="fas fa-search"></i></span>
                    </div>
                    <button type="submit" class="w-full md:w-auto btn-premium bg-emerald-600 text-white px-10 py-4 rounded-2xl hover:bg-emerald-500 shadow-[0_0_20px_rgba(16,185,129,0.3)] font-bold text-lg">
                        <i class="fas fa-search mr-2"></i>Cari
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- List Wisata -->
    <section class="py-16 relative bg-gradient-to-b from-white via-gray-50/80 to-emerald-50/40">
        <!-- Decorative Background Elements -->
        <div class="absolute top-20 left-0 w-64 h-64 bg-emerald-100 rounded-full blur-[80px] opacity-60"></div>
        <div class="absolute bottom-40 right-0 w-80 h-80 bg-teal-100 rounded-full blur-[80px] opacity-60"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <?php if (count($wisata_list) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
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
                            <i class="fas fa-map-marker-alt text-red-500 mr-1.5 group-hover/card:animate-bounce"></i><?= $wisata['lokasi'] ?>
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
            <?php else: ?>
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Wisata Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba ubah kata kunci pencarian yang Anda gunakan.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

<?= $this->endSection() ?>
