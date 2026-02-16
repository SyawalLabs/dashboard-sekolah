<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statuses')->insertOrIgnore([
            ['key' => 'aktif', 'label' => 'Aktif', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'nonaktif', 'label' => 'Tidak Aktif', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'lulus', 'label' => 'Lulus', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
