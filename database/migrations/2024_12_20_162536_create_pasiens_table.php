<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->text('usia_pasien');
            $table->text('alamat_pasien');
            $table->string('tgl_pemeriksaan');
            $table->string('jenis_kelamin_pasien');
            // ORTU
            $table->string('nama_ortu');
            $table->string('jenis_kelamin_ortu');
            $table->text('pekerjaan');
            $table->text('alamat_ortu');
            $table->text('no_nik');
            $table->string('no_hp');
            $table->string('penyakit_terdeteksi')->nullable();
            $table->decimal('probabilitas', 5, 2)->nullable(); // Contoh probabilitas dengan dua desimal
            $table->text('definisi')->nullable();
            $table->text('solusi')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
};
