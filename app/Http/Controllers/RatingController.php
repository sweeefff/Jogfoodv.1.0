<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Ratings;

class RatingController extends Controller
{
    // Menampilkan halaman beri rating untuk 1 menu tertentu
    public function index($id_menu, $id_detail)
    {
        $menu = \App\Models\Menu::findOrFail($id_menu);

        // Cek apakah user sudah review produk ini di detail transaksi ini
        $sudahReview = \App\Models\Ratings::where('id_user', session('user_id'))
            ->where('id_menu', $id_menu)
            ->where('id_detail', $id_detail)
            ->exists();

        return view('pages.user.rating', compact('menu', 'id_detail', 'sudahReview'));
    }

    // Menyimpan rating
    public function store(Request $request, $id_menu, $id_detail)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Cek sudah review
        $sudahReview = \App\Models\Ratings::where('id_user', session('user_id'))
            ->where('id_menu', $id_menu)
            ->where('id_detail', $id_detail)
            ->exists();

        if ($sudahReview) {
            return redirect()->back()->with('error', 'Anda sudah memberi rating untuk produk ini pada pesanan ini.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:255',
        ]);

        \App\Models\Ratings::create([
            'id_menu' => $id_menu,
            'id_user' => session('user_id'),
            'id_detail' => $id_detail,
            'rating' => $request->rating,
            'komentar' => $request->review,
        ]);

        return redirect()->route('detail', $id_menu)->with('success', 'Rating berhasil dikirim!');
    }
}
