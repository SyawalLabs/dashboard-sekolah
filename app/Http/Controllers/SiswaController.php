<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Status;
use App\Models\Gender;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        $kelas = Kelas::all();
        $statuses = Status::all();
        $genders = Gender::all();
        return view('siswa.index', compact('siswa', 'kelas', 'statuses', 'genders'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data siswa berhasil diimport!');
    }

    public function tambah()
    {
        $kelas = Kelas::all();
        $statuses = Status::all();
        $genders = Gender::all();

        return response()->json([
            'kelas' => $kelas,
            'statuses' => $statuses,
            'genders' => $genders,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nis' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kelas_id' => 'required|exists:kelas,id',
                'jenis_kelamin' => 'required',
                'status' => 'required',
            ]);

            // Simpan data siswa
            $siswa = Siswa::create([
                'nis' => $validated['nis'],
                'nisn' => $request->input('nisn', ''),
                'nama' => $validated['nama'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tempat_tanggal_lahir' => $request->input('tempat_tanggal_lahir', ''),
                'alamat' => $request->input('alamat', ''),
                'kelas_id' => $validated['kelas_id'],
                'status' => $validated['status'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Siswa berhasil ditambahkan!',
                'siswa' => $siswa
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $kelas = Kelas::all();
            $statuses = Status::all();
            $genders = Gender::all();

            return response()->json([
                'siswa' => $siswa,
                'kelas' => $kelas,
                'statuses' => $statuses,
                'genders' => $genders,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            return response()->json($siswa);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nis' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kelas_id' => 'required|exists:kelas,id',
                'jenis_kelamin' => 'required',
                'status' => 'required',
            ]);

            $siswa = Siswa::findOrFail($id);
            $siswa->update([
                'nis' => $validated['nis'],
                'nisn' => $request->input('nisn', ''),
                'nama' => $validated['nama'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tempat_tanggal_lahir' => $request->input('tempat_tanggal_lahir', ''),
                'alamat' => $request->input('alamat', ''),
                'kelas_id' => $validated['kelas_id'],
                'status' => $validated['status'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Siswa berhasil diubah!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();

            return response()->json([
                'success' => true,
                'message' => 'Siswa berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
