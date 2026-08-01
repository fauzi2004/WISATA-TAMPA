<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <!-- Hero Section -->
    <section class="relative pt-44 pb-52 bg-cover bg-center overflow-hidden" style="background-image: url('<?= base_url('assets/images/tentang-desa.png') ?>');">
        <div class="absolute inset-0 bg-emerald-950/40 mix-blend-overlay z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-50 via-gray-900/40 to-transparent z-0"></div>
        <div class="relative container mx-auto px-4 text-center z-10" data-aos="fade-down" data-aos-duration="1000">
            <span class="inline-flex items-center justify-center bg-white/10 backdrop-blur-xl border border-white/20 text-emerald-100 px-6 py-2.5 rounded-full font-black tracking-widest uppercase mb-8 shadow-2xl text-xs sm:text-sm shadow-black/20">
                <span class="w-2 h-2 rounded-full bg-emerald-400 mr-3 animate-pulse"></span>
                Kisah Desa Tampa
            </span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-br from-white to-emerald-100 tracking-tight mb-8 drop-shadow-[0_5px_15px_rgba(0,0,0,0.5)] leading-tight">Mengenal Lebih <br/>Dekat</h1>
            <p class="text-emerald-50/90 text-lg md:text-2xl max-w-3xl mx-auto drop-shadow-md font-medium leading-relaxed">Menyelami lebih dalam pesona alam, visi mulia, dan rentetan sejarah dari desa wisata kebanggaan kita bersama.</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 -mt-32 relative z-20">
        <div class="container mx-auto px-4 max-w-6xl">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Kolom Utama (Kiri) -->
                <div class="lg:col-span-2">
                    <?php if ($profile): ?>
                    <div data-aos="fade-up" data-aos-delay="100" class="bg-white/90 backdrop-blur-3xl p-10 md:p-14 rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] h-full border border-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/5 rounded-full blur-[80px] -mr-20 -mt-20 group-hover:bg-emerald-500/10 transition-colors duration-700"></div>
                        <div class="absolute -bottom-10 -right-10 text-emerald-500/5 text-9xl z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-700"><i class="fas fa-leaf"></i></div>
                        <div class="relative z-10">
                            <div class="flex items-center space-x-6 mb-10 border-b border-gray-100/50 pb-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-[1.5rem] flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 transform -rotate-3 group-hover:rotate-0 transition-transform duration-500">
                                    <i class="fas fa-leaf text-4xl drop-shadow-md"></i>
                                </div>
                                <div>
                                    <h4 class="text-emerald-600 font-black tracking-widest uppercase text-sm mb-1">PROFIL UTAMA</h4>
                                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight leading-tight"><?= $profile["judul"] ?></h2>
                                </div>
                            </div>
                            <div class="prose max-w-none text-gray-600 leading-relaxed text-lg md:text-xl font-medium">
                                <p><?= nl2br($profile["konten"]) ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Kolom Tambahan (Kanan) -->
                <div class="lg:col-span-1 space-y-6" data-aos="fade-left" data-aos-delay="300">
                    <!-- Highlight 1 -->
                    <div class="bg-gradient-to-br from-emerald-500/95 to-teal-600/95 backdrop-blur-2xl rounded-[2.5rem] p-8 text-white shadow-[0_15px_40px_-10px_rgba(16,185,129,0.3)] relative overflow-hidden group hover:-translate-y-2 hover:shadow-[0_20px_50px_-10px_rgba(16,185,129,0.5)] transition-all duration-500 border border-white/20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-white/20 transition-colors duration-500"></div>
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 shadow-inner border border-white/30 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-tree text-2xl text-emerald-50 drop-shadow-sm"></i>
                        </div>
                        <h3 class="text-2xl font-black mb-3 tracking-tight">Pesona Alam Asri</h3>
                        <p class="text-emerald-50/90 text-[15px] leading-relaxed font-medium">Dikelilingi oleh pepohonan rindang dan udara segar yang akan menyegarkan kembali pikiran Anda dari hiruk pikuk kota.</p>
                    </div>
                    
                    <!-- Highlight 2 -->
                    <div class="bg-gradient-to-br from-blue-500/95 to-indigo-600/95 backdrop-blur-2xl rounded-[2.5rem] p-8 text-white shadow-[0_15px_40px_-10px_rgba(59,130,246,0.3)] relative overflow-hidden group hover:-translate-y-2 hover:shadow-[0_20px_50px_-10px_rgba(59,130,246,0.5)] transition-all duration-500 border border-white/20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-white/20 transition-colors duration-500"></div>
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 shadow-inner border border-white/30 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-water text-2xl text-blue-50 drop-shadow-sm"></i>
                        </div>
                        <h3 class="text-2xl font-black mb-3 tracking-tight">Gemercik Air Jernih</h3>
                        <p class="text-blue-50/90 text-[15px] leading-relaxed font-medium">Nikmati aliran air sungai yang jernih dan menenangkan. Tempat sempurna untuk bermain air atau sekadar bersantai.</p>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <?php if ($visi): ?>
                <div data-aos="fade-right" data-aos-delay="200" class="bg-white/80 backdrop-blur-2xl rounded-[3rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] p-10 md:p-12 hover:shadow-[0_20px_50px_-15px_rgba(16,185,129,0.1)] transition-all duration-500 border border-white relative overflow-hidden group hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-500/5 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-emerald-500/10 transition-colors duration-700"></div>
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-[1.25rem] flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/30 text-white transform group-hover:rotate-6 transition-transform duration-500 border border-emerald-300/50">
                            <i class="fas fa-eye text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 mb-4 tracking-tight">Visi</h3>
                        <p class="text-gray-600 leading-relaxed font-medium text-lg flex-grow"><?= nl2br($visi["konten"]) ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($misi): ?>
                <div data-aos="fade-left" data-aos-delay="300" class="bg-white/80 backdrop-blur-2xl rounded-[3rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] p-10 md:p-12 hover:shadow-[0_20px_50px_-15px_rgba(59,130,246,0.1)] transition-all duration-500 border border-white relative overflow-hidden group hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-blue-500/5 rounded-full blur-3xl -mr-10 -mt-10 group-hover:bg-blue-500/10 transition-colors duration-700"></div>
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-[1.25rem] flex items-center justify-center mb-6 shadow-lg shadow-blue-500/30 text-white transform group-hover:-rotate-6 transition-transform duration-500 border border-blue-300/50">
                            <i class="fas fa-bullseye text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 mb-4 tracking-tight">Misi</h3>
                        <p class="text-gray-600 leading-relaxed font-medium text-lg flex-grow"><?= nl2br($misi["konten"]) ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php if ($sejarah): ?>
            <div data-aos="fade-up" data-aos-delay="400" class="bg-gradient-to-br from-amber-50 to-orange-50/50 backdrop-blur-2xl rounded-[3rem] shadow-[0_15px_50px_-15px_rgba(245,158,11,0.15)] p-10 md:p-16 relative overflow-hidden border border-amber-100/50 group hover:shadow-[0_25px_60px_-15px_rgba(245,158,11,0.2)] transition-all duration-500 hover:-translate-y-2">
                <div class="absolute bottom-0 right-0 text-amber-500/5 text-[15rem] leading-none -mb-10 -mr-10 transform -rotate-12 group-hover:scale-110 transition-transform duration-700"><i class="fas fa-landmark"></i></div>
                <div class="relative z-10">
                    <div class="flex items-center space-x-6 mb-10 border-b border-amber-200/50 pb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-400 to-orange-500 rounded-[1.5rem] flex items-center justify-center text-white shadow-lg shadow-amber-500/30 transform rotate-3 group-hover:rotate-0 transition-transform duration-500">
                            <i class="fas fa-history text-4xl drop-shadow-md"></i>
                        </div>
                        <div>
                            <h4 class="text-amber-600 font-black tracking-widest uppercase text-sm mb-1">RENTETAN WAKTU</h4>
                            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight leading-tight">Sejarah</h2>
                        </div>
                    </div>
                    <div class="prose max-w-none text-gray-700 leading-relaxed text-lg md:text-xl font-medium">
                        <p><?= nl2br($sejarah["konten"]) ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

<?= $this->endSection() ?>
