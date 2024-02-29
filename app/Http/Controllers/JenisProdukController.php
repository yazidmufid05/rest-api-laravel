<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisProduks = JenisProduk::all();

        return response()->json(['message' => 'List of Product Types', 'data' => $jenisProduks], 200);
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
            'nama' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'data' => $validator->errors()], 400);
        }

        $jenisProduk = JenisProduk::create([
            'nama' => $request->input('nama'),
        ]);

        return response()->json(['message' => 'Product Type Created', 'data' => $jenisProduk], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenisProduk = JenisProduk::find($id);

        if (!$jenisProduk) {
            return response()->json(['message' => 'Product Type Not Found'], 404);
        }

        return response()->json(['message' => 'Product Type Details', 'data' => $jenisProduk], 200);
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
        $jenisProduk = JenisProduk::find($id);

        if (!$jenisProduk) {
            return response()->json(['message' => 'Product Type Not Found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'data' => $validator->errors()], 400);
        }

        $jenisProduk->update($request->all());

        return response()->json(['message' => 'Product Type Updated', 'data' => $jenisProduk], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisProduk = JenisProduk::find($id);

        if (!$jenisProduk) {
            return response()->json(['message' => 'Product Type Not Found'], 404);
        }

        $jenisProduk->delete();

        return response()->json(['message' => 'Product Type Deleted', 'data' => $jenisProduk], 200);
    }
}
