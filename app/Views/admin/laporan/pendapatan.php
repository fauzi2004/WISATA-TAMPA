<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

    <div class="mb-8" data-aos="fade-up">
        <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Laporan Pendapatan</h3>
        <p class="text-sm text-gray-500 mt-1">Pantau transaksi dan pendapatan tiket objek wisata</p>
    </div>

    <div class="bg-white/90 backdrop-blur-2xl rounded-[2rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white p-6 md:p-8 mb-8 flex flex-col md:flex-row justify-between items-center relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute top-0 right-0 w-48 h-48 bg-emerald-500/10 rounded-full blur-[60px] -mr-10 -mt-10 z-0"></div>
        <div class="relative z-10 w-full md:w-auto mb-4 md:mb-0">
            <form action="" method="GET" class="flex flex-col sm:flex-row items-end gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Mulai Tanggal</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="mulai" value="<?= $mulai ?>" class="datepicker pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none font-medium">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Sampai Tanggal</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="sampai" value="<?= $sampai ?>" class="datepicker pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none font-medium">
                    </div>
                </div>
                <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white font-bold rounded-xl hover:shadow-lg hover:shadow-gray-900/20 hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                    <i class="fas fa-filter mr-2"></i>Filter Data
                </button>
            </form>
        </div>
        
        <div class="relative z-10 bg-gradient-to-br from-teal-900 via-[#102a28] to-emerald-950 rounded-[2rem] p-8 text-white w-full md:w-auto min-w-[320px] shadow-[0_20px_40px_-10px_rgba(13,40,35,0.5)] border border-teal-800/50 overflow-hidden group">
            <!-- Background Graphic (Chart) -->
            <svg class="absolute bottom-0 right-0 w-40 h-24 text-emerald-500/10 transform translate-x-4 translate-y-4 group-hover:scale-110 transition-transform duration-700" viewBox="0 0 100 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 50 L0 30 L20 40 L40 20 L60 30 L80 10 L100 20 L100 50 Z" fill="currentColor"/>
                <path d="M0 30 L20 40 L40 20 L60 30 L80 10 L100 20" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            
            <div class="relative z-10 flex flex-col h-full justify-between gap-8">
                <div class="flex justify-between items-start">
                    <div class="w-16 h-16 bg-emerald-500/10 border border-emerald-400/20 rounded-2xl flex items-center justify-center shadow-[0_0_20px_rgba(16,185,129,0.15)] group-hover:shadow-[0_0_30px_rgba(16,185,129,0.25)] transition-all duration-500">
                        <i class="fas fa-wallet text-3xl text-emerald-400 drop-shadow-[0_0_8px_rgba(52,211,153,0.5)]"></i>
                    </div>
                    <div class="px-4 py-2 border border-emerald-500/30 bg-emerald-500/10 rounded-full flex items-center text-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
                        <span class="text-xs font-black tracking-widest mr-2 uppercase">IDR</span>
                        <i class="fas fa-coins text-sm"></i>
                    </div>
                </div>
                
                <div class="mt-4">
                    <p class="text-gray-400/80 font-black text-[11px] tracking-[0.2em] uppercase mb-1 drop-shadow-sm">Total Pendapatan</p>
                    <h3 class="text-4xl font-black text-emerald-50 tracking-tighter drop-shadow-md flex items-baseline">
                        <span class="text-emerald-400 text-2xl mr-2 font-black">Rp</span> <?= number_format($total_pendapatan, 0, ',', '.') ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-3xl rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-white/80 relative overflow-hidden group/container" data-aos="fade-up" data-aos-delay="200">
        <!-- Dekorasi Background Tabel -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-br from-teal-200/50 to-emerald-300/40 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/container:scale-125 pointer-events-none"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-gradient-to-tr from-cyan-200/30 to-blue-300/30 rounded-full blur-[80px] z-0 transition-transform duration-1000 group-hover/container:scale-125 pointer-events-none"></div>
        
        <div class="px-8 py-6 border-b border-white/50 bg-white/40 backdrop-blur-md flex justify-between items-center relative z-10">
            <h4 class="font-black text-xl text-gray-800 flex items-center"><i class="fas fa-file-invoice-dollar text-emerald-500 mr-3 text-2xl drop-shadow-sm"></i> Rincian Transaksi</h4>
        </div>
        
        <div class="relative z-10 overflow-x-auto custom-scrollbar p-6">
            <table class="w-full min-w-[1000px] border-separate" style="border-spacing: 0 16px;">
                <thead class="sticky top-0 z-20">
                    <tr class="bg-gray-50/80 backdrop-blur-md rounded-2xl">
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest rounded-l-2xl border-b border-gray-200/50">Kode Booking</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">User Pemesan</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Tujuan Wisata</th>
                        <th class="px-8 py-4 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Tanggal Beli</th>
                        <th class="px-8 py-4 text-center text-[10px] font-black text-gray-500 uppercase tracking-widest border-b border-gray-200/50">Tiket</th>
                        <th class="px-8 py-4 text-right text-[10px] font-black text-gray-500 uppercase tracking-widest rounded-r-2xl border-b border-gray-200/50">Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendapatan as $p): ?>
                    <tr class="bg-white hover:bg-emerald-50/30 transition-all duration-300 relative z-10 group/row border-b border-gray-100 last:border-0 hover:shadow-[0_-4px_20px_rgba(16,185,129,0.05),0_4px_20px_rgba(16,185,129,0.05)]">
                        <td class="px-6 py-5 rounded-l-2xl">
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50/50 text-emerald-700 font-mono text-sm font-bold tracking-wide group-hover/row:bg-emerald-100 transition-colors">
                                <i class="fas fa-hashtag text-xs opacity-50"></i><?= $p['kode_booking'] ?>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <?php if (!empty($p['foto_user']) && $p['foto_user'] != 'default.png' && $p['foto_user'] != 'default-user.svg'): ?>
                                    <div class="h-12 w-12 rounded-2xl shadow-sm overflow-hidden border-2 border-white group-hover/row:border-emerald-100 group-hover/row:shadow-[0_8px_15px_rgba(16,185,129,0.2)] transition-all duration-300">
                                        <img src="<?= base_url('uploads/profil/' . $p['foto_user']) ?>" alt="Profile" class="w-full h-full object-cover">
                                    </div>
                                <?php else: ?>
                                    <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-indigo-400 to-purple-500 text-white flex items-center justify-center font-black text-lg shadow-sm border-2 border-white group-hover/row:border-indigo-200 group-hover/row:shadow-[0_8px_15px_rgba(99,102,241,0.3)] transition-all duration-300 transform group-hover/row:scale-110 group-hover/row:rotate-3">
                                        <?= strtoupper(substr($p['nama'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h4 class="font-black text-gray-900 text-sm group-hover/row:text-emerald-600 transition-colors"><?= $p['nama'] ?></h4>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 font-bold text-[11px] border border-blue-100 shadow-[0_2px_10px_rgba(59,130,246,0.1)] uppercase tracking-wider group-hover/row:shadow-[0_5px_15px_rgba(59,130,246,0.2)] transition-all">
                                <div class="w-5 h-5 rounded-full bg-blue-200/50 flex items-center justify-center mr-2 text-blue-600"><i class="fas fa-map-marker-alt text-[10px]"></i></div>
                                <?= $p['nama_wisata'] ?>
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-xl bg-gray-50 flex items-center justify-center text-gray-500 shadow-sm border border-gray-100"><i class="fas fa-calendar-alt text-xs"></i></div>
                                <p class="text-sm text-gray-600 font-bold"><?= date('d M Y', strtotime($p['created_at'])) ?></p>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <div class="inline-flex items-center gap-2 bg-gradient-to-br from-indigo-50 to-blue-50 border border-indigo-100 text-indigo-700 font-black px-4 py-1.5 rounded-full text-sm shadow-sm group-hover/row:shadow-md transition-shadow relative overflow-hidden group/ticket">
                                <div class="absolute inset-y-0 left-0 w-1 bg-indigo-400"></div>
                                <?= $p['jumlah_tiket'] ?> <i class="fas fa-ticket-alt opacity-70 text-xs"></i>
                            </div>
                        </td>
                        <td class="px-6 py-5 flex justify-end rounded-r-2xl">
                            <div class="flex items-center text-lg text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-xl border border-emerald-100 shadow-sm group-hover/row:border-emerald-200 group-hover/row:bg-emerald-50 transition-colors w-max">
                                <span class="text-[10px] font-black mr-2 px-1.5 py-0.5 bg-emerald-600 text-white rounded-[4px] uppercase tracking-wider">IDR</span>
                                <span class="font-bold tracking-tight"><?= number_format($p['total_harga'], 0, ',', '.') ?></span>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($pendapatan)): ?>
        <div class="text-center py-16 relative z-10 border-t border-white/50">
            <div class="w-24 h-24 bg-white/60 backdrop-blur-md rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                <i class="fas fa-receipt text-4xl text-emerald-200"></i>
            </div>
            <h4 class="text-lg font-bold text-gray-900">Belum ada transaksi lunas</h4>
            <p class="text-gray-500 text-sm mt-1">Pendapatan pada periode ini kosong.</p>
        </div>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* Custom Premium Theme for Flatpickr matching Emerald scheme */
    .flatpickr-calendar {
        background: #ffffff;
        border: 1px solid rgba(16, 185, 129, 0.2);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-radius: 1.5rem;
        padding: 10px;
        font-family: inherit;
    }
    .flatpickr-months {
        margin-bottom: 10px;
    }
    .flatpickr-month {
        color: #111827;
        fill: #111827;
    }
    .flatpickr-current-month .flatpickr-monthDropdown-months {
        font-weight: 800;
        color: #065f46;
    }
    .flatpickr-current-month .numInputWrapper {
        border-radius: 0.5rem;
    }
    span.flatpickr-weekday {
        color: #059669;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }
    .flatpickr-day {
        border-radius: 0.75rem;
        color: #374151;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    .flatpickr-day:hover, .flatpickr-day.prevMonthDay:hover, .flatpickr-day.nextMonthDay:hover, .flatpickr-day:focus, .flatpickr-day.prevMonthDay:focus, .flatpickr-day.nextMonthDay:focus {
        background: #d1fae5;
        border-color: #d1fae5;
        color: #065f46;
        transform: scale(1.1);
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay {
        background: linear-gradient(to right, #10b981, #059669);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.39);
        font-weight: 800;
    }
    .flatpickr-day.today {
        border-color: #10b981;
        color: #10b981;
    }
    .flatpickr-day.today:hover, .flatpickr-day.today:focus {
        border-color: #10b981;
        background: #ecfdf5;
        color: #065f46;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d-m-Y",
            locale: "id",
            disableMobile: "true"
        });
    });
</script>
<?= $this->endSection() ?>
