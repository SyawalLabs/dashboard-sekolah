<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genders')->insertOrIgnore([
            ['key' => 'L', 'label' => 'Laki-laki', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'P', 'label' => 'Perempuan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
