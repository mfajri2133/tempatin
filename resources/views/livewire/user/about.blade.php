<div>
    {{-- Hero Section with Full Image --}}
    <section class="relative h-screen w-full overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/about.jpg') }}');">
            {{-- Overlay --}}
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        {{-- Content --}}
        <div class="relative z-10 flex items-center justify-center h-full px-4">
            <div class="text-center text-tp-white max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    Tentang Tempatin
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-tp-white/90">
                    Pilihan utama Anda untuk menemukan dan memesan tempat yang sempurna.
                </p>
                <button
                    class="bg-tp-blue hover:bg-tp-blue-dark text-tp-white font-semibold px-8 py-4 rounded-lg transition duration-300 transform hover:scale-105">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </section>

    {{-- Dummy Content --}}
    <section class="py-16 bg-tp-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="max-w-3xl">
                <h2 class="text-3xl md:text-4xl font-bold text-tp-black">Cerita Kami</h2>
                <p class="mt-4 text-tp-black/75 leading-relaxed">
                    Tempatin adalah platform dimana pengguna dapat menemukan dan memesan tempat yang sempurna untuk
                    berbagai acara.
                    Kami membantu pengguna menemukan tempat yang sesuai dengan kebutuhan mereka.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rounded-xl border border-tp-black p-6">
                    <h3 class="text-lg font-semibold text-tp-black">Misi</h3>
                    <p class="mt-2 text-tp-black/75">
                        Membuat pencarian tempat menjadi cepat, transparan, dan menyenangkan.
                    </p>
                </div>
                <div class="rounded-xl border border-tp-black p-6">
                    <h3 class="text-lg font-semibold text-tp-black">Visi</h3>
                    <p class="mt-2 text-tp-black/75">
                        Membangun pusat terpercaya dimana tempat dan komunitas terhubung melalui pengalaman yang
                        berkesan.
                    </p>
                </div>
                <div class="rounded-xl border border-tp-black p-6">
                    <h3 class="text-lg font-semibold text-tp-black">Apa yang Kami Lakukan</h3>
                    <p class="mt-2 text-tp-black/75">
                        Menyediakan pilihan tempat yang beragam dan mudah diakses untuk berbagai kebutuhan acara.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-tp-bluesky/75">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-bold text-tp-black">Tim Kami</h2>
                    <p class="mt-3 text-tp-black/75">Orang-orang dibalik projek ini.</p>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="rounded-2xl border border-tp-black p-6">
                    <div class="h-12 w-12 rounded-full bg-tp-black/80"></div>
                    <p class="mt-4 font-semibold text-tp-black">Fajri.</p>
                    <p class="text-sm text-tp-black/75">Project Manager & Backend Developer</p>
                </div>
                <div class="rounded-2xl border border-tp-black p-6">
                    <div class="h-12 w-12 rounded-full bg-tp-black/80"></div>
                    <p class="mt-4 font-semibold text-tp-black">Milda.</p>
                    <p class="text-sm text-tp-black/75">Frontend Developer</p>
                </div>
                <div class="rounded-2xl border border-tp-black p-6">
                    <div class="h-12 w-12 rounded-full bg-tp-black/80"></div>
                    <p class="mt-4 font-semibold text-tp-black">Murod.</p>
                    <p class="text-sm text-tp-black/75">Frontend Developer</p>
                </div>
                <div class="rounded-2xl border border-tp-black p-6">
                    <div class="h-12 w-12 rounded-full bg-tp-black/80"></div>
                    <p class="mt-4 font-semibold text-tp-black">Arya.</p>
                    <p class="text-sm text-tp-black/75">Frontend Developer</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-tp-white">
        <div class="max-w-6xl mx-auto px-4">
            <div
                class="rounded-2xl border border-tp-black p-8 md:p-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-2xl md:text-3xl font-bold text-tp-black">Siap untuk menjelajahi tempat?</h2>
                    <p class="mt-3 text-tp-black/75">
                        Temukan, pesan, dan buat kenangan tak terlupakan dengan Tempatin.
                    </p>
                </div>
                <div class="flex gap-3">
                    <a href="#"
                        class="inline-flex items-center justify-center rounded-lg bg-tp-blue px-6 py-3 font-semibold text-white hover:bg-tp-blue-dark">
                        Cari Tempat
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center rounded-lg border border-tp-black px-6 py-3 font-semibold text-tp-black hover:bg-tp-black/5">
                        Kontak Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
