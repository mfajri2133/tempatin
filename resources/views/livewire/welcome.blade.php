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

</main>