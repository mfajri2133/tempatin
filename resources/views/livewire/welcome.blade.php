<main class="w-full">
    <section class="w-full min-h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('image/hiking.jpg') }}');">
        <!-- Overlay (TIDAK NUTUP NAVBAR) -->
        <div class="inset-0 bg-black/70 z-0"></div>

        <!-- Content -->
        <div class="relative z-20 w-full max-w-5xl px-6 text-center text-white">

            <!-- JUDUL -->
            <h1 class="text-3xl md:text-5xl font-semibold mb-10">
                Tempat Ngumpulnya Anak GEN-Z
            </h1>

            <!-- SEARCH -->
            <div
                class="bg-white/90 backdrop-blur rounded-2xl shadow-2xl flex flex-col md:flex-row items-center p-5 gap-4 ring-1 ring-black/5">

                <!-- Kategori -->
                <select
                    class="w-full md:flex-[2] px-4 py-5 rounded-xl text-gray-700 bg-slate-50 border border-gray-200
                focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                transition">
                    <option>Semua Kategori</option>
                </select>

                <!-- Provinsi -->
                <select
                    class="w-full md:flex-[1.5] px-4 py-5 rounded-xl text-gray-700 bg-slate-50 border border-gray-200
                focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                transition">
                    <option>Provinsi</option>
                </select>

                <!-- Button -->
                <button
                    class="md:ml-auto w-full md:w-auto px-8 py-5 rounded-xl font-semibold text-white
                bg-gradient-to-r from-[#2E6FBD] to-[#4F8EEB]hover:from-[#255FA4] hover:to-[#3F7DD6] shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-2">
                    🔍 Search
                </button>
            </div>


            <!-- SUBTITLE -->
            <p class="mt-8 text-indigo-400 text-sm tracking-wide">
                RENCANAKAN KEBUTUHAN MICE BERSAMA SEWAVENUE
            </p>
        </div>
    </section>
</main>
