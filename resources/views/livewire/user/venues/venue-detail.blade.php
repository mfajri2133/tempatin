<div>
    <!-- ================= CONTENT ================= -->
    <section class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- ===== LEFT CONTENT ===== -->
        <div class="lg:col-span-2 space-y-10 text-black">

            <!-- ===== JUDUL & LOKASI ===== -->
            <div>
                <h2 class="text-2xl font-semibold">Hotel Cihuy</h2>
                <p class="text-gray-500 text-sm mt-1 flex items-center gap-1">
                    {{ $venue->city_name }}, Jawa Barat
                </p>
            </div>

            <div class="relative overflow-hidden rounded-xl group shadow-lg">
                <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&q=80&w=1200"
                    alt="Meeting Room Hotel Cihuy"
                    class="w-full h-[300px] md:h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
            </div>

            <!-- ===== UKURAN / LAYOUT / KAPASITAS ===== -->
            <div class="border rounded-lg p-5">
                <h3 class="text-sm font-semibold text-gray-500 mb-4">
                    Kapasitas & kategori
                </h3>

                <div class="grid grid-cols-2 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <p class="text-gray-400">Kapasitas</p>
                        <p class="font-medium">10 Orang</p>
                    </div>

                    <div>
                        <p class="text-gray-400">Kategori</p>
                        <p class="font-medium">Hotel</p>
                    </div>
                </div>
            </div>

            <!-- ===== DESKRIPSI ===== -->
            <div>
                <h3 class="text-sm font-semibold text-gray-500 mb-3">
                    Deskripsi
                </h3>

                <p class="text-sm text-gray-700 leading-relaxed">
                    Hotel Cihuy adalah ruangan meeting eksklusif dengan setup boardroom
                    yang nyaman untuk diskusi strategis, interview, maupun pelatihan.
                    Dilengkapi pencahayaan optimal dan desain interior modern yang
                    menciptakan suasana profesional. lorem100
                </p>
            </div>
        </div>


        <!-- ===== SIDEBAR RIGHT BOOKING ===== -->
        <div class="bg-white border rounded-lg overflow-hidden h-fit sticky top-10 shadow-sm w-full max-w-[400px]">

            <div class="bg-[#2D2D2D] text-white p-4 flex items-center justify-center gap-2">
                <span class="text-yellow-500">🏆</span>
                <p class="text-xl font-bold">Rp 300.000/ jam</p>
            </div>

            <div class="p-5 space-y-4">
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <span>Ketersediaan Jam</span>
                    </div>
                    <button
                        class="text-green-600 border border-green-600 px-3 py-1 rounded-full text-xs font-medium hover:bg-green-50">
                        Lihat Ketersediaan
                    </button>
                </div>

                <div class="grid grid-cols-3 gap-2 text-[11px] uppercase font-bold text-gray-500">
                    <span>Tanggal</span>
                    <span>Mulai</span>
                    <span>Sampai</span>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <input type="date" value="2025-12-21"
                        class="border rounded px-2 py-2 text-sm focus:outline-none focus:border-yellow-500">
                    <select class="border rounded px-2 py-2 text-sm focus:outline-none">
                        <option>--</option>
                    </select>
                    <select class="border rounded px-2 py-2 text-sm focus:outline-none">
                        <option>--</option>
                    </select>
                </div>

                <div class="flex items-center justify-between py-2 border-y border-dashed mt-4">
                    <span class="text-xs font-bold text-gray-600 uppercase">Tambah Hari Pemesanan</span>
                    <button
                        class="bg-yellow-500 text-white rounded-full p-1 w-6 h-6 flex items-center justify-center font-bold">
                        +
                    </button>
                </div>

                <div class="space-y-1">
                    <p class="text-xs text-gray-500">Rincian Harga</p>
                    <div class="flex justify-between text-sm font-medium">
                        <span>0 jam x Rp300.000,-</span>
                        <span>Rp0</span>
                    </div>
                </div>

                <div class="border rounded p-3 bg-gray-50 text-[11px] leading-relaxed text-gray-600">
                    <p>
                        Ketersediaan ruangan & kapasitas dapat berubah sewaktu-waktu. Mohon melakukan pengecekan
                        sebelumnya melalui chat <span class="text-yellow-600 font-bold">Whatsapp 081289004848</span> di
                        jam operasional untuk konfirmasi sebelum pemesanan dan pembayaran. XWORK tidak bertanggung jawab
                        apabila terjadi double booking atau ruangan tidak bisa digunakan jika melakukan pemesanan tanpa
                        konfirmasi sebelumnya. Terima kasih
                    </p>
                </div>

                <button
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-4 rounded shadow-md transition-colors uppercase tracking-wider">
                    Book Now
                </button>

                <div class="flex items-start gap-3 pt-2">
                    <div class="bg-gray-200 p-2 rounded-full mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </div>
                    <div class="text-[11px] text-gray-600">
                        <p>Apakah anda membutuhkan :</p>
                        <ul class="list-none">
                            <li>- Survey Lokasi</li>
                            <li>- Harga Spesial untuk pemakaian rutin</li>
                            <li>- Bantuan lainnya</li>
                        </ul>
                        <p class="mt-1">Silahkan hubungi kami di</p>
                        <p class="font-bold">📞 0812-8900-4848</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- In work, do what you enjoy. --}}
</div>
