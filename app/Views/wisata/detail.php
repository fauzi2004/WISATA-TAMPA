<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <!-- Header Image -->
    <section class="relative pt-24 pb-32 overflow-hidden flex items-end min-h-[70vh]">
        <!-- Watermark Background Text -->
        <div class="absolute inset-0 flex items-center justify-center overflow-hidden pointer-events-none z-0 select-none opacity-20">
            <h2 class="text-[8vw] font-black text-white whitespace-nowrap drop-shadow-[0_0_20px_rgba(255,255,255,0.5)] transform -rotate-2 scale-110">
                Selamat Datang di Wisata <?= $wisata['nama_wisata'] ?>
            </h2>
        </div>

        <div class="absolute inset-0 z-0">
            <img src="<?= base_url('uploads/wisata/' . $wisata['gambar']) ?>" alt="<?= $wisata['nama_wisata'] ?>" 
                 class="w-full h-full object-cover transform scale-105"
                 onerror="this.src='<?= base_url('assets/images/river_gazebo.png') ?>'">
        </div>
        <div class="absolute inset-0 bg-emerald-900/40 mix-blend-overlay z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-transparent to-transparent z-0"></div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent z-10"></div>
        
        <div class="container mx-auto px-4 relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <div class="max-w-4xl relative">
                <span class="inline-block bg-white/20 backdrop-blur-md border border-white/50 text-emerald-300 px-5 py-2 rounded-2xl text-xs font-black tracking-widest uppercase mb-4 shadow-[0_4px_20px_rgba(0,0,0,0.2)]">
                    <?= $wisata['nama_kategori'] ?>
                </span>
                
                <h3 class="text-2xl md:text-3xl font-bold text-emerald-100 mb-2 drop-shadow-md tracking-wide">
                    Selamat Datang di Wisata
                </h3>
                
                <h1 class="text-5xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-emerald-100 to-white mb-4 drop-shadow-[0_5px_15px_rgba(0,0,0,0.5)] tracking-tighter leading-[1.1]"><?= $wisata['nama_wisata'] ?></h1>
                <p class="text-xl text-gray-300 font-light flex items-center">
                    <i class="fas fa-map-marker-alt text-red-400 mr-3"></i><?= $wisata['lokasi'] ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 -mt-20 relative z-20 bg-white/90 backdrop-blur-3xl rounded-t-[3rem] shadow-[0_-20px_50px_rgba(0,0,0,0.1)] border-t border-white/50">
        <!-- Decorative Background -->
        <div class="absolute top-40 right-0 w-96 h-96 bg-emerald-100 rounded-full blur-[100px] opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Deskripsi -->
                    <div class="bg-white/80 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white p-8 md:p-10 relative overflow-hidden group hover:shadow-[0_20px_50px_-15px_rgba(16,185,129,0.1)] transition-all duration-500" data-aos="fade-up">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-50 rounded-full blur-[80px] -mr-20 -mt-20 group-hover:bg-emerald-100/50 transition-colors duration-500"></div>
                        <h2 class="text-3xl font-black text-gray-900 mb-6 border-b border-gray-100/50 pb-5 relative z-10 flex items-center">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-emerald-400 to-teal-500 rounded-full mr-4"></span>Tentang Destinasi Ini
                        </h2>
                        <div class="prose max-w-none text-gray-600 leading-relaxed text-lg relative z-10 font-medium">
                            <p><?= nl2br($wisata['deskripsi']) ?></p>
                        </div>
                    </div>

                    <!-- Galeri -->
                    <?php if (count($galeri) > 0): ?>
                    <div class="bg-white/80 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white p-8 md:p-10 relative overflow-hidden group hover:shadow-[0_20px_50px_-15px_rgba(16,185,129,0.1)] transition-all duration-500" data-aos="fade-up">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b border-gray-100/50 pb-5 relative z-10 flex items-center">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-teal-400 to-blue-500 rounded-full mr-4"></span>Galeri Memukau
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 relative z-10">
                            <?php foreach ($galeri as $g): ?>
                            <div class="relative overflow-hidden rounded-[1.5rem] group/img cursor-pointer shadow-sm hover:shadow-xl transition-all duration-300" onclick="openImage(this.querySelector('img').src)">
                                <img src="<?= base_url('uploads/galeri/' . $g['url_gambar']) ?>" 
                                     alt="<?= $g['keterangan'] ?>" 
                                     class="w-full h-56 object-cover group-hover/img:scale-110 transition duration-700">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                                    <i class="fas fa-expand text-white text-4xl drop-shadow-lg transform scale-50 group-hover/img:scale-100 transition-transform duration-300"></i>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Fasilitas -->
                    <?php if (count($fasilitas) > 0): ?>
                    <div class="bg-white/80 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white p-8 md:p-10 relative overflow-hidden group hover:shadow-[0_20px_50px_-15px_rgba(16,185,129,0.1)] transition-all duration-500" data-aos="fade-up">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b border-gray-100/50 pb-5 relative z-10 flex items-center">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-amber-300 to-amber-500 rounded-full mr-4"></span>
                            <i class="fas fa-star text-amber-400 mr-3 drop-shadow-sm"></i> Fasilitas Unggulan
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 relative z-10">
                            <?php $delay_fas = 100; foreach ($fasilitas as $fas): ?>
                            <div data-aos="fade-up" data-aos-delay="<?= $delay_fas ?>" class="bg-white backdrop-blur-3xl border border-gray-200/80 rounded-[2.2rem] overflow-hidden group/fas shadow-[0_8px_30px_-5px_rgba(0,0,0,0.08)] hover:border-emerald-200/80 hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.2)] transition-all duration-500 transform hover:-translate-y-3 p-3 flex flex-col h-full relative">
                                <!-- Glowing Background Effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/10 to-teal-500/10 opacity-0 group-hover/fas:opacity-100 transition-opacity duration-700 blur-2xl z-0 pointer-events-none"></div>
                                
                                <?php if (!empty($fas['foto'])): ?>
                                    <div class="h-56 overflow-hidden relative rounded-[1.8rem] shadow-inner flex-shrink-0 z-10 border border-white/50">
                                        <!-- Animated Image Glow -->
                                        <div class="absolute inset-0 bg-emerald-500/20 opacity-0 group-hover/fas:opacity-100 transition-opacity duration-500 mix-blend-overlay z-10 pointer-events-none"></div>
                                        
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/30 to-transparent z-10 opacity-70 group-hover/fas:opacity-50 transition-opacity duration-500"></div>
                                        <img src="<?= base_url('uploads/fasilitas/' . $fas['foto']) ?>" alt="<?= $fas['nama_fasilitas'] ?>" class="w-full h-full object-cover group-hover/fas:scale-[1.15] group-hover/fas:rotate-1 transition-all duration-700 ease-out relative z-0">
                                        
                                        <div class="absolute bottom-5 left-5 right-5 z-20 flex items-center transform group-hover/fas:translate-y-[-5px] transition-transform duration-500">
                                            <div class="w-12 h-12 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center text-white mr-4 border border-white/40 shadow-[0_8px_20px_rgba(0,0,0,0.2)] group-hover/fas:scale-110 group-hover/fas:bg-emerald-500 group-hover/fas:border-emerald-400 group-hover/fas:shadow-emerald-500/50 group-hover/fas:rotate-12 transition-all duration-500 flex-shrink-0">
                                                <i class="<?= $fas['ikon'] ?? 'fas fa-check' ?> drop-shadow-md text-lg"></i>
                                            </div>
                                            <h4 class="text-white font-black text-2xl truncate drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] tracking-tight group-hover/fas:text-emerald-300 transition-colors duration-300"><?= $fas['nama_fasilitas'] ?></h4>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="h-56 bg-gradient-to-br from-emerald-50 to-teal-50 flex flex-col items-center justify-center relative rounded-[1.8rem] border border-emerald-100/50 shadow-inner flex-shrink-0 z-10">
                                        <div class="w-20 h-20 bg-white rounded-[1.5rem] shadow-[0_8px_30px_rgba(16,185,129,0.15)] flex items-center justify-center mb-5 group-hover/fas:scale-110 group-hover/fas:-rotate-12 group-hover/fas:shadow-[0_15px_40px_rgba(16,185,129,0.3)] transition-all duration-500 border border-emerald-50/50">
                                            <i class="<?= $fas['ikon'] ?? 'fas fa-check' ?> text-4xl text-emerald-500 drop-shadow-sm group-hover/fas:text-emerald-600 transition-colors"></i>
                                        </div>
                                        <h4 class="text-gray-900 font-black text-2xl z-20 text-center px-4 tracking-tight group-hover/fas:text-emerald-700 transition-colors"><?= $fas['nama_fasilitas'] ?></h4>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($fas['deskripsi'])): ?>
                                <div class="px-6 py-6 flex-grow relative z-10">
                                    <p class="text-[15px] text-gray-500 leading-relaxed font-medium line-clamp-4 group-hover/fas:text-gray-700 transition-colors duration-300"><?= $fas['deskripsi'] ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php $delay_fas += 100; endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Info Penting -->
                    <div class="bg-white/60 backdrop-blur-3xl rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 p-8 md:p-10 relative overflow-hidden group hover:shadow-[0_25px_60px_-15px_rgba(245,158,11,0.15)] transition-all duration-500" data-aos="fade-up">
                        <div class="absolute top-0 right-0 w-80 h-80 bg-gradient-to-br from-amber-400/20 to-orange-500/20 rounded-full blur-[80px] -mr-20 -mt-20 group-hover:bg-amber-400/30 transition-all duration-700 group-hover:scale-110"></div>
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b border-gray-100/50 pb-5 relative z-10 flex items-center tracking-tight">
                            <span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 text-white flex items-center justify-center mr-4 shadow-lg shadow-amber-500/30 transform group-hover:rotate-12 transition-transform duration-500">
                                <i class="fas fa-exclamation text-xl"></i>
                            </span>
                            Info Penting & Aturan
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 relative z-10">
                            <!-- Card 1 -->
                            <div class="group/card flex items-start bg-white/40 backdrop-blur-xl p-5 rounded-2xl border border-white shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(245,158,11,0.1)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-br from-amber-50/50 to-orange-50/50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-100 to-orange-100 text-amber-600 flex items-center justify-center flex-shrink-0 shadow-sm border border-white group-hover/card:scale-110 group-hover/card:rotate-6 transition-transform duration-300 relative z-10">
                                    <i class="fas fa-trash-alt text-lg"></i>
                                </div>
                                <div class="ml-4 relative z-10">
                                    <h4 class="font-black text-gray-800 tracking-tight text-lg group-hover/card:text-amber-700 transition-colors">Jaga Kebersihan</h4>
                                    <p class="text-sm text-gray-500 mt-1.5 leading-relaxed font-medium group-hover/card:text-gray-700 transition-colors">Buanglah sampah pada tempat yang telah disediakan untuk menjaga kelestarian desa.</p>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="group/card flex items-start bg-white/40 backdrop-blur-xl p-5 rounded-2xl border border-white shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(59,130,246,0.1)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-cyan-50/50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-100 to-cyan-100 text-blue-600 flex items-center justify-center flex-shrink-0 shadow-sm border border-white group-hover/card:scale-110 group-hover/card:-rotate-6 transition-transform duration-300 relative z-10">
                                    <i class="fas fa-camera text-lg"></i>
                                </div>
                                <div class="ml-4 relative z-10">
                                    <h4 class="font-black text-gray-800 tracking-tight text-lg group-hover/card:text-blue-700 transition-colors">Bawa Kamera</h4>
                                    <p class="text-sm text-gray-500 mt-1.5 leading-relaxed font-medium group-hover/card:text-gray-700 transition-colors">Jangan lupa siapkan kamera Anda, banyak spot foto indah yang sayang untuk dilewatkan!</p>
                                </div>
                            </div>
                            <!-- Card 3 -->
                            <div class="group/card flex items-start bg-white/40 backdrop-blur-xl p-5 rounded-2xl border border-white shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(16,185,129,0.1)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 to-teal-50/50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-100 to-teal-100 text-emerald-600 flex items-center justify-center flex-shrink-0 shadow-sm border border-white group-hover/card:scale-110 group-hover/card:rotate-6 transition-transform duration-300 relative z-10">
                                    <i class="fas fa-tshirt text-lg"></i>
                                </div>
                                <div class="ml-4 relative z-10">
                                    <h4 class="font-black text-gray-800 tracking-tight text-lg group-hover/card:text-emerald-700 transition-colors">Pakaian Nyaman</h4>
                                    <p class="text-sm text-gray-500 mt-1.5 leading-relaxed font-medium group-hover/card:text-gray-700 transition-colors">Gunakan pakaian yang nyaman dan bawa pakaian ganti jika Anda berencana bermain air.</p>
                                </div>
                            </div>
                            <!-- Card 4 -->
                            <div class="group/card flex items-start bg-white/40 backdrop-blur-xl p-5 rounded-2xl border border-white shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(168,85,247,0.1)] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-50/50 to-fuchsia-50/50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-fuchsia-100 text-purple-600 flex items-center justify-center flex-shrink-0 shadow-sm border border-white group-hover/card:scale-110 group-hover/card:-rotate-6 transition-transform duration-300 relative z-10">
                                    <i class="fas fa-child text-lg"></i>
                                </div>
                                <div class="ml-4 relative z-10">
                                    <h4 class="font-black text-gray-800 tracking-tight text-lg group-hover/card:text-purple-700 transition-colors">Awasi Anak-anak</h4>
                                    <p class="text-sm text-gray-500 mt-1.5 leading-relaxed font-medium group-hover/card:text-gray-700 transition-colors">Harap selalu mengawasi anak-anak Anda, terutama saat berada di area sungai atau ketinggian.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimoni -->
                    <?php if (count($testimoni_list) > 0): ?>
                    <div class="bg-white/80 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white p-8 md:p-10 relative overflow-hidden" data-aos="fade-up">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b border-gray-100/50 pb-5 flex items-center tracking-tight">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-blue-400 to-indigo-500 rounded-full mr-4"></span>
                            Testimoni Pengunjung
                        </h2>
                        <div class="space-y-6">
                            <?php foreach ($testimoni_list as $testi): ?>
                            <div class="bg-gray-50/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-100 hover:shadow-md transition-shadow">
                                <div class="flex items-center mb-4">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-gradient-to-tr from-emerald-400 to-teal-400 rounded-full blur-sm opacity-50"></div>
                                        <img src="<?= base_url('uploads/profil/' . $testi['foto']) ?>" alt="<?= $testi['nama'] ?>" 
                                             class="w-14 h-14 rounded-full object-cover mr-4 shadow-sm border-[3px] border-white relative z-10"
                                            onerror="this.src='<?= base_url('assets/images/default-user.svg') ?>'">
                                    </div>
                                    <div>
                                        <h4 class="font-black text-gray-900 text-lg"><?= $testi['nama'] ?></h4>
                                        <div class="text-amber-400 text-xs flex gap-0.5 mt-1">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="fas fa-star <?= $i <= $testi['rating'] ? 'drop-shadow-sm' : 'text-gray-300' ?>"></i>
                                            <?php endfor; ?>
                                            <span class="text-gray-400 ml-3 font-medium tracking-wide"><?= date('d M Y', strtotime($testi['created_at'])) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 font-medium italic leading-relaxed text-lg">"<?= $testi['komentar'] ?>"</p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Form Tambah Testimoni -->
                    <?php if (session()->get('isLoggedIn')): ?>
                    <div class="bg-white/60 backdrop-blur-3xl rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 p-8 md:p-10 relative overflow-hidden group/form hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.15)] transition-all duration-500" data-aos="fade-up">
                        <!-- Animated Glowing Background -->
                        <div class="absolute top-0 right-0 w-80 h-80 bg-gradient-to-br from-emerald-400/20 to-teal-500/20 rounded-full blur-[80px] -mr-20 -mt-20 group-hover/form:bg-emerald-400/30 transition-all duration-700 group-hover/form:scale-110"></div>
                        
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b border-gray-100/50 pb-5 tracking-tight flex items-center relative z-10">
                            <span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-500 text-white flex items-center justify-center mr-4 shadow-lg shadow-emerald-500/30 transform group-hover/form:rotate-12 transition-transform duration-500">
                                <i class="fas fa-comment-dots text-xl"></i>
                            </span>
                            Tinggalkan Testimoni
                        </h2>
                        <form action="<?= base_url('testimoni/simpan') ?>" method="POST" class="space-y-6 relative z-10">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_wisata" value="<?= $wisata['id'] ?>">
                            
                            <div class="group/input relative">
                                <label class="block text-gray-700 font-black text-[11px] uppercase tracking-widest mb-3">Rating Bintang</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-5 text-emerald-500/80 group-focus-within/input:text-emerald-500 group-focus-within/input:scale-110 transition-all duration-300 pointer-events-none z-10"><i class="fas fa-star text-lg"></i></span>
                                    <select name="rating" class="w-full pl-14 pr-5 py-5 bg-white/70 backdrop-blur-xl border border-white/80 rounded-[1.2rem] focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-400 focus:shadow-[0_10px_25px_-5px_rgba(16,185,129,0.15)] transition-all duration-300 text-gray-800 font-bold shadow-[0_4px_15px_-3px_rgba(0,0,0,0.03)] group-hover/input:border-emerald-300/50 outline-none appearance-none cursor-pointer" required>
                                        <option value="">-- Pilih Rating --</option>
                                        <option value="5">⭐⭐⭐⭐⭐ (5/5) Sangat Memuaskan</option>
                                        <option value="4">⭐⭐⭐⭐ (4/5) Memuaskan</option>
                                        <option value="3">⭐⭐⭐ (3/5) Cukup Baik</option>
                                        <option value="2">⭐⭐ (2/5) Kurang Memuaskan</option>
                                        <option value="1">⭐ (1/5) Mengecewakan</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-gray-500">
                                        <i class="fas fa-chevron-down text-sm transition-transform group-focus-within/input:rotate-180 duration-300"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group/input relative">
                                <label class="block text-gray-700 font-black text-[11px] uppercase tracking-widest mb-3">Komentar / Pengalaman Anda</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-5 text-emerald-500/80 group-focus-within/input:text-emerald-500 group-focus-within/input:scale-110 transition-all duration-300 pointer-events-none z-10"><i class="fas fa-pen text-lg"></i></span>
                                    <textarea name="komentar" rows="4" class="w-full pl-14 pr-5 py-5 bg-white/70 backdrop-blur-xl border border-white/80 rounded-[1.2rem] focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-400 focus:shadow-[0_10px_25px_-5px_rgba(16,185,129,0.15)] transition-all duration-300 text-gray-800 font-medium shadow-[0_4px_15px_-3px_rgba(0,0,0,0.03)] group-hover/input:border-emerald-300/50 outline-none" placeholder="Ceritakan pengalaman seru Anda berkunjung ke sini..." required></textarea>
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full text-white font-black py-5 px-8 rounded-[1.2rem] bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 shadow-[0_10px_30px_-5px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_40px_-5px_rgba(16,185,129,0.5)] transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center group/btn text-lg tracking-wide">
                                <i class="fas fa-paper-plane mr-3 group-hover/btn:animate-bounce"></i>KIRIM TESTIMONI
                            </button>
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="bg-gradient-to-r from-emerald-800 to-teal-900 rounded-[2.5rem] p-8 border border-emerald-500/40 flex flex-col md:flex-row items-center justify-between shadow-[0_20px_50px_-15px_rgba(16,185,129,0.4)] hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.6)] relative overflow-hidden group transform hover:-translate-y-1 transition-all duration-500" data-aos="fade-up">
                        <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-400/20 rounded-full blur-[80px] -mr-20 -mt-20 group-hover:bg-teal-400/30 group-hover:scale-150 transition-all duration-1000 ease-out pointer-events-none"></div>
                        <div class="absolute bottom-0 left-0 w-40 h-40 bg-teal-500/20 rounded-full blur-[60px] -ml-10 -mb-10 group-hover:bg-emerald-500/30 group-hover:scale-125 transition-all duration-700 ease-out pointer-events-none"></div>
                        
                        <div class="flex items-center relative z-10 mb-6 md:mb-0">
                            <div class="w-16 h-16 bg-white/10 backdrop-blur-md text-emerald-300 rounded-2xl flex items-center justify-center text-2xl flex-shrink-0 mr-5 border border-white/10 shadow-[0_8px_20px_rgba(0,0,0,0.2)] group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                                <i class="fas fa-lock group-hover:animate-pulse"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-white text-xl tracking-tight mb-1 group-hover:text-emerald-100 transition-colors duration-300">Ingin Berbagi Pengalaman?</h4>
                                <p class="text-sm text-emerald-100/80 font-medium">Silakan login ke akun Anda untuk meninggalkan testimoni berharga.</p>
                            </div>
                        </div>
                        <a href="<?= base_url('login?redirect=' . urlencode('wisata/detail/' . $wisata['id'])) ?>" class="w-full md:w-auto whitespace-nowrap bg-white text-emerald-900 font-black px-8 py-4 rounded-xl shadow-[0_8px_20px_rgba(0,0,0,0.15)] hover:shadow-[0_15px_30px_rgba(16,185,129,0.3)] hover:-translate-y-1.5 hover:bg-emerald-50 transition-all duration-300 relative z-10 flex items-center justify-center group/btn">
                            <i class="fas fa-sign-in-alt mr-2 text-emerald-500 group-hover/btn:translate-x-1 transition-transform duration-300"></i> Login Sekarang
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1" data-aos="fade-left">
                    <div class="sticky top-28 space-y-6">
                        
                        <!-- Statistik Kunjungan -->
                        <div class="bg-gradient-to-br from-emerald-900 via-teal-900 to-emerald-950 rounded-[2rem] p-8 text-white shadow-[0_20px_50px_-15px_rgba(16,185,129,0.5)] relative overflow-hidden group border border-emerald-500/30 hover:border-emerald-400/60 transition-all duration-700 hover:shadow-[0_25px_60px_-15px_rgba(16,185,129,0.6)] hover:-translate-y-1">
                            <!-- Animated Glow Effects -->
                            <div class="absolute top-0 right-0 w-64 h-64 bg-teal-400/20 rounded-full blur-[60px] -mr-20 -mt-20 group-hover:bg-teal-300/40 group-hover:scale-125 transition-all duration-1000 ease-in-out"></div>
                            <div class="absolute bottom-0 left-0 w-48 h-48 bg-emerald-400/20 rounded-full blur-[50px] -ml-20 -mb-20 group-hover:bg-emerald-300/40 group-hover:scale-125 transition-all duration-1000 ease-in-out"></div>
                            
                            <!-- Floating Background Icon -->
                            <i class="fas fa-chart-pie absolute -bottom-6 -right-6 text-8xl text-white/5 transform group-hover:scale-[1.4] group-hover:-rotate-[20deg] transition-all duration-1000 ease-out z-0"></i>
                            
                            <h3 class="text-xl font-black mb-6 flex items-center relative z-10 tracking-tight text-emerald-50 group-hover:text-white transition-colors duration-500">
                                <span class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-600 flex items-center justify-center mr-4 border border-emerald-400/50 shadow-[0_0_20px_rgba(52,211,153,0.3)] group-hover:shadow-[0_0_30px_rgba(52,211,153,0.5)] transition-all duration-500 relative overflow-hidden transform group-hover:rotate-6">
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 ease-in-out"></div>
                                    <i class="fas fa-chart-line text-white text-lg group-hover:scale-110 transition-transform duration-500"></i>
                                </span>
                                Statistik Kunjungan
                            </h3>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 relative z-10">
                                <div class="bg-white/10 rounded-2xl p-5 border border-white/20 backdrop-blur-md hover:bg-emerald-800/60 hover:border-emerald-300/50 hover:shadow-[0_10px_30px_-5px_rgba(16,185,129,0.4)] hover:-translate-y-2 transition-all duration-500 shadow-inner cursor-default overflow-hidden relative group/card">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-emerald-300/20 to-transparent translate-x-[-100%] group-hover/card:translate-x-[100%] transition-transform duration-1000 ease-in-out"></div>
                                    <div class="text-emerald-200/90 text-[10px] font-black uppercase tracking-widest mb-1 group-hover/card:text-white transition-colors">7 Hari Terakhir</div>
                                    <div class="text-4xl font-black flex items-end drop-shadow-md text-white group-hover/card:scale-105 group-hover/card:translate-x-1 origin-left transition-transform duration-500">
                                        <?= $kunjungan_7_hari ?> <span class="text-xs font-bold text-emerald-300 ml-1.5 mb-1.5 uppercase tracking-widest">Tiket</span>
                                    </div>
                                </div>
                                <div class="bg-white/10 rounded-2xl p-5 border border-white/20 backdrop-blur-md hover:bg-emerald-800/60 hover:border-emerald-300/50 hover:shadow-[0_10px_30px_-5px_rgba(16,185,129,0.4)] hover:-translate-y-2 transition-all duration-500 shadow-inner cursor-default overflow-hidden relative group/card delay-75">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-emerald-300/20 to-transparent translate-x-[-100%] group-hover/card:translate-x-[100%] transition-transform duration-1000 ease-in-out"></div>
                                    <div class="text-emerald-200/90 text-[10px] font-black uppercase tracking-widest mb-1 group-hover/card:text-white transition-colors">1 Bulan Terakhir</div>
                                    <div class="text-4xl font-black flex items-end drop-shadow-md text-white group-hover/card:scale-105 group-hover/card:translate-x-1 origin-left transition-transform duration-500">
                                        <?= $kunjungan_30_hari ?> <span class="text-xs font-bold text-emerald-300 ml-1.5 mb-1.5 uppercase tracking-widest">Tiket</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pemesanan -->
                        <div class="bg-white/90 backdrop-blur-2xl rounded-[2rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.1)] p-8 md:p-10 border border-white relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-[60px] -mr-20 -mt-20 group-hover:bg-emerald-500/20 transition-all duration-700"></div>
                            
                            <h3 class="text-3xl font-black text-gray-900 mb-8 flex items-center relative z-10 tracking-tight">
                                <span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-500 text-white flex items-center justify-center mr-4 shadow-lg shadow-emerald-500/30 transform -rotate-12 group-hover:rotate-0 transition-transform duration-500">
                                    <i class="fas fa-ticket-alt text-xl"></i>
                                </span>
                                Pesan Tiket
                            </h3>
                            
                            <!-- Info -->
                            <div class="space-y-4 mb-10 relative z-10">
                                <div class="flex justify-between items-center bg-gray-50/80 px-6 py-5 rounded-2xl border border-gray-100 hover:border-emerald-200 hover:bg-white transition-all shadow-sm hover:shadow-md">
                                    <span class="text-gray-500 font-bold text-sm uppercase tracking-widest flex items-center"><i class="far fa-clock mr-3 text-emerald-500 text-lg"></i>Jam Buka</span>
                                    <span class="font-black text-gray-900 bg-white border border-gray-100 px-4 py-1.5 rounded-xl shadow-sm text-lg"><?= date('H:i', strtotime($wisata['jam_buka'])) ?> - <?= date('H:i', strtotime($wisata['jam_tutup'])) ?></span>
                                </div>
                                <div class="flex justify-between items-center bg-gradient-to-r from-emerald-50 to-teal-50 px-6 py-5 rounded-2xl border border-emerald-100/50 hover:border-emerald-300 transition-all shadow-sm hover:shadow-md">
                                    <span class="text-emerald-700 font-bold text-sm uppercase tracking-widest flex items-center"><i class="fas fa-tag mr-3 text-emerald-500 text-lg"></i>Harga</span>
                                    <span class="font-black text-emerald-600 text-2xl drop-shadow-sm"><?= $wisata['harga_tiket'] > 0 ? 'Rp ' . number_format($wisata['harga_tiket'], 0, ',', '.') : 'Gratis' ?></span>
                                </div>
                            </div>

                            <?php if (session()->get('isLoggedIn')): ?>
                                <!-- Form Pemesanan -->
                                <form action="<?= base_url('pesanan/proses') ?>" method="POST" class="space-y-5 relative z-10">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id_wisata" value="<?= $wisata['id'] ?>">
                                    <input type="hidden" name="id_user" value="<?= session()->get('user_id') ?>">
                                    
                                    <div class="group/input">
                                        <label class="block text-gray-700 mb-2 font-black text-[11px] uppercase tracking-widest">Tanggal Kunjungan</label>
                                        <div class="relative">
                                            <input type="date" name="tanggal_kunjungan" 
                                                   class="w-full pl-4 pr-4 py-4 bg-white/60 backdrop-blur-xl border border-white/80 rounded-[1.2rem] focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-400 focus:shadow-[0_10px_25px_-5px_rgba(16,185,129,0.15)] transition-all duration-300 font-bold text-gray-800 shadow-[0_4px_15px_-3px_rgba(0,0,0,0.03)] group-hover/input:border-emerald-300/50 outline-none"
                                                   min="<?= date('Y-m-d') ?>" required>
                                        </div>
                                    </div>

                                    <div class="group/input">
                                        <label class="block text-gray-700 mb-2 font-black text-[11px] uppercase tracking-widest">Jumlah Tiket</label>
                                        <div class="relative flex items-center">
                                            <div class="absolute left-5 text-emerald-500/80 group-focus-within/input:text-emerald-500 group-focus-within/input:scale-110 transition-all duration-300"><i class="fas fa-users text-lg"></i></div>
                                            <input type="number" name="jumlah_tiket" id="jumlah_tiket" 
                                                   class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-xl border border-white/80 rounded-[1.2rem] focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-400 focus:shadow-[0_10px_25px_-5px_rgba(16,185,129,0.15)] transition-all duration-300 font-black text-gray-800 shadow-[0_4px_15px_-3px_rgba(0,0,0,0.03)] group-hover/input:border-emerald-300/50 text-xl outline-none"
                                                   min="1" value="1" required>
                                        </div>
                                    </div>

                                    <div class="bg-gradient-to-br from-emerald-50/80 to-teal-50/80 backdrop-blur-xl rounded-[1.5rem] p-5 border border-emerald-100/50 mt-6 shadow-[0_8px_20px_rgba(16,185,129,0.05)] relative overflow-hidden group/total hover:shadow-[0_15px_30px_rgba(16,185,129,0.1)] transition-all duration-300">
                                        <div class="absolute -right-4 -bottom-4 text-emerald-500/10 text-6xl group-hover/total:scale-110 group-hover/total:-rotate-6 transition-transform duration-500"><i class="fas fa-receipt"></i></div>
                                        <div class="flex justify-between items-center mb-3 relative z-10">
                                            <span class="text-emerald-800/70 font-bold text-sm">Harga satuan</span>
                                            <span class="font-black text-emerald-900"><?= $wisata['harga_tiket'] > 0 ? 'Rp ' . number_format($wisata['harga_tiket'], 0, ',', '.') : 'Gratis' ?></span>
                                        </div>
                                        <div class="w-full h-px bg-gradient-to-r from-transparent via-emerald-200/60 to-transparent mb-3 relative z-10"></div>
                                        <div class="flex justify-between items-center relative z-10">
                                            <span class="font-black text-emerald-950 uppercase tracking-widest text-[11px] bg-emerald-100/50 px-3 py-1 rounded-full border border-emerald-200/50">Total Bayar</span>
                                            <span class="font-black text-emerald-600 text-3xl drop-shadow-sm group-hover/total:scale-105 transition-transform duration-300 origin-right" id="total_harga"><?= $wisata['harga_tiket'] > 0 ? 'Rp ' . number_format($wisata['harga_tiket'], 0, ',', '.') : 'Gratis' ?></span>
                                        </div>
                                    </div>

                                    <button type="submit" 
                                            class="w-full btn-premium bg-gradient-to-r from-emerald-600 to-teal-500 text-white py-4 rounded-xl font-bold text-lg hover:from-emerald-500 hover:to-teal-400 shadow-[0_10px_20px_rgba(16,185,129,0.3)] mt-6 flex items-center justify-center group/btn overflow-hidden relative">
                                        <div class="absolute inset-0 w-full h-full bg-white/20 -translate-x-full group-hover/btn:animate-[shimmer_1s_infinite]"></div>
                                        <i class="fas fa-shopping-cart mr-2 group-hover/btn:-rotate-12 transition-transform"></i>Pesan Sekarang
                                    </button>
                                </form>
                            <?php else: ?>
                                <div class="text-center py-8 px-6 bg-gray-50/80 rounded-3xl border border-gray-100 shadow-inner relative z-10">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-5 text-emerald-500 text-3xl shadow-md border border-emerald-50">
                                        <i class="fas fa-lock text-emerald-400"></i>
                                    </div>
                                    <h4 class="font-bold text-gray-900 mb-2">Akses Terkunci</h4>
                                    <p class="text-gray-500 mb-8 font-medium text-sm leading-relaxed">Silakan masuk ke akun Anda terlebih dahulu untuk dapat memesan tiket wisata eksklusif ini.</p>
                                    <a href="<?= base_url('login?redirect=' . urlencode('wisata/detail/' . $wisata['id'])) ?>" 
                                       class="block w-full btn-premium bg-gradient-to-r from-emerald-600 to-teal-500 text-white py-4 rounded-xl font-bold hover:shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fas fa-sign-in-alt mr-2"></i>Login Sekarang
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Peta Lokasi -->
                        <div class="bg-white/90 backdrop-blur-2xl rounded-[2rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.1)] border border-white overflow-hidden relative group">
                            <div class="p-8 pb-4 relative z-10 flex items-center justify-between">
                                <div>
                                    <h3 class="text-2xl font-black text-gray-900 flex items-center tracking-tight">
                                        <div class="w-10 h-10 rounded-xl bg-red-50 text-red-500 flex items-center justify-center mr-3 border border-red-100 shadow-inner">
                                            <i class="fas fa-location-dot"></i>
                                        </div>
                                        Lokasi Pintar
                                    </h3>
                                </div>
                            </div>
                            
                            <div class="w-full h-72 relative overflow-hidden group-hover:scale-[1.02] transition-transform duration-500 mt-4 rounded-b-[2rem]">
                                <div class="absolute inset-0 bg-blue-500/5 z-10 pointer-events-none group-hover:bg-transparent transition-colors duration-500"></div>
                                <iframe 
                                    width="100%" 
                                    height="100%" 
                                    src="https://maps.google.com/maps?q=<?= urlencode($wisata['lokasi'] . ', Desa Tampa, Kecamatan Ponrang, Kabupaten Luwu, Provinsi Sulawesi Selatan') ?>&t=m&z=15&ie=UTF8&iwloc=&output=embed" 
                                    frameborder="0" 
                                    scrolling="no" 
                                    marginheight="0" 
                                    marginwidth="0"
                                    class="grayscale-[20%] contrast-110 group-hover:grayscale-0 transition-all duration-700">
                                </iframe>
                                
                                <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($wisata['lokasi'] . ', Desa Tampa, Kecamatan Ponrang, Kabupaten Luwu, Provinsi Sulawesi Selatan') ?>" target="_blank" rel="noopener noreferrer" class="absolute bottom-6 right-6 bg-white/95 backdrop-blur-xl text-blue-600 px-5 py-2.5 rounded-full font-black text-sm tracking-wide shadow-lg hover:bg-blue-600 hover:text-white transition-all duration-300 z-20 flex items-center border border-white">
                                    <i class="fas fa-location-arrow mr-2 animate-pulse"></i>Buka di Maps
                                </a>
                            </div>
                        </div>

                        <!-- Hubungi Kami & Bagikan -->
                        <div class="bg-gradient-to-br from-emerald-50/80 to-teal-50/80 backdrop-blur-2xl rounded-[2rem] shadow-[0_15px_50px_-15px_rgba(16,185,129,0.2)] border border-emerald-100/50 p-8 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-[50px] -mr-10 -mt-10 group-hover:bg-emerald-500/20 transition-all duration-700"></div>
                            
                            <h3 class="text-2xl font-black text-gray-900 mb-6 flex items-center relative z-10 tracking-tight">
                                <span class="w-10 h-10 rounded-xl bg-white text-emerald-500 flex items-center justify-center mr-3 shadow-sm border border-emerald-50">
                                    <i class="fas fa-headset text-lg"></i>
                                </span>
                                Kontak Resmi
                            </h3>
                            
                            <div class="space-y-4 relative z-10 mb-8">
                                <?php if (!empty($wisata['kontak_wa'])): ?>
                                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $wisata['kontak_wa']) ?>" target="_blank" class="flex items-center bg-white/80 p-4 rounded-2xl hover:bg-white transition-all shadow-sm hover:shadow-md border border-white group/link hover:-translate-y-1">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 text-white rounded-xl flex items-center justify-center mr-4 shadow-sm shadow-green-500/30 flex-shrink-0 group-hover/link:scale-110 transition-transform">
                                        <i class="fab fa-whatsapp text-2xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">WhatsApp Chat</div>
                                        <div class="text-gray-900 font-black text-base tracking-wide"><?= $wisata['kontak_wa'] ?></div>
                                    </div>
                                </a>
                                <?php endif; ?>
                                
                                <?php if (!empty($wisata['kontak_email'])): ?>
                                <a href="mailto:<?= $wisata['kontak_email'] ?>" class="flex items-center bg-white/80 p-4 rounded-2xl hover:bg-white transition-all shadow-sm hover:shadow-md border border-white group/link hover:-translate-y-1">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 text-white rounded-xl flex items-center justify-center mr-4 shadow-sm shadow-blue-500/30 flex-shrink-0 group-hover/link:scale-110 transition-transform">
                                        <i class="fas fa-envelope text-xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1">Email Resmi</div>
                                        <div class="text-gray-900 font-black text-sm truncate tracking-wide"><?= $wisata['kontak_email'] ?></div>
                                    </div>
                                </a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal Gambar -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-50 p-4" onclick="closeImage()">
        <button class="absolute top-4 right-4 text-white text-4xl" onclick="closeImage()">&times;</button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-screen rounded-lg" onclick="event.stopPropagation()">
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Hitung total harga
    document.getElementById('jumlah_tiket')?.addEventListener('input', function() {
        const harga = <?= $wisata['harga_tiket'] ?>;
        const jumlah = this.value;
        const total = harga * jumlah;
        document.getElementById('total_harga').textContent = 'Rp ' + total.toLocaleString('id-ID');
    });

    // Modal gambar
    function openImage(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('imageModal').classList.add('flex');
    }

    function closeImage() {
        document.getElementById('imageModal').classList.add('hidden');
        document.getElementById('imageModal').classList.remove('flex');
    }
</script>
<?= $this->endSection() ?>
