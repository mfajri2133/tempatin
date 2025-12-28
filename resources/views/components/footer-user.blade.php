<footer class="bg-[#0f0f0f] border-t border-[#333] mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            <div class="space-y-4">
                <a href="/" class="inline-block">
                    <h3 class="text-2xl font-bold tracking-tight text-white">
                        Tempat<span class="text-indigo-400">IN</span>
                    </h3>
                </a>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Platform terpercaya untuk menemukan dan memesan venue acara terbaik di Indonesia.
                </p>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white mb-4">Navigasi</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('venues.index') }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            Cari Venue
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white mb-4">Bantuan</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('faq') }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('welcome') }}/#cara-booking"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            Cara Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tnc') }}"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors inline-flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            Syarat & Ketentuan
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white mb-4">Hubungi Kami</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm text-gray-400 leading-relaxed">
                            Jl. Setiabudhi No. 123<br>
                            Bandung, Jawa Barat 40123
                        </span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:tempatin.web@gmail.com"
                            class="text-sm text-gray-400 hover:text-indigo-400 transition-colors">
                            tempatin.web@gmail.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-[#333] text-center">
            <p class="text-sm text-gray-400">
                © {{ date('Y') }} <span class="text-white font-medium">TempatIN</span>.
                All rights reserved.
            </p>
        </div>
    </div>

    <button x-data="{ show: false }" x-init="window.addEventListener('scroll', () => { show = window.scrollY > 500 })" x-show="show"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 w-12 h-12 bg-indigo-600 hover:bg-indigo-700
                   text-white rounded-full shadow-lg
                   flex items-center justify-center transition-all duration-200 z-40"
        style="display: none;" aria-label="Back to top">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>
</footer>
