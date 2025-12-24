<div>
    <div class="flex w-full justify-end">
        <div class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-center">
            <div class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row sm:items-center">
                <x-input type="date" name="start_date" class="w-full sm:w-40" />
                <span class="hidden text-sm text-gray-500 sm:inline">-</span>
                <x-input type="date" name="end_date" class="w-full sm:w-40" />
            </div>

            <x-normal-button type="button" class="w-full sm:w-auto">
                Ekspor Laporan
            </x-normal-button>
        </div>
    </div>

    @php
        // Dummy data card
        $stats = [
            [
                'label' => 'Jumlah Venue',
                'value' => 128,
            ],
            [
                'label' => 'Jumlah Transaksi',
                'value' => 356,
            ],
            [
                'label' => 'Jumlah User',
                'value' => 2401,
            ],
            [
                'label' => 'Jumlah Admin',
                'value' => 10,
            ],
        ];

        // Dummy data chart 
        $chart = [
            ['label' => 'Jan', 'value' => 8],
            ['label' => 'Feb', 'value' => 34],
            ['label' => 'Mar', 'value' => 12],
            ['label' => 'Apr', 'value' => 55],
            ['label' => 'Mei', 'value' => 20],
            ['label' => 'Jun', 'value' => 72],
            ['label' => 'Jul', 'value' => 28],
            ['label' => 'Agu', 'value' => 60],
            ['label' => 'Sep', 'value' => 15],
            ['label' => 'Okt', 'value' => 49],
            ['label' => 'Nov', 'value' => 22],
            ['label' => 'Des', 'value' => 80],
        ];

        $maxChartValue = collect($chart)->max('value') ?: 1;
    @endphp

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($stats as $stat)
            <div class="rounded-lg bg-white p-4 border border-gray-200">
                <div class="text-sm text-gray-500">{{ $stat['label'] }}</div>
                <div class="mt-2 text-2xl font-semibold text-tp-black sm:text-3xl">
                    {{ number_format($stat['value'], 0, ',', '.') }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 rounded-lg bg-white p-4 border border-gray-200">
        <div class="flex items-center justify-between gap-3">
            <div class="text-sm font-semibold text-tp-black">Transaksi</div>
            <div class="text-xs text-gray-500">Jan - Des</div>
        </div>

        <div class="mt-4 grid grid-cols-12 gap-2 h-44">
            @foreach ($chart as $point)
                @php
                    $height = (int) round(($point['value'] / $maxChartValue) * 100);
                @endphp

                <div class="flex h-full flex-col items-center justify-end gap-2">
                    <div class="w-full rounded bg-blue-100 border border-blue-200" style="height: {{ $height }}%">
                    </div>
                    <div class="text-[10px] text-gray-500">{{ $point['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
