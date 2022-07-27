<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->default(1);
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nik')->nullable()->unique();
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('avatar')->nullable();
            $table->string('jenis_vaksin_1')->nullable();
            $table->date('tgl_vaksin_1')->nullable();
            $table->string('kota_vaksin_1')->nullable();
            $table->string('img_bukti_1')->nullable();
            $table->string('jenis_vaksin_2')->nullable();
            $table->date('tgl_vaksin_2')->nullable();
            $table->string('kota_vaksin_2')->nullable();
            $table->string('img_bukti_2')->nullable();
            $table->rememberToken();
            
            $table->boolean('active')->default(false);
            
            // $table->bigInteger('token')->nullable();
            $table->string('token')->nullable();

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
        Schema::dropIfExists('users');
    }
}