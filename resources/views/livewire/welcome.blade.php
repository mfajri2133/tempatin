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
</main>