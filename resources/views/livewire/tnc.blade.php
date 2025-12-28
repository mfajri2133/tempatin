<div>
    <section class="relative h-screen w-full overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/interior4.webp') }}');">
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-indigo-900/50"></div>
        </div>
        <div class="relative z-10 flex items-center justify-center h-full px-4">
            <div class="text-center text-white max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                    SYARAT & KETENTUAN
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Ketentuan Penggunaan Platform TempatIN
                </p>
                <div class="flex items-center justify-center gap-2 text-sm text-white/80">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Terakhir diperbarui: {{ date('d F Y') }}</span>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-slate-50 py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 mb-8 border border-slate-200">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 mb-3">Selamat Datang di TempatIN</h2>
                        <p class="text-slate-600 leading-relaxed">
                            Dengan mengakses dan menggunakan platform <span
                                class="font-semibold text-indigo-600">TempatIN</span>,
                            Anda menyetujui untuk terikat dengan syarat dan ketentuan yang tercantum di bawah ini.
                            Harap membaca dengan seksama sebelum menggunakan layanan kami.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-200">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold text-lg">
                                01
                            </span>
                            <h3 class="text-2xl font-bold text-white">Definisi & Penggunaan Layanan</h3>
                        </div>
                    </div>
                    <div class="p-8 md:p-10">
                        <div class="space-y-4 text-slate-600 leading-relaxed">
                            <p>
                                <strong class="text-slate-900">TempatIN</strong> adalah platform marketplace yang
                                menghubungkan pengguna dengan penyedia venue untuk berbagai keperluan acara, pertemuan,
                                dan aktivitas lainnya.
                            </p>
                            <div class="bg-slate-50 rounded-lg p-5 border-l-4 border-indigo-600">
                                <h4 class="font-semibold text-slate-900 mb-2">Kewajiban Pengguna:</h4>
                                <ul class="space-y-2 text-sm">
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Memberikan informasi yang akurat dan lengkap saat registrasi</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Menjaga kerahasiaan akun dan password Anda</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Menggunakan platform sesuai dengan hukum yang berlaku</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Bertanggung jawab penuh atas aktivitas yang dilakukan dengan akun
                                            Anda</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-200">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold text-lg">
                                02
                            </span>
                            <h3 class="text-2xl font-bold text-white">Pemesanan & Pembayaran</h3>
                        </div>
                    </div>
                    <div class="p-8 md:p-10">
                        <div class="space-y-4 text-slate-600 leading-relaxed">
                            <p>
                                Semua transaksi pemesanan venue dilakukan melalui sistem pembayaran yang terintegrasi
                                dengan platform kami. Pembayaran dapat dilakukan melalui berbagai metode yang tersedia.
                            </p>
                            <div class="grid md:grid-cols-2 gap-4 my-6">
                                <div class="bg-emerald-50 rounded-lg p-5 border border-emerald-200">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h4 class="font-semibold text-emerald-900">Konfirmasi Otomatis</h4>
                                    </div>
                                    <p class="text-sm text-emerald-700">Pemesanan dikonfirmasi langsung setelah
                                        pembayaran berhasil</p>
                                </div>
                                <div class="bg-blue-50 rounded-lg p-5 border border-blue-200">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                            </path>
                                        </svg>
                                        <h4 class="font-semibold text-blue-900">Pembayaran Aman</h4>
                                    </div>
                                    <p class="text-sm text-blue-700">Menggunakan gateway pembayaran terenkripsi dan
                                        terpercaya</p>
                                </div>
                            </div>
                            <div class="bg-amber-50 border-l-4 border-amber-400 p-5 rounded-r-lg">
                                <div class="flex gap-3">
                                    <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-amber-900 mb-1">Penting untuk Diperhatikan</h4>
                                        <p class="text-sm text-amber-800">Harga yang tertera sudah termasuk biaya
                                            layanan platform. Pastikan untuk memeriksa detail pemesanan sebelum
                                            melakukan pembayaran.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-red-200">
                    <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold text-lg">
                                03
                            </span>
                            <h3 class="text-2xl font-bold text-white">Kebijakan No Refund & No Reschedule</h3>
                        </div>
                    </div>
                    <div class="p-8 md:p-10">
                        <div class="space-y-6">
                            <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                                <div class="flex items-start gap-3 mb-4">
                                    <svg class="w-7 h-7 text-red-600 flex-shrink-0 mt-0.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                    <div>
                                        <h4 class="font-bold text-red-900 text-lg mb-2">PERHATIAN PENTING</h4>
                                        <p class="text-red-800 font-medium">
                                            Semua pemesanan yang telah dikonfirmasi dan dibayar bersifat
                                            <span class="underline font-bold">FINAL dan TIDAK DAPAT DIBATALKAN</span>
                                            atau dijadwal ulang.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 text-slate-600">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">Tidak Ada Pengembalian Dana (No
                                            Refund)</h5>
                                        <p class="text-sm leading-relaxed">
                                            Pembayaran yang telah berhasil dilakukan tidak dapat dikembalikan dalam
                                            kondisi apapun, termasuk namun tidak terbatas pada pembatalan sepihak,
                                            perubahan rencana, atau force majeure.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-slate-900 mb-1">Tidak Ada Penjadwalan Ulang (No
                                            Reschedule)</h5>
                                        <p class="text-sm leading-relaxed">
                                            Tanggal dan waktu pemesanan yang telah dikonfirmasi tidak dapat diubah atau
                                            dijadwalkan ulang. Pastikan Anda telah memilih tanggal dan waktu yang tepat
                                            sebelum melakukan pembayaran.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-5 border border-blue-200">
                                <div class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div class="text-sm text-blue-800">
                                        <h5 class="font-semibold mb-1">Saran Kami</h5>
                                        <p>Sebelum melakukan pembayaran, pastikan Anda telah:</p>
                                        <ul class="mt-2 space-y-1 ml-4 list-disc">
                                            <li>Memeriksa ketersediaan venue dengan teliti</li>
                                            <li>Memastikan tanggal dan waktu yang dipilih sudah benar</li>
                                            <li>Membaca seluruh detail dan fasilitas venue</li>
                                            <li>Memahami dan menyetujui kebijakan ini</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-200">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold text-lg">
                                04
                            </span>
                            <h3 class="text-2xl font-bold text-white">Tanggung Jawab Platform</h3>
                        </div>
                    </div>
                    <div class="p-8 md:p-10">
                        <div class="space-y-4 text-slate-600 leading-relaxed">
                            <p>
                                TempatIN bertindak sebagai perantara antara pengguna dan penyedia venue. Kami tidak
                                bertanggung jawab atas:
                            </p>
                            <ul class="space-y-3 ml-6">
                                <li class="flex items-start gap-2">
                                    <span class="text-indigo-600 font-bold mt-1">•</span>
                                    <span>Kualitas layanan, fasilitas, atau kondisi venue yang disediakan oleh penyedia
                                        venue</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-indigo-600 font-bold mt-1">•</span>
                                    <span>Perselisihan atau sengketa antara pengguna dan penyedia venue</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-indigo-600 font-bold mt-1">•</span>
                                    <span>Kerugian atau kerusakan yang terjadi selama penggunaan venue</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-indigo-600 font-bold mt-1">•</span>
                                    <span>Keterlambatan atau pembatalan sepihak oleh penyedia venue</span>
                                </li>
                            </ul>
                            <div class="bg-slate-50 rounded-lg p-5 border-l-4 border-indigo-600 mt-6">
                                <p class="text-sm">
                                    <strong>Catatan:</strong> Untuk keluhan atau permasalahan terkait venue, pengguna
                                    dapat menghubungi tim customer service kami untuk mediasi dengan penyedia venue.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-200">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold text-lg">
                                05
                            </span>
                            <h3 class="text-2xl font-bold text-white">Hak Kekayaan Intelektual</h3>
                        </div>
                    </div>
                    <div class="p-8 md:p-10">
                        <div class="space-y-4 text-slate-600 leading-relaxed">
                            <p>
                                Seluruh konten yang terdapat pada platform TempatIN, termasuk namun tidak terbatas
                                pada logo, desain, teks, grafis, foto, video, dan kode program, adalah milik sah
                                TempatIN dan/atau penyedia venue yang terdaftar.
                            </p>
                            <div class="grid md:grid-cols-2 gap-4 my-6">
                                <div class="bg-purple-50 rounded-lg p-5 border border-purple-200">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                            </path>
                                        </svg>
                                        <h4 class="font-semibold text-purple-900">Dilindungi Hukum</h4>
                                    </div>
                                    <p class="text-sm text-purple-700">Dilindungi oleh undang-undang hak cipta
                                        Indonesia</p>
                                </div>
                                <div class="bg-rose-50 rounded-lg p-5 border border-rose-200">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                            </path>
                                        </svg>
                                        <h4 class="font-semibold text-rose-900">Dilarang Menyalin</h4>
                                    </div>
                                    <p class="text-sm text-rose-700">Penggunaan tanpa izin merupakan pelanggaran hukum
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-200">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-10 h-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold text-lg">
                                06
                            </span>
                            <h3 class="text-2xl font-bold text-white">Perubahan Syarat & Ketentuan</h3>
                        </div>
                    </div>
                    <div class="p-8 md:p-10">
                        <div class="space-y-4 text-slate-600 leading-relaxed">
                            <p>
                                TempatIN berhak untuk mengubah, memodifikasi, atau memperbarui syarat dan ketentuan ini
                                sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan berlaku efektif segera
                                setelah dipublikasikan di halaman ini.
                            </p>
                            <div class="bg-indigo-50 rounded-lg p-5 border border-indigo-200">
                                <p class="text-sm text-indigo-800">
                                    <strong>Tanggung Jawab Pengguna:</strong> Dengan terus menggunakan platform setelah
                                    perubahan dipublikasikan, Anda dianggap telah menerima dan menyetujui perubahan
                                    tersebut. Kami menyarankan Anda untuk memeriksa halaman ini secara berkala.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="mt-12 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-2xl shadow-xl p-8 md:p-10 text-white">
                <div class="text-center">
                    <h3 class="text-2xl font-bold mb-3">Ada Pertanyaan?</h3>
                    <p class="text-indigo-100 mb-6 max-w-2xl mx-auto">
                        Jika Anda memiliki pertanyaan terkait syarat dan ketentuan ini, jangan ragu untuk menghubungi
                        tim customer service kami
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="mailto:tempatin.web@gmail.com"
                            class="inline-flex items-center gap-2 bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Email Kami
                        </a>
                        <a href="https://wa.me/6282211596326"
                            class="inline-flex items-center gap-2 bg-emerald-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z">
                                </path>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center text-sm text-slate-500">
                <p>
                    Dengan melakukan pemesanan, Anda secara otomatis menyetujui semua syarat dan ketentuan yang
                    tercantum di atas.
                </p>
            </div>
        </div>
    </div>
</div>
