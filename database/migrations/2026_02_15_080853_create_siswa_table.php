<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id(); // id auto increment

            $table->integer('nis');
            $table->integer('nisn');

            $table->string('nama', 100);

            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);

            $table->string('tempat_tanggal_lahir', 100);

            $table->string('alamat', 100);

            $table->enum('kelas', [
                'Kelas 7-A',
                'Kelas 7-B',
                'Kelas 7-C',
                'Kelas 8-A',
                'Kelas 8-B',
                'Kelas 8-C',
                'Kelas 9-A',
                'Kelas 9-B',
                'Kelas 9-C'
            ]);

            $table->enum('status', [
                'aktif',
                'nonaktif',
                'lulus'
            ]);

            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
