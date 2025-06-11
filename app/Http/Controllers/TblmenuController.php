<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan DB facade

class TblmenuController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori', 'Makanan'); // default: Makanan jika tidak ada parameter
        $menu = Menu::where('kategori', $kategori)->get();

        return view('pages.admin.tblmenu', compact('menu', 'kategori'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi_menu' => 'nullable|string',
            'kategori' => 'required|in:Makanan,Minuman,Side Dish',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $menu = new Menu();
        $menu->nama = $validatedData['nama'];
        $menu->harga = $validatedData['harga'];
        $menu->deskripsi_menu = $validatedData['deskripsi_menu'] ?? '';
        $menu->kategori = $validatedData['kategori'];

        // Simpan gambar jika ada
        if ($request->hasFile('gambar_menu')) {
            $image = $request->file('gambar_menu');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/menu'), $imageName);
            $menu->gambar_menu = $imageName;
        }
        $menu->save();

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi_menu' => 'nullable|string',
            'kategori' => 'required|string',
            'gambar_menu' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $menu = Menu::findOrFail($id);

        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi_menu' => $request->deskripsi_menu,
            'kategori' => $request->kategori,
        ];
        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/menu'), $filename);

            $data['gambar_menu'] = $filename;

            if ($menu->gambar && file_exists(public_path('assets/img/menu/' . $menu->gambar))) {
                unlink(public_path('assets/img/menu/' . $menu->gambar));
            }
        } else {
            unset($data['gambar_menu']);
        }
        $menu->update($data);

        return redirect()->route('pages.admin.tblmenu', ['kategori' => $request->kategori])->with('success', 'Data menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->gambar_menu) {
            $imagePath = public_path('assets/img/menu/' . $menu->gambar_menu);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $menu->delete();

        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }

    public function search(Request $request)
{
    $query = $request->get('query');

    $menus = DB::table('tblmenu')
        ->where('namamenu', 'like', '%' . $query . '%')
        ->orWhere('kategori', 'like', '%' . $query . '%')
        ->get();

    return response()->json($menus);
}

}
