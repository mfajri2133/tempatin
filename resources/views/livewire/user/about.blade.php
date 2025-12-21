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
                    Tentang TempatIN
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Platform terpercaya untuk menemukan dan memesan venue sempurna untuk setiap kebutuhan Anda.
                </p>
            </div>
        </div>
    </section>

    {{-- Story Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Cerita Kami</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    TempatIN hadir sebagai solusi modern untuk memudahkan pencarian dan pemesanan venue.
                    Kami menghubungkan penyedia venue dengan mereka yang membutuhkan ruang untuk berbagai keperluan,
                    dari meeting bisnis hingga acara besar.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="group bg-gradient-to-br from-indigo-50 to-white p-8 rounded-2xl border border-indigo-100 hover:border-indigo-300 transition-all duration-300 hover:shadow-xl">
                    <div
                        class="w-14 h-14 bg-indigo-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Misi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Membuat proses pencarian dan booking venue menjadi cepat, transparan, dan efisien untuk semua
                        orang.
                    </p>
                </div>

                <div
                    class="group bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-xl">
                    <div
                        class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi platform #1 di Indonesia yang menghubungkan penyedia venue dengan pengguna melalui
                        pengalaman terbaik.
                    </p>
                </div>

                <div
                    class="group bg-gradient-to-br from-blue-50 to-white p-8 rounded-2xl border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl">
                    <div
                        class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Yang Kami Tawarkan</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Akses ke berbagai jenis venue: gedung serbaguna, ruang meeting, co-working space, dan lainnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Types of Venues Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Jenis Venue yang Tersedia</h2>
                <p class="text-lg text-gray-600">Temukan ruang yang sempurna untuk setiap kebutuhan Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Ruang Meeting --}}
                <div
                    class="bg-white p-6 rounded-xl border border-gray-200 hover:border-indigo-300 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Ruang Meeting</h3>
                    <p class="text-sm text-gray-600">Ruang profesional untuk meeting, presentasi, dan diskusi bisnis
                        dengan fasilitas lengkap</p>
                </div>

                {{-- Co-Working Space --}}
                <div
                    class="bg-white p-6 rounded-xl border border-gray-200 hover:border-purple-300 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Co-Working Space</h3>
                    <p class="text-sm text-gray-600">Ruang kerja bersama yang fleksibel dan produktif untuk freelancer
                        dan startup</p>
                </div>

                {{-- Gedung Serbaguna --}}
                <div
                    class="bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Gedung Serbaguna</h3>
                    <p class="text-sm text-gray-600">Ideal untuk acara besar, seminar, konferensi, dan berbagai kegiatan
                        komunitas</p>
                </div>

                {{-- Event Space --}}
                <div
                    class="bg-white p-6 rounded-xl border border-gray-200 hover:border-green-300 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Event Space</h3>
                    <p class="text-sm text-gray-600">Ruang serbaguna untuk berbagai jenis acara, perayaan, dan
                        gathering</p>
                </div>

                {{-- Ballroom --}}
                <div
                    class="bg-white p-6 rounded-xl border border-gray-200 hover:border-pink-300 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Ballroom</h3>
                    <p class="text-sm text-gray-600">Ruang mewah dan elegan untuk pernikahan, pesta, dan acara formal
                        berskala besar</p>
                </div>

                {{-- Outdoor Venue --}}
                <div
                    class="bg-white p-6 rounded-xl border border-gray-200 hover:border-teal-300 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Outdoor Venue</h3>
                    <p class="text-sm text-gray-600">Ruang terbuka yang sempurna untuk acara outdoor, festival, dan
                        gathering santai</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Tim Kami</h2>
                <p class="text-lg text-gray-600">Orang-orang di balik TempatIN</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="relative mb-6">
                        <div
                            class="h-20 w-20 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold group-hover:scale-110 transition-transform">
                            F
                        </div>
                    </div>
                    <h3 class="text-md font-bold text-gray-900 mb-1">Fajri</h3>
                    <p class="text-xs text-indigo-600 font-semibold mb-2">PM & Fullstack Developer</p>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="relative mb-6">
                        <div
                            class="h-20 w-20 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white text-2xl font-bold group-hover:scale-110 transition-transform">
                            M
                        </div>
                    </div>
                    <h3 class="text-md font-bold text-gray-900 mb-1">Milda</h3>
                    <p class="text-xs text-purple-600 font-semibold mb-2">Frontend Developer</p>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="relative mb-6">
                        <div
                            class="h-20 w-20 rounded-full bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center text-white text-2xl font-bold group-hover:scale-110 transition-transform">
                            M
                        </div>
                    </div>
                    <h3 class="text-md font-bold text-gray-900 mb-1">Murod</h3>
                    <p class="text-xs text-blue-600 font-semibold mb-2">Frontend Developer</p>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-all duration-300 group">
                    <div class="relative mb-6">
                        <div
                            class="h-20 w-20 rounded-full bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center text-white text-2xl font-bold group-hover:scale-110 transition-transform">
                            A
                        </div>
                    </div>
                    <h3 class="text-md font-bold text-gray-900 mb-1">Arya</h3>
                    <p class="text-xs text-green-600 font-semibold mb-2">Frontend Developer</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="relative rounded-3xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
                <div class="relative z-10 p-10 md:p-16 text-center text-white">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        Siap Menemukan Venue Sempurna?
                    </h2>
                    <p class="text-xl mb-8 text-white/90 max-w-2xl mx-auto">
                        Jelajahi ratusan venue berkualitas dan booking dengan mudah. Ciptakan momen tak terlupakan
                        bersama TempatIN.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('venues.index') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-white text-indigo-600 font-semibold px-8 py-4 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                            Cari Venue Sekarang
                        </a>
                        <a
                            class="inline-flex items-center justify-center rounded-xl border-2 border-white text-white font-semibold px-8 py-4 hover:bg-white/10 transition-all duration-300">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
