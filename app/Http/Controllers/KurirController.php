<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\StatusPengirimanMail;

use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;


class KurirController extends Controller
{
    public function kurir()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $kurirs = User::where('role', 'kurir')->get();
        return view('pages.admin.data-kurir', compact('kurirs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'nullable|string|max:255',
            'password' => 'required|min:8',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $data = $request->only(['username', 'name', 'email', 'alamat', 'no_hp']);
        $data['role'] = 'kurir';
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_kurir', 'public');
        }

        User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'foto' => $path,
            'role' => 'kurir'
        ]);
        return redirect()->route('admin.kurir')->with('success', 'Kurir berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $kurir = User::findOrFail($id);

        // Hapus foto jika ada
        if ($kurir->foto && Storage::disk('public')->exists($kurir->foto)) {
            Storage::disk('public')->delete($kurir->foto);
        }

        $kurir->delete();

        return redirect()->route('admin.kurir')->with('success', 'Kurir berhasil dihapus');
    }


    public function kurirDashboard()
    {
        $userId = session('user_id');

        // Statistik
        $totalPengiriman = StatusPengiriman::where('id_kurir', $userId)->count();
        $totalSukses = StatusPengiriman::where('id_kurir', $userId)
            ->whereIn('status_pengiriman', ['selesai'])
            ->count();
        $totalGagal = StatusPengiriman::where('id_kurir', $userId)
            ->whereIn('status_pengiriman', ['gagal', 'dibatalkan'])
            ->count();

        // Riwayat pengiriman (20 terakhir)
        $riwayat = StatusPengiriman::where('id_kurir', $userId)
            ->whereIn('status_pengiriman', ['selesai', 'gagal', 'dibatalkan'])
            ->with(['transaksi.user', 'transaksi.detail_transaksi.menu'])
            ->orderByDesc('tanggal_update')
            ->limit(20)
            ->get();

        return view('pages.kurir.dashboard', compact('totalPengiriman', 'totalSukses', 'totalGagal', 'riwayat'));
    }
    public function kurirData()
    {
        $kurir = User::find(session('user_id', 'kurir'));
        if (!$kurir) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('pages.kurir.data', compact('kurir'));
    }

    public function kurirEdit()
    {
        $kurir = User::find(session('user_id', 'kurir'));
        if (!$kurir) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('pages.kurir.edit', compact('kurir'));
    }
    public function kurirOrder()
    {
        $userId = session('user_id');
        $transaksi = Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran'])
            ->whereHas('status_pengiriman', function ($query) use ($userId) {
                $query->where('id_kurir', $userId)
                    ->where('status_pengiriman', 'dikirim');
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pages.kurir.order', compact('transaksi'));
    }

    public function kurirSelesaikanOrder($id)
    {
        $status = StatusPengiriman::where('id_transaksi', $id)
            ->where('id_kurir', session('user_id'))
            ->firstOrFail();

        $status->update([
            'status_pengiriman' => 'selesai',
            'tanggal_diterima' => now(),
            'tanggal_update' => now(),
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil ditandai selesai oleh kurir.');
    }

    public function kurirUpdateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pengiriman' => 'required|in:selesai,gagal',
            'alasan' => 'nullable|string|max:255',
            'nama_penerima' => 'nullable|string|max:255',
            'status_pembayaran' => 'nullable|in:pending,lunas',
            'foto_penerima' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB tanpa titik
        ]);

        $status = StatusPengiriman::where('id_transaksi', $id)
            ->where('id_kurir', session('user_id'))
            ->firstOrFail();

        $updateData = [
            'status_pengiriman' => $request->status_pengiriman,
            'tanggal_update' => now(),
        ];

        if ($request->status_pengiriman === 'selesai') {
            $updateData['tanggal_diterima'] = now();
            $updateData['nama_penerima'] = $request->nama_penerima;
        }

        if ($request->status_pengiriman === 'gagal') {
            $updateData['alasan'] = $request->alasan;
        }


        if ($request->hasFile('foto_penerima')) {
            $fotoPath = $request->file('foto_penerima')->store('foto_penerima', 'public');
            $updateData['foto'] = $fotoPath;
        }

        $status->update($updateData);


        if ($status->transaksi && $status->transaksi->user) {
            $user = $status->transaksi->user;
            $transaksi = $status->transaksi;
            Mail::to($user->email)->send(new StatusPengirimanMail(
                $request->status_pengiriman,
                $user,
                $transaksi,
                $request->alasan ?? null
            ));
        }


        if (
            $request->status_pengiriman === 'selesai' &&
            $request->has('status_pembayaran') &&
            $status->transaksi &&
            $status->transaksi->pembayaran &&
            $status->transaksi->pembayaran->metode_pembayaran === 'cod'
        ) {
            $pembayaran = $status->transaksi->pembayaran;
            $pembayaran->status_pembayaran = $request->status_pembayaran;
            $pembayaran->save();
        }

        $message = $request->status_pengiriman === 'selesai'
            ? 'Pesanan berhasil ditandai selesai!'
            : 'Status pesanan berhasil diperbarui!';


        return redirect()->route('kurir.order')->with('success', $message);
    }

    public function kurirShowUpdate($id)
    {
        $userId = session('user_id');
        $status = StatusPengiriman::with(['transaksi.pembayaran', 'transaksi.user', 'transaksi.detail_transaksi.menu'])
            ->where('id_transaksi', $id)
            ->where('id_kurir', $userId)
            ->firstOrFail();

        return view('pages.kurir.update', compact('status'));
    }

    public function kurirUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $request->id,
            'email' => 'required|email|max:255|unique:users,email,' . $request->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kurir = User::findOrFail($request->id);

        $kurir->name = $request->name;
        $kurir->username = $request->username;
        $kurir->email = $request->email;
        $kurir->no_hp = $request->no_hp;
        $kurir->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kurir->foto && Storage::disk('public')->exists($kurir->foto)) {
                Storage::disk('public')->delete($kurir->foto);
            }
            $kurir->foto = $request->file('foto')->store('kurir', 'public');
        }

        $kurir->save();

        return redirect()->route('kurir.data')->with('success', 'Profil berhasil diperbarui.');
    }


}
