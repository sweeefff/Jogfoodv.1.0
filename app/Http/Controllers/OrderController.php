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
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Ambil semua transaksi beserta user dan detail_transaksi + menu
        $transaksi = Transaksi::with(['user', 'detail_transaksi.menu'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pages.admin.order', compact('transaksi'));
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

        $transaksi = $query->orderByDesc('created_at')->paginate(10);

        return view('pages.admin.order', compact('transaksi'));
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
        $query = \App\Models\Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran', 'status_pengiriman']);

        if ($request->tanggal_mulai) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->tanggal_selesai) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        $orders = $query->orderByDesc('created_at')->get();

        if ($request->type == 'excel') {
            return Excel::download(new OrderExport($orders), 'order-export.xlsx');
        } else {
            $pdf = PDF::loadView('pages.pdf.order-pdf', compact('orders'));
            return $pdf->download('order-export.pdf');
        }
    }
}
