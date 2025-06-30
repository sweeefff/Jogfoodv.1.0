<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;
use PDF;

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
            $query->whereHas('pembayaran', function($q) use ($request) {
                $q->where('metode_pembayaran', $request->metode_pembayaran);
            });
        }

        $transaksi = $query->orderByDesc('created_at')->paginate(10);

        // Hitung total pendapatan sesuai filter dan status Lunas/Selesai
        $totalPendapatan = (clone $query)
            ->whereIn('status_transaksi', ['Lunas', 'Selesai'])
            ->sum('total_harga');

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
            $query->whereHas('pembayaran', function($q) use ($request) {
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
}
