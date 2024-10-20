<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        try {
            $kategoris = Kategori::all();
            return response()->json($kategoris);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat mengambil kategori',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required|unique:kategoris,nama_kategori']);

        try {
            $kategori = Kategori::create($request->all());
            return response()->json($kategori, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat menyimpan kategori',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }
        return response()->json($kategori);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }

        $request->validate(['nama_kategori' => 'required|unique:kategoris,nama_kategori']);
        $kategori->update($request->all());
        return response()->json($kategori);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }

        $kategori->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
