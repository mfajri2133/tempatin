<div>
    <div class="min-h-[calc(100vh-12rem)] flex flex-col items-center gap-4 px-4">

        <div
            class="relative w-full max-w-sm aspect-square rounded-2xl overflow-hidden border border-gray-200 shadow-lg bg-black">

            <div id="qr-reader" class="absolute inset-0" wire:ignore></div>

            <div class="absolute inset-0 pointer-events-none z-10">
                <div class="absolute bottom-6 inset-x-0 text-center">
                    <p class="text-sm text-white font-medium drop-shadow-lg">
                        Arahkan QR Code ke dalam kotak
                    </p>
                    <p class="text-xs text-gray-300 mt-1 drop-shadow">
                        Scan otomatis saat terdeteksi
                    </p>
                </div>
            </div>

            <div wire:loading wire:target="handleScan"
                class="absolute inset-0 z-40 flex items-center justify-center bg-emerald-600/80 backdrop-blur-sm">
                <div
                    class="flex flex-col items-center gap-4 rounded-2xl bg-white/10 px-8 py-6 text-center shadow-xl backdrop-blur-md">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/20">
                        <svg class="h-10 w-10 text-white animate-pulse" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-white">
                        QR Terdeteksi
                    </p>
                    <p class="text-sm text-white/80">
                        Memproses check-in, mohon tunggu…
                    </p>
                </div>
            </div>

            <div wire:loading wire:target="handleScan"
                class="absolute inset-0 z-40 flex items-center justify-center bg-emerald-600/80 backdrop-blur-sm">
                <div
                    class="flex flex-col items-center gap-4 rounded-2xl bg-white/10 px-8 py-6 text-center  backdrop-blur-md">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/20">
                        <svg class="h-10 w-10 text-white animate-pulse" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-white">
                        QR Terdeteksi
                    </p>
                    <p class="text-sm text-white/80">
                        Memproses check-in, mohon tunggu…
                    </p>
                </div>
            </div>

            <div id="error-overlay"
                class="absolute inset-0 z-50 hidden flex items-center justify-center bg-red-600/80 backdrop-blur-sm">
                <div
                    class="flex flex-col items-center gap-4 rounded-2xl bg-white/10 px-8 py-6 text-center backdrop-blur-md">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/20">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-white">
                        Kamera Tidak Tersedia
                    </p>
                    <p class="text-sm text-white/80">
                        Pastikan izin kamera sudah diberikan
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full max-w-sm">
            <button id="restart-btn"
                class="w-full px-4 py-3 bg-black text-white rounded-xl font-semibold shadow hover:bg-gray-900 transition">
                Scan Ulang
            </button>

        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            const restartBtn = document.getElementById('restart-btn');
            const errorEl = document.getElementById('error-overlay');

            let qr = null;
            let isScanning = false;

            async function initScanner() {
                try {

                    qr = new Html5Qrcode("qr-reader");

                    await qr.start({
                            facingMode: "environment"
                        }, {
                            fps: 10,
                            qrbox: {
                                width: 224,
                                height: 224
                            },
                        },
                        onScanSuccess,
                        () => {}
                    );

                    isScanning = true;
                    console.log('Scanner started');

                } catch (err) {
                    console.error(err);
                    errorEl.classList.remove('hidden');
                    errorEl.classList.add('flex');
                }
            }

            function stopScanner() {
                if (!qr) return;

                qr.stop()
                    .then(() => {
                        console.log('Scanner stopped');
                    })
                    .catch(err => console.error(err));
            }

            function onScanSuccess(decodedText) {
                if (!isScanning) return;

                isScanning = false;
                console.log('QR detected:', decodedText);

                stopScanner();

                @this.call('handleScan', decodedText);
            }

            restartBtn.addEventListener('click', () => {
                console.log('Manual restart scanner');
                initScanner();
            });

            initScanner();

            window.addEventListener('beforeunload', () => {
                if (qr) qr.stop();
            });
        });
    </script>
</div>
