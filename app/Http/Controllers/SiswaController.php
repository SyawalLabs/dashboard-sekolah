<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data siswa
    }

    public function edit($id)
    {
        // Ambil data siswa berdasarkan ID dan tampilkan form edit
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data siswa
    }

    public function destroy($id)
    {
        // Hapus data siswa berdasarkan ID
    }
}
