<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jrs = Jurusan::all();
        if ($jrs->count() > 0) {
            $hasil = [
                "message" => "Data Jurusan",
                "data" => $jrs
            ];
            return response()->json($hasil, 200);
        } else {
            $fails = [
                "message" => "Data Jurusan Tidak Ditemukan",
                "data" => []
            ];
            return response()->json($fails, 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_jurusan' => 'required|string',
            'singkatan_jurusan'  => 'required|string',
            'jumlah_mahasantri'  => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $data);

        if ($validator->fails()) {
            $fails = [
                "message" => "Data Jurusan Tidak Valid",
                "data" => $validator->errors()
            ];
            return response()->json($fails, 400);
        } else {
            $jrs = new Jurusan;
            $jrs->nama_jurusan = $request->input('nama_jurusan');
            $jrs->singkatan_jurusan = $request->input('singkatan_jurusan');
            $jrs->jumlah_mahasantri = $request->input('jumlah_mahasantri');
            $jrs->save();
            $success = [
                "message" => "Data Jurusan Berhasil Ditambahkan",
                "data" => $jrs
            ];
            return response()->json($success, 201);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'string',
            'singkatan_jurusan'  => 'string',
            'jumlah_mahasantri'  => 'integer',
        ]);

        if ($validator->fails()) {
            $fails = [
                "message" => "Data Jurusan Tidak Valid",
                "data" => $validator->errors()
            ];
            return response()->json($fails, 400);
        }

        $jrs = Jurusan::find($id);

        if ($jrs) {
            $jrs->update($request->all());
            $success = [
                "message" => "Data Jurusan Berhasil Diubah",
                "data" => $jrs
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                "message" => "Data Jurusan Tidak Ditemukan",
            ];
            return response()->json($fails, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jrs = Jurusan::find($id);

        if ($jrs) {
            $jrs->delete();
            $success = [
                "message" => "Data Jurusan Berhasil Dihapus",
                "data" => $jrs
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                "message" => "Data Jurusan Tidak Ditemukan",
            ];
            return response()->json($fails, 404);
        }
    }
}
