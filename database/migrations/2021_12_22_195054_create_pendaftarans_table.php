<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('lowongan_id')->default('');
            $table->integer('no_tes')->unique();
            $table->string('foto_diri');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('nama_sekolah');
            $table->string('no_hp');
            $table->string('nik');
            $table->string('email');
            $table->string('ukuran_baju');
            $table->string('ukuran_celana');
            $table->string('ukuran_sepatu');
            $table->string('jenis_vaksin_1');
            $table->date('tgl_vaksin_1');
            $table->string('kota_vaksin_1');
            $table->string('img_bukti_1');
            $table->string('jenis_vaksin_2');
            $table->date('tgl_vaksin_2');
            $table->string('kota_vaksin_2');
            $table->string('img_bukti_2');
            $table->string('status')->default('Verifikasi Data');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
