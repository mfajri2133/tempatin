<div class="bg-[#0f0f0f] py-12 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl px-4">
        <div class="mb-8 border-indigo-600">
            <h1 class="text-4xl font-black text-white text-center">
                Hubungi <span class="text-indigo-600">Kami</span>
            </h1>
            <p class="text-gray-400 text-center mt-2 text-m ">
                Kami hadir untuk membantu. Silakan kirimkan pesan Anda melalui formulir atau hubungi kami melalui kontak
                dibawah ini.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-1 space-y-5 mt-2">
                <h3 class="text-xl font-black text-white">
                    Kontak Kami
                </h3>
                <p class="text-gray-400 text-sm mx-auto">
                    Terhubung langsung dengan tim dan media sosial resmi kami.
                </p>

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="text-indigo-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-gray-300 text-sm">tempatin.web@gmail.com</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="text-indigo-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </div>
                        <a href="https://www.instagram.com/tempatin.my.id?igsh=ZGFjeTRva2lpbXph" target="_blank"
                            class="text-gray-300 text-sm hover:text-white transition-colors">
                            @tempatin.my.id
                        </a>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <form wire:submit.prevent="submit" class="grid grid-cols-1 gap-4">
                    <input type="text" wire:model.defer="name" placeholder="Nama Lengkap"
                        class="bg-gray-900/50 text-white text-sm rounded-xl p-4 outline-none
               focus:ring-1 focus:ring-indigo-600 transition-all">

                    @error('name')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror

                    <input type="email" wire:model.defer="email" placeholder="Alamat Email"
                        class="bg-gray-900/50 text-white text-sm rounded-xl p-4 outline-none
               focus:ring-1 focus:ring-indigo-600 transition-all">

                    @error('email')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror

                    <textarea rows="4" wire:model.defer="message" placeholder="Apa yang bisa kami bantu?"
                        class="w-full bg-gray-900/50 text-white text-sm rounded-xl p-4 outline-none
               focus:ring-1 focus:ring-indigo-600 transition-all resize-none"></textarea>

                    @error('message')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror

                    <button type="submit" wire:loading.attr="disabled"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold uppercase
               text-xs tracking-widest py-4 rounded-xl transition-all
               shadow-lg shadow-indigo-600/10 active:scale-[0.98]
               disabled:opacity-60 disabled:cursor-not-allowed">
                        <span wire:loading.remove>
                            Kirim Sekarang
                        </span>

                        <span wire:loading>
                            Mengirim...
                        </span>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
