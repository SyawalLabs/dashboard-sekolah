<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa'; // karena nama tabel bukan "siswas"

    protected $fillable = [
        'nis',
        'nisn',
        'nama',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'alamat',
        'kelas',
        'status'
    ];
}
