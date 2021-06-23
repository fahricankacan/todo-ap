<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjeGorevlerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proje_gorevleris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proje_id')->nullable();
            $table->string('gorev_adi');
            $table->longText('gorev_aciklaması')->nullable();
            $table->timestamp('alim_tarihi')->nullable();
            $table->timestamp('teslim_tarihi')->nullable();
            $table->integer('personel_id')->default('1')->nullable();
            $table->integer('proje_durum_id')->default('1');
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
        Schema::dropIfExists('proje_gorevleris');
    }
}
