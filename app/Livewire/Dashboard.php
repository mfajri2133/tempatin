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
    public $period = 'month';

    public function mount()
    {
        $this->start_date = now()->startOfMonth()->format('Y-m-d');
        $this->end_date = now()->endOfMonth()->format('Y-m-d');
    }

    public function exportReport()
    {
        $filename = 'dashboard-report-' . now()->format('Y-m-d-His') . '.xlsx';

        return Excel::download(
            new DashboardExport($this->start_date, $this->end_date),
            $filename
        );
    }

    public function setPeriod($period)
    {
        $this->period = $period;

        if ($period === 'month') {
            $this->start_date = now()->startOfMonth()->format('Y-m-d');
            $this->end_date = now()->endOfMonth()->format('Y-m-d');
        } elseif ($period === 'year') {
            $this->start_date = now()->startOfYear()->format('Y-m-d');
            $this->end_date = now()->endOfYear()->format('Y-m-d');
        } elseif ($period === 'all') {
            $this->start_date = null;
            $this->end_date = null;
        }
    }

    public function render()
    {
        $totalVenues = Venue::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $totalRevenue = Order::where('status', 'paid')
            ->when($this->start_date && $this->end_date, function ($query) {
                $query->whereBetween('created_at', [
                    $this->start_date . ' 00:00:00',
                    $this->end_date . ' 23:59:59'
                ]);
            })
            ->sum('total_amount');

        $chartData = $this->getChartData();

        $recentTransactions = Order::with(['user', 'booking.venue', 'payment'])
            ->when($this->start_date && $this->end_date, function ($query) {
                $query->whereBetween('created_at', [
                    $this->start_date . ' 00:00:00',
                    $this->end_date . ' 23:59:59'
                ]);
            })
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $topVenues = Booking::select('venue_id', DB::raw('COUNT(*) as total_bookings'))
            ->when($this->start_date && $this->end_date, function ($query) {
                $query->whereBetween('created_at', [
                    $this->start_date . ' 00:00:00',
                    $this->end_date . ' 23:59:59'
                ]);
            })
            ->groupBy('venue_id')
            ->orderBy('total_bookings', 'desc')
            ->limit(5)
            ->with('venue')
            ->get();

        return view('livewire.dashboard.index', [
            'totalVenues' => $totalVenues,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalRevenue' => $totalRevenue,
            'chartData' => $chartData,
            'recentTransactions' => $recentTransactions,
            'topVenues' => $topVenues,
        ]);
    }

    private function getChartData()
    {
        if ($this->period === 'year' || !$this->start_date) {
            $data = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
                ->when($this->start_date && $this->end_date, function ($query) {
                    $query->whereBetween('created_at', [
                        $this->start_date . ' 00:00:00',
                        $this->end_date . ' 23:59:59'
                    ]);
                })
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('total', 'month')
                ->toArray();

            $months = [
                1 => 'Jan',
                2 => 'Feb',
                3 => 'Mar',
                4 => 'Apr',
                5 => 'Mei',
                6 => 'Jun',
                7 => 'Jul',
                8 => 'Agu',
                9 => 'Sep',
                10 => 'Okt',
                11 => 'Nov',
                12 => 'Des'
            ];

            $chartData = [];
            foreach ($months as $num => $label) {
                $chartData[] = [
                    'label' => $label,
                    'value' => $data[$num] ?? 0
                ];
            }

            return $chartData;
        } else {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);
            $diffInDays = $start->diffInDays($end);

            if ($diffInDays <= 31) {
                $data = Order::select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total')
                )
                    ->whereBetween('created_at', [
                        $this->start_date . ' 00:00:00',
                        $this->end_date . ' 23:59:59'
                    ])
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get()
                    ->pluck('total', 'date')
                    ->toArray();

                $chartData = [];
                $period = CarbonPeriod::create($start, $end);

                foreach ($period as $date) {
                    $dateStr = $date->format('Y-m-d');
                    $chartData[] = [
                        'label' => $date->format('d M'),
                        'value' => $data[$dateStr] ?? 0
                    ];
                }

                return $chartData;
            } else {
                return $this->getChartData();
            }
        }
    }
}
