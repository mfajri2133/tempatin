<main class="w-full">
    <!-- Hero Section -->
    <section class="w-full min-h-screen bg-cover bg-center flex items-center justify-center relative"
        style="background-image: url('{{ asset('image/hotel1.2.webp') }}');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/70 z-0"></div>

        <!-- Content -->
        <div class="relative z-20 w-full max-w-5xl px-6 text-center text-white">
            <!-- JUDUL -->
            <h1 class="text-3xl md:text-5xl font-black mb-6 uppercase tracking-tight leading-tight">
                Booking Venue Jadi <span class="text-indigo-600">Lebih Mudah</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-10 max-w-3xl mx-auto font-medium">
                Platform terpercaya untuk sewa venue di Jawa Barat. Dari meeting room hingga lapangan olahraga, semua
                ada di sini.
            </p>

            <!-- SUBTITLE -->
            <p class="text-white/75 text-sm tracking-widest uppercase font-bold">
                150+ Venue Terverifikasi · 27 Kota & Kabupaten · Booking Instan
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
                <a href="{{ route('venues.index') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-xl font-black text-lg transition-all duration-300 hover:scale-105 shadow-2xl">
                    Cari Venue Sekarang
                </a>
                <a href="#cara-booking"
                    class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border-2 border-white text-white px-8 py-4 rounded-xl font-black text-lg transition-all duration-300">
                    Cara Booking
                </a>
            </div>
        </div>
    </section>

    <!-- Ruang Terbaik Section -->
    <section class="py-10 md:py-12 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <h1 class="text-4xl md:text-6xl font-black text-gray-100 tracking-tighter leading-none">
                        <span class="text-indigo-600">RUANG TERBAIK</span>
                    </h1>
                    <p class="mt-8 text-gray-600 text-lg max-w-md leading-relaxed font-medium">
                        Temukan Venue berkualitas di Jawa Barat untuk setiap kebutuhan seperti Corporate Event,
                        Celebration, hingga Sports Activity.
                    </p>

                    <div class="flex flex-wrap gap-x-6 gap-y-4 border-t border-gray-800 pt-10 mt-10">
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Aula
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Co-Working Space
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Convention Hall
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Event Space
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Gedung Serbaguna
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Lapangan
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Outdoor Venue
                        </span>
                        <span
                            class="text-gray-500 text-xs uppercase font-bold hover:text-indigo-500 cursor-pointer transition-colors">
                            Ruang Meeting
                        </span>
                    </div>
                </div>
                <div class="order-1 lg:order-2 flex gap-4 h-100 md:h-100">
                    <div class="w-2/3 rounded-2xl overflow-hidden relative group shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=80&w=1000&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="w-1/3 flex flex-col gap-4">
                        <div class="h-1/2 rounded-2xl overflow-hidden relative group shadow-xl">
                            <img src="https://images.unsplash.com/photo-1620735692151-26a7e0748429?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="h-1/2 rounded-2xl overflow-hidden relative group shadow-xl">
                            <img src="https://images.unsplash.com/photo-1715333157357-a8e4acdd7992?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Booking Section -->
    <section class="py-16 bg-[#0f0f0f]" id="cara-booking">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tighter">
                    Cara <span class="text-indigo-600">Booking</span>
                </h2>
                <p class="text-gray-400 mt-4">Hanya 3 langkah mudah untuk menyewa venue impianmu</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="relative group">
                    <div
                        class="bg-gradient-to-br from-indigo-600/10 to-purple-600/10 rounded-2xl p-8 border border-indigo-600/20 hover:border-indigo-600/50 transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-600/20">
                        <div
                            class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-black">1</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Cari Venue</h3>
                        <p class="text-gray-400 text-sm">Temukan venue sesuai kebutuhanmu dengan filter lokasi,
                            kapasitas, dan harga</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative group">
                    <div
                        class="bg-gradient-to-br from-indigo-600/10 to-purple-600/10 rounded-2xl p-8 border border-indigo-600/20 hover:border-indigo-600/50 transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-600/20">
                        <div
                            class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-black">2</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Pilih Jadwal</h3>
                        <p class="text-gray-400 text-sm">Pilih tanggal dan waktu yang tersedia, lalu lakukan pembayaran
                            dengan aman</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative group">
                    <div
                        class="bg-gradient-to-br from-indigo-600/10 to-purple-600/10 rounded-2xl p-8 border border-indigo-600/20 hover:border-indigo-600/50 transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-600/20">
                        <div
                            class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white text-2xl font-black">3</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Nikmati Acaramu</h3>
                        <p class="text-gray-400 text-sm">Datang sesuai jadwal dan nikmati venue dengan fasilitas lengkap
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinasi Terpopuler Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-3xl md:text-5xl font-black text-gray-500 text-bold italic uppercase tracking-tighter">
                    Destinasi
                    <span class="text-indigo-600 non-italic">Terpopuler</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div
                    class="md:col-span-2 h-80 relative rounded-xl overflow-hidden group cursor-pointer shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <img src="https://images.unsplash.com/photo-1590476355683-96c1859f4658?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8">
                        <h3 class="text-white text-3xl font-black uppercase italic">Bandung</h3>
                        <p class="text-gray-400 text-sm mt-1">68 Venue Tersedia</p>
                    </div>
                </div>

                <div
                    class="h-80 relative rounded-xl overflow-hidden group cursor-pointer shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <img src="https://images.unsplash.com/photo-1670555384851-11a28337f9b8?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8">
                        <h3 class="text-white text-xl font-black uppercase italic">Bogor</h3>
                        <p class="text-gray-400 text-xs">42 Venue</p>
                    </div>
                </div>

                <div
                    class="h-80 relative rounded-xl overflow-hidden group cursor-pointer shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <img src="https://images.unsplash.com/photo-1555043722-4523972f07ee?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8">
                        <h3 class="text-white text-xl font-black uppercase italic">Bekasi</h3>
                        <p class="text-gray-400 text-xs">25 Venue</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>