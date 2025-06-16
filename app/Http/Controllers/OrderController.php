<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class OrderController extends Controller
{
    public function order()
    {
        // Ambil semua transaksi beserta user dan detail_transaksi + menu
        $transaksi = Transaksi::with(['user', 'detail_transaksi.menu'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pages.admin.order', compact('transaksi'));
    }
}
