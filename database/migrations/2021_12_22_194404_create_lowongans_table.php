<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('title_lowongan')->unique();
            $table->string('slug')->unique();
            $table->foreignId('perusahaan_id');
            $table->string('excerpt')->nullable();
            $table->text('detail_lowongan');
            $table->text('kriteria_lowongan');
            $table->text('informasi_tambahan')->nullable();
            $table->date('tgl_buka');
            $table->date('tgl_tutup');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('lowongans');
    }
}
