<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {
        $transaksi = Transaksi::with(['user', 'detail_transaksi.menu'])
            ->orderByDesc('created_at')
            ->paginate(10);

        // Hitung total pendapatan untuk semua transaksi (misal status Lunas/Selesai)
        $totalPendapatan = Transaksi::whereIn('status_transaksi', ['Lunas', 'Selesai'])->sum('total_harga');

        return view('pages.admin.order', compact('transaksi', 'totalPendapatan'));
    }

    public function index(Request $request)
    {
        $query = \App\Models\Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran', 'status_pengiriman']);

        // Apply filters
        if ($request->tanggal_mulai) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->tanggal_selesai) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }
        if ($request->status) {
            $query->where('status_transaksi', $request->status);
        }
        if ($request->metode_pembayaran) {
            $query->whereHas('pembayaran', function ($q) use ($request) {
                $q->where('metode_pembayaran', $request->metode_pembayaran);
            });
        }

        // Clone query untuk menghitung total pendapatan SEBELUM paginasi
        $totalPendapatanQuery = clone $query;
        $totalPendapatan = $totalPendapatanQuery
            ->whereIn('status_transaksi', ['Lunas', 'Selesai'])
            ->sum('total_harga');

        // Apply pagination dengan appends untuk mempertahankan parameter filter
        $transaksi = $query->orderByDesc('created_at')->paginate(10);
        $transaksi->appends($request->query());

        return view('pages.admin.order', compact('transaksi', 'totalPendapatan'));
    }

    public function updateTanggal(Request $request, $id)
    {
        $order = \App\Models\Transaksi::findOrFail($id);
        $order->created_at = $request->tanggal;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function export(Request $request)
    {
        $query = \App\Models\Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran']);

        if ($request->tanggal_mulai) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->tanggal_selesai) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }
        if ($request->status) {
            $query->where('status_transaksi', $request->status);
        }
        if ($request->metode_pembayaran) {
            $query->whereHas('pembayaran', function ($q) use ($request) {
                $q->where('metode_pembayaran', $request->metode_pembayaran);
            });
        }

        $orders = $query->orderByDesc('created_at')->get();

        // Hitung total pendapatan sesuai filter (status Lunas/Selesai)
        $totalPendapatan = (clone $query)
            ->whereIn('status_transaksi', ['Lunas', 'Selesai'])
            ->sum('total_harga');

        $pdf = PDF::loadView('pages.pdf.order-pdf', compact('orders', 'totalPendapatan'));
        return $pdf->download('order-export.pdf');
    }

    // Method baru untuk mendapatkan data revenue analytics
    public function getRevenueData($period = 'year')
    {
        $baseQuery = Transaksi::whereIn('status_transaksi', ['Lunas', 'Selesai']);

        switch ($period) {
            case 'year':
                return $this->getYearlyRevenue($baseQuery);
            case 'month':
                return $this->getMonthlyRevenue($baseQuery);
            case 'day':
                return $this->getDailyRevenue($baseQuery);
            default:
                return $this->getYearlyRevenue($baseQuery);
        }
    }

    private function getYearlyRevenue($query)
    {
        $data = $query->select(
            DB::raw('YEAR(created_at) as period'),
            DB::raw('SUM(total_harga) as total')
        )
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->orderBy('period')
            ->get();

        // Ensure we have data for the last 5 years
        $currentYear = Carbon::now()->year;
        $years = range($currentYear - 4, $currentYear);
        $result = [];

        foreach ($years as $year) {
            $found = $data->firstWhere('period', $year);
            $result[] = [
                'label' => (string) $year,
                'value' => $found ? (float) $found->total : 0
            ];
        }

        return $result;
    }

    private function getMonthlyRevenue($query)
    {
        $currentYear = Carbon::now()->year;
        $data = $query->select(
            DB::raw('MONTH(created_at) as period'),
            DB::raw('SUM(total_harga) as total')
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('period')
            ->get();

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

        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = $data->firstWhere('period', $i);
            $result[] = [
                'label' => $months[$i],
                'value' => $found ? $found->total : 0
            ];
        }

        return $result;
    }

    private function getDailyRevenue($query)
    {
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $data = $query->select(
            DB::raw('DAYOFWEEK(created_at) as period'),
            DB::raw('SUM(total_harga) as total')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('DAYOFWEEK(created_at)'))
            ->orderBy('period')
            ->get();

        $days = [
            1 => 'Min',
            2 => 'Sen',
            3 => 'Sel',
            4 => 'Rab',
            5 => 'Kam',
            6 => 'Jum',
            7 => 'Sab'
        ];

        $result = [];
        // Reorder to start from Monday (2) to Sunday (1)
        $dayOrder = [2, 3, 4, 5, 6, 7, 1];

        foreach ($dayOrder as $dayNum) {
            $found = $data->firstWhere('period', $dayNum);
            $result[] = [
                'label' => $days[$dayNum],
                'value' => $found ? $found->total : 0
            ];
        }

        return $result;
    }

    // API endpoint untuk AJAX request
    public function getRevenueDataApi(Request $request)
    {
        $period = $request->get('period', 'year');
        $data = $this->getRevenueData($period);

        return response()->json([
            'labels' => array_column($data, 'label'),
            'data' => array_column($data, 'value')
        ]);
    }
}