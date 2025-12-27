<div>
    {{-- Hero Section with Full Image --}}
    <section class="relative h-screen w-full overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/about.jpg') }}');">
            {{-- Overlay with gradient --}}
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-indigo-900/50"></div>
        </div>
        {{-- Content --}}
        <div class="relative z-10 flex items-center justify-center h-full px-4">
            <div class="text-center text-white max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                    TERMS & CONDITIONS
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Platform terpercaya untuk menemukan dan memesan venue sempurna untuk setiap kebutuhan Anda.
                </p>
            </div>
        </div>
    </section>

    <div class="min-h-screen bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">
                    Terms & Conditions
                </h1>
                <p class="text-lg text-slate-500 max-w-2xl mx-auto">
                    Harap baca syarat dan ketentuan penggunaan layanan TempatIN dengan seksama sebelum menggunakan
                    platform kami.
                </p>
            </div>

            <div class="space-y-4">
                <details
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100"
                    open>
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span class="text-indigo-600 font-bold group-open:text-white">1</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Syarat Penggunaan</h3>
                        </div>
                        <div class="relative w-6 h-6">
                            <span
                                class="absolute inset-0 text-2xl text-slate-400 group-open:opacity-0 transition-opacity">+</span>
                            <span
                                class="absolute inset-0 text-2xl text-indigo-600 opacity-0 group-open:opacity-100 transition-opacity">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        <p class="mb-4">
                            Dengan mengakses dan menggunakan platform <strong>TempatIN</strong>, Anda setuju untuk
                            terikat dengan syarat dan ketentuan ini. Layanan kami dirancang untuk membantu Anda
                            menemukan dan memesan venue secara efisien.
                        </p>
                        <p class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-lg text-sm italic">
                            Pengguna wajib memberikan informasi yang akurat saat melakukan pendaftaran. Kami berhak
                            menangguhkan akun jika ditemukan penyalahgunaan.
                        </p>
                    </div>
                </details>

                <details
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100">
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span class="text-indigo-600 font-bold group-open:text-white">2</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Pembayaran & Biaya</h3>
                        </div>
                        <div class="relative w-6 h-6 text-2xl text-slate-400">
                            <span class="group-open:hidden">+</span>
                            <span class="hidden group-open:block text-indigo-600">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        Semua transaksi dilakukan melalui sistem pembayaran resmi kami. Biaya layanan mungkin berlaku
                        untuk setiap transaksi yang berhasil dilakukan. Harga yang tertera ditentukan oleh penyedia
                        venue dan dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.
                    </div>
                </details>

                <details
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100">
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span class="text-indigo-600 font-bold group-open:text-white">3</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Pembatalan & Refund</h3>
                        </div>
                        <div class="relative w-6 h-6 text-2xl text-slate-400">
                            <span class="group-open:hidden">+</span>
                            <span class="hidden group-open:block text-indigo-600">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        Kebijakan pembatalan bergantung pada masing-masing penyedia venue. Harap periksa rincian
                        kebijakan pembatalan di halaman detail venue sebelum melakukan pembayaran. Refund akan diproses
                        sesuai dengan durasi waktu dan syarat yang berlaku pada masing-masing jenis venue.
                    </div>
                </details>

                <details
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100">
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span class="text-indigo-600 font-bold group-open:text-white">4</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Hak Kekayaan Intelektual</h3>
                        </div>
                        <div class="relative w-6 h-6 text-2xl text-slate-400">
                            <span class="group-open:hidden">+</span>
                            <span class="hidden group-open:block text-indigo-600">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        Seluruh konten, logo, grafis, dan desain yang terdapat pada platform adalah milik sah TempatIN
                        dan dilindungi oleh undang-undang hak cipta Republik Indonesia. Penggunaan tanpa izin tertulis
                        merupakan pelanggaran hukum.
                    </div>
                </details>
            </div>
        </div>
