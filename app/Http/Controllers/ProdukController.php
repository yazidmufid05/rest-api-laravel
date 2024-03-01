<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();

        return response()->json(['message' => 'List of Products', 'data' => $produks], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can implement logic for displaying the form if needed
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required|string',
            'deskripsiProduk' => 'required|string',
            'hargaProduk' => 'required|numeric',
            'kategoriProduk' => 'required|in:makanan,minuman,perlengkapan mandi,kosmetik',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'data' => $validator->errors()], 400);
        }

        $produk = Produk::create([
            'namaProduk' => $request->input('nama_produk'),
            'deskripsiProduk' => $request->input('deskripsi_produk'),
            'hargaProduk' => $request->input('harga_produk'),
            'kategoriProduk' => $request->input('kategori_produk'),
        ]);

        return response()->json(['message' => 'Product Created', 'data' => $produk], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        return response()->json(['message' => 'Product Details', 'data' => $produk], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // You can implement logic for displaying the edit form if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'namaProduk' => 'string|max:255',
            'deskripsiProduk' => 'string',
            'hargaProduk' => 'numeric',
            'kategoriProduk' => 'in:makanan,minuman,perlengkapan mandi,kosmetik',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'data' => $validator->errors()], 400);
        }

        $produk->update($request->all());

        return response()->json(['message' => 'Product Updated', 'data' => $produk], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Product Deleted', 'data' => $produk], 200);
    }
}
