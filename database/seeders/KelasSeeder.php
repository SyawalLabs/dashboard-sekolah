<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insertOrIgnore([
            ['nama_kelas' => 'VII-A', 'wali_kelas' => 'Budi', 'jumlah_siswa' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kelas' => 'VII-B', 'wali_kelas' => 'Siti', 'jumlah_siswa' => 28, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kelas' => 'VIII-A', 'wali_kelas' => 'Andi', 'jumlah_siswa' => 32, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
