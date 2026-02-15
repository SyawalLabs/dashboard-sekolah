<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // Ambil data guru dari database dan tampilkan di view
        $guru = Guru::get();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan guru baru
        return view('guru.create');
    }
    public function store(Request $request)
    {
        // Validasi dan simpan data guru baru ke database
    }
}
