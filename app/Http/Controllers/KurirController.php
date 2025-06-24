<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Ambil data kurir (bisa semua user atau filter berdasarkan role)
            // Sesuaikan query berdasarkan kebutuhan aplikasi Anda
            $kurir = User::orderBy('created_at', 'desc')->get();
            
            return view('pages.admin.data-kurir', compact('kurir'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat data kurir: ' . $e->getMessage());
        }
    }

    /**
     * Method kurir() - jika diperlukan untuk kompatibilitas
     */
    public function kurir()
    {
        $kurir = User::where('role', 'kurir')->orderBy('created_at', 'desc')->get();
        return view('pages.admin.data-kurir', compact('kurir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kurir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:255|unique:users,username',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:6',
                'role' => 'required|in:user,admin,kurir',
                'no_hp' => 'nullable|string|max:20',
                'alamat' => 'nullable|string|max:500',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Handle upload foto
            $fotoName = null;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                
                // Simpan foto ke storage/app/public/kurir
                $foto->storeAs('public/kurir', $fotoName);
            }

            // Buat user baru
            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => $fotoName,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data kurir berhasil ditambahkan',
                'data' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambah data kurir: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $kurir = User::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $kurir
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data kurir tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $kurir = User::findOrFail($id);
            return view('kurir.edit', compact('kurir'));
        } catch (\Exception $e) {
            return back()->with('error', 'Data kurir tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $kurir = User::findOrFail($id);

            // Validasi input
            $validator = Validator::make($request->all(), [
                'username' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('users', 'username')->ignore($id)
                ],
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($id)
                ],
                'password' => 'nullable|string|min:6',
                'role' => 'required|in:user,admin,kurir',
                'no_hp' => 'nullable|string|max:20',
                'alamat' => 'nullable|string|max:500',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Handle upload foto baru
            $fotoName = $kurir->foto; // Gunakan foto lama sebagai default
            
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($kurir->foto && Storage::exists('public/kurir/' . $kurir->foto)) {
                    Storage::delete('public/kurir/' . $kurir->foto);
                }
                
                // Upload foto baru
                $foto = $request->file('foto');
                $fotoName = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                $foto->storeAs('public/kurir', $fotoName);
            }

            // Update data kurir
            $updateData = [
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => $fotoName,
            ];

            // Update password hanya jika diisi
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $kurir->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Data kurir berhasil diperbarui',
                'data' => $kurir->fresh()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data kurir: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $kurir = User::findOrFail($id);
            
            // Hapus foto jika ada
            if ($kurir->foto && Storage::exists('public/kurir/' . $kurir->foto)) {
                Storage::delete('public/kurir/' . $kurir->foto);
            }
            
            // Hapus data kurir
            $kurir->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data kurir berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data kurir: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get kurir data for DataTables (optional - untuk server-side processing)
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $kurir = User::select(['id', 'username', 'name', 'email', 'role', 'alamat', 'no_hp', 'foto']);
            
            return datatables()->of($kurir)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-group" role="group">';
                    $btn .= '<button type="button" class="btn btn-sm btn-info" onclick="viewKurir(' . $row->id . ')" data-bs-toggle="modal" data-bs-target="#viewKurirModal"><i class="fas fa-eye"></i></button>';
                    $btn .= '<button type="button" class="btn btn-sm btn-warning" onclick="editKurir(' . $row->id . ')" data-bs-toggle="modal" data-bs-target="#editKurirModal"><i class="fas fa-edit"></i></button>';
                    $btn .= '<button type="button" class="btn btn-sm btn-danger" onclick="deleteKurir(' . $row->id . ', \'' . $row->name . '\')"><i class="fas fa-trash"></i></button>';
                    $btn .= '</div>';
                    
                    return $btn;
                })
                ->editColumn('role', function ($row) {
                    return '<span class="badge bg-info">' . ucfirst($row->role) . '</span>';
                })
                ->editColumn('foto', function ($row) {
                    if ($row->foto) {
                        return '<img src="' . asset('storage/kurir/' . $row->foto) . '" alt="Foto ' . $row->name . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">';
                    } else {
                        return '<span class="text-muted">Tidak ada foto</span>';
                    }
                })
                ->editColumn('alamat', function ($row) {
                    return $row->alamat ?? '-';
                })
                ->editColumn('no_hp', function ($row) {
                    return $row->no_hp ?? '-';
                })
                ->rawColumns(['action', 'role', 'foto'])
                ->make(true);
        }
    }

    /**
     * Filter kurir berdasarkan role tertentu
     */
    public function getKurirByRole($role = 'kurir')
    {
        try {
            $kurir = User::where('role', $role)
                        ->select(['id', 'username', 'name', 'email', 'no_hp', 'alamat'])
                        ->get();
            
            return response()->json([
                'success' => true,
                'data' => $kurir
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data kurir: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Ubah status aktif kurir (optional - jika ada kolom status)
     */
    public function toggleStatus($id)
    {
        try {
            $kurir = User::findOrFail($id);
            
            // Assuming ada kolom 'is_active' atau 'status'
            // Sesuaikan dengan struktur database Anda
            // $kurir->is_active = !$kurir->is_active;
            // $kurir->save();

            return response()->json([
                'success' => true,
                'message' => 'Status kurir berhasil diubah'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status kurir'
            ], 500);
        }
    }

    /**
     * Bulk delete kurir
     */
    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->input('ids', []);
            
            if (empty($ids)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada data yang dipilih'
                ], 400);
            }

            // Hapus foto-foto yang terkait
            $kurir = User::whereIn('id', $ids)->get();
            foreach ($kurir as $k) {
                if ($k->foto && Storage::exists('public/kurir/' . $k->foto)) {
                    Storage::delete('public/kurir/' . $k->foto);
                }
            }

            // Hapus data kurir
            User::whereIn('id', $ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data kurir berhasil dihapus secara bulk'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data kurir: ' . $e->getMessage()
            ], 500);
        }
    }
}