<div>
    {{-- Hero Section (Tetap dipertahankan dari about-blade) --}}
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
                    FAQ
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Temukan jawaban atas pertanyaan Anda mengenai layanan TempatIN.
                </p>
            </div>
        </div>
    </section>

    {{-- FAQ Content Section --}}
    {{-- FAQ Content Section --}}
    <div class="bg-slate-50 flex items-center justify-center min-h-screen p-6">
        <div class="max-w-5xl w-full mx-auto">

            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mt-6 mb-4">Cari jawaban di sini</h2>
                <p class="text-slate-500 text-lg">Temukan jawaban cepat untuk pertanyaan yang sering diajukan pelanggan
                    kami.</p>
            </div>

            <div class="space-y-4">
                {{-- FAQ Item 1 --}}
                {{-- Perubahan: Ditambahkan name="faq" --}}
                <details name="faq"
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100"
                    open>
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span
                                    class="text-indigo-600 font-bold group-open:text-white transition-colors text-sm">01</span>
                            </div>
                            <h3
                                class="text-lg md:text-xl font-bold text-slate-800 group-open:text-indigo-600 transition-colors">
                                Apa itu TempatIN?
                            </h3>
                        </div>
                        <div class="relative w-6 h-6 flex items-center justify-center">
                            <span
                                class="absolute text-2xl text-slate-400 group-open:opacity-0 transition-opacity">+</span>
                            <span
                                class="absolute text-2xl text-indigo-600 opacity-0 group-open:opacity-100 transition-opacity">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        <p>
                            TempatIN adalah platform penyewaan tempat yang memudahkan pengguna untuk mencari, melihat
                            detail, dan menyewa berbagai venue seperti aula, gedung, ruang meeting, hingga tempat
                            acara lainnya secara online.
                        </p>
                    </div>
                </details>

                {{-- FAQ Item 2 --}}
                {{-- Perubahan: Ditambahkan name="faq" --}}
                <details name="faq"
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100">
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span
                                    class="text-indigo-600 font-bold group-open:text-white transition-colors text-sm">02</span>
                            </div>
                            <h3
                                class="text-lg md:text-xl font-bold text-slate-800 group-open:text-indigo-600 transition-colors">
                                Bagaimana cara menyewa tempat di TempatIN?
                            </h3>
                        </div>
                        <div class="relative w-6 h-6 flex items-center justify-center">
                            <span
                                class="absolute text-2xl text-slate-400 group-open:opacity-0 transition-opacity">+</span>
                            <span
                                class="absolute text-2xl text-indigo-600 opacity-0 group-open:opacity-100 transition-opacity">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        Anda cukup memilih tempat yang diinginkan, melihat detail serta ketersediaannya, lalu melakukan
                        pemesanan melalui sistem yang telah disediakan di website.
                    </div>
                </details>

                {{-- FAQ Item 3 --}}
                {{-- Perubahan: Ditambahkan name="faq" --}}
                <details name="faq"
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100">
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span
                                    class="text-indigo-600 font-bold group-open:text-white transition-colors text-sm">03</span>
                            </div>
                            <h3
                                class="text-lg md:text-xl font-bold text-slate-800 group-open:text-indigo-600 transition-colors">
                                Apakah harga sewa sudah termasuk fasilitas?
                            </h3>
                        </div>
                        <div class="relative w-6 h-6 flex items-center justify-center">
                            <span
                                class="absolute text-2xl text-slate-400 group-open:opacity-0 transition-opacity">+</span>
                            <span
                                class="absolute text-2xl text-indigo-600 opacity-0 group-open:opacity-100 transition-opacity">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        Setiap tempat memiliki fasilitas yang berbeda-beda. Informasi fasilitas seperti kapasitas,
                        parkir, AC, dan perlengkapan lainnya dapat dilihat pada halaman detail tempat.
                    </div>
                </details>

                {{-- FAQ Item 4 --}}
                {{-- Perubahan: Ditambahkan name="faq" --}}
                <details name="faq"
                    class="group bg-white rounded-2xl border border-slate-200 shadow-sm transition-all duration-300 open:shadow-md open:ring-1 open:ring-indigo-100">
                    <summary class="flex items-center justify-between cursor-pointer list-none p-6 md:p-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center group-open:bg-indigo-600 transition-colors">
                                <span
                                    class="text-indigo-600 font-bold group-open:text-white transition-colors text-sm">04</span>
                            </div>
                            <h3
                                class="text-lg md:text-xl font-bold text-slate-800 group-open:text-indigo-600 transition-colors">
                                Bagaimana cara membatalkan booking?
                            </h3>
                        </div>
                        <div class="relative w-6 h-6 flex items-center justify-center">
                            <span
                                class="absolute text-2xl text-slate-400 group-open:opacity-0 transition-opacity">+</span>
                            <span
                                class="absolute text-2xl text-indigo-600 opacity-0 group-open:opacity-100 transition-opacity">−</span>
                        </div>
                    </summary>
                    <div class="px-6 pb-8 md:px-20 text-slate-600 leading-relaxed border-t border-slate-50 pt-4">
                        Pembatalan booking dapat dilakukan dengan menekan tombol "<b>Batalkan</b>" pada halaman
                        pemesanan.
                        Setelah itu, akan muncul notifikasi konfirmasi untuk memastikan apakah Anda benar-benar ingin
                        membatalkan booking tersebut.
                    </div>
                </details>
            </div>
        </div>
    </div>
</div>
