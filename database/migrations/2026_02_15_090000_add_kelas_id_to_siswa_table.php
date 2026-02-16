<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('kelas_id')->nullable()->after('alamat');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            if (Schema::hasColumn('siswa', 'kelas')) {
                $table->dropColumn('kelas');
            }
        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            if (! Schema::hasColumn('siswa', 'kelas')) {
                $table->string('kelas')->nullable()->after('alamat');
            }
            if (Schema::hasColumn('siswa', 'kelas_id')) {
                $table->dropForeign(['kelas_id']);
                $table->dropColumn('kelas_id');
            }
        });
    }
};
