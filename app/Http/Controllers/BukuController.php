<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Buku::with('kategori')->get(); // Mengambil semua buku dengan kategori
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategoris,id', // Memastikan kategori_id ada di tabel kategoris
        ]);

        $buku = Buku::create($request->all());
        return response()->json($buku, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::with('kategori')->find($id); // Menampilkan buku berdasarkan ID dengan kategori

        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        return response()->json($buku);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $request->validate([
            'judul' => 'string|max:255',
            'penulis' => 'string|max:255',
            'harga' => 'numeric|',
            'stok' => 'integer|min:1000',
            'kategori_id' => 'exists:kategoris,id',
        ]);

        $buku->update($request->all());
        return response()->json($buku);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $buku->delete();
        return response()->json(['message' => 'Buku berhasil dihapus']);
    }
    /**
     * Search books by title or category.
     */
    /**
     * Search books by title or category.
     */
    /**
     * Search books by id, title or category.
     */
    /**
     * Search books by title or category.
     */
    public function search(Request $request)
    {
        // Start query with kategori relationship
        $query = Buku::query();

        // Jika parameter judul ada
        if ($request->filled('judul')) {
            $searchTerm = $request->judul;
            $query->where('judul', 'LIKE', "%{$searchTerm}%");
        }

        // Include kategori relationship
        $query->with('kategori');

        // Execute query
        $books = $query->get();

        // Check if any books were found
        if ($books->isEmpty()) {
            return response()->json([
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        // Return the results
        return response()->json([
            'data' => $books,
            'total' => $books->count()
        ], 200);
    }
}
