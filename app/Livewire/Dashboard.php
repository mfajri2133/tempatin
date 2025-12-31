<?php

namespace App\Livewire;

use App\Exports\DashboardExport;
use App\Models\Booking;
use App\Models\Order;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('layouts.dashboard', ['title' => 'Dashboard'])]
class Dashboard extends Component
{
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->start_date = now()->startOfMonth()->format('Y-m-d');
        $this->end_date   = now()->endOfMonth()->format('Y-m-d');
    }

    public function exportReport()
    {
        $filename = 'dashboard-report-' . now()->format('Y-m-d-His') . '.xlsx';

        return Excel::download(
            new DashboardExport($this->start_date, $this->end_date),
            $filename
        );
    }

    public function render()
    {
        $totalVenues = Venue::count();
        $totalUsers  = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $totalRevenue = Order::where('status', 'paid')
            ->whereBetween('created_at', [
                $this->start_date . ' 00:00:00',
                $this->end_date   . ' 23:59:59'
            ])
            ->sum('total_amount');

        $chartData = $this->getChartData();

        $recentTransactions = Order::with(['user', 'booking.venue', 'payment'])
            ->whereBetween('created_at', [
                $this->start_date . ' 00:00:00',
                $this->end_date   . ' 23:59:59'
            ])
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $topVenues = Booking::select('venue_id', DB::raw('COUNT(*) as total_bookings'))
            ->whereBetween('created_at', [
                $this->start_date . ' 00:00:00',
                $this->end_date   . ' 23:59:59'
            ])
            ->groupBy('venue_id')
            ->orderByDesc('total_bookings')
            ->limit(5)
            ->with('venue')
            ->get();

        return view('livewire.dashboard.index', [
            'totalVenues'        => $totalVenues,
            'totalUsers'         => $totalUsers,
            'totalAdmins'        => $totalAdmins,
            'totalRevenue'       => $totalRevenue,
            'chartData'          => $chartData,
            'recentTransactions' => $recentTransactions,
            'topVenues'          => $topVenues,
        ]);
    }

    /**
     * Generate chart data (daily / monthly)
     */
    private function getChartData()
    {
        $start = Carbon::parse($this->start_date);
        $end   = Carbon::parse($this->end_date);
        $diffInDays = $start->diffInDays($end);

        /**
         * =========================
         * DAILY (≤ 31 days)
         * =========================
         */
        if ($diffInDays <= 31) {
            $data = Order::where('status', 'paid')
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total')
                )
                ->whereBetween('created_at', [
                    $this->start_date . ' 00:00:00',
                    $this->end_date   . ' 23:59:59'
                ])
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->pluck('total', 'date')
                ->toArray();

            $chartData = [];
            $period = CarbonPeriod::create($start, $end);

            foreach ($period as $date) {
                $key = $date->format('Y-m-d');
                $chartData[] = [
                    'label' => $date->format('d M'),
                    'value' => $data[$key] ?? 0
                ];
            }

            return $chartData;
        }

        /**
         * =========================
         * MONTHLY (> 31 days) ✅ FIXED
         * =========================
         */
        $data = Order::where('status', 'paid')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('created_at', [
                $this->start_date . ' 00:00:00',
                $this->end_date   . ' 23:59:59'
            ])
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT)
                    => $item->total
                ];
            })
            ->toArray();

        $chartData = [];
        $period = CarbonPeriod::create(
            $start->copy()->startOfMonth(),
            '1 month',
            $end->copy()->startOfMonth()
        );

        foreach ($period as $date) {
            $key = $date->format('Y-m');
            $chartData[] = [
                'label' => $date->format('M Y'),
                'value' => $data[$key] ?? 0
            ];
        }

        return $chartData;
    }
}
