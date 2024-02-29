<?php

namespace App\Http\Controllers;

use App\Models\Mahasantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DIGUNAKAN UNTUK MENAMPILKAN DATA MAHASANTRI
        $mhs = Mahasantri::all();
        if (isset($mhs)) {
            $hasil = [
                "message" => "Data Mahasantri",
                "data" => $mhs
            ];
            return response()->json($hasil, 200);
        } else {
            $fails = [
                "message" => "Data Mahasantri Tidak Ditemukan",
                "data" => $mhs
            ];
            return response()->json($fails, 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DiGunakan Untuk Menambah Data Mahasantri Baru
        $data = [
            'nama_mhs' => 'required',
            'umur_mhs'  => 'required|integer',
            'alamat_mhs'  => 'required',
            'id_jrs'  => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $data);

        if ($validator->fails()) {
            $fails = [
                "message" => "Data Mahasantri Tidak Valid",
                "data" => $validator->errors()
            ];
            return response()->json($fails, 404);
        } else {
            $mhs = new Mahasantri;
            $mhs->nama_mhs = $request->input('nama_mhs');
            $mhs->umur_mhs = $request->input('umur_mhs');
            $mhs->alamat_mhs = $request->input('alamat_mhs');
            $mhs->id_jrs = $request->input('id_jrs');
            $mhs->save();
            $success = [
                "message" => "Data Mahasantri Berhasil Ditambahkan",
                "data" => $mhs
            ];
            return response()->json($success, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // DiGunakan Untuk Mengubah Data Mahasantri
        $validator = Validator::make($request->all(), [
            'nama_mhs' => 'string|max:64',
            'umur_mhs'  => 'string',
            'alamat_mhs'  => 'integer',
            'id_jrs'  => 'integer',
        ]);
        if ($validator->fails()) {
            $fails = [
                "message" => "Data Mahasantri Tidak Valid",
                "data" => $validator->errors()
            ];
            return response()->json($fails, 404);
        }
        $mhs = Mahasantri::find($id);
        if ($mhs) {
            $mhs->update($request->all());
            $success = [
                "message" => "Data Mahasantri Berhasil Diubah",
                "data" => $mhs
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                "message" => "Data Mahasantri Tidak Ditemukan",
            ];
            return response()->json($fails, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DIGUNAKAN UNTUK MENGHAPUS MAHASANTRI
        $mhs = Mahasantri::where('id', $id)->first();
        if (isset($mhs)) {
            $mhs->delete();
            $success = [
                "message" => "Data Mahasantri Berhasil Dihapus",
                "data" => $mhs
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                "message" => "Data Mahasantri Tidak Ditemukan",
            ];
            return response()->json($fails, 404);
        }
    }
}
