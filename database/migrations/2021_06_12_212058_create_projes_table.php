<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proje_adi');
            $table->date('alim_tarihi');
            $table->date('teslim_tarihi');
            $table->longText('proje_aciklamasi');            
            $table->unsignedInteger('musteri_id');
            $table->boolean('aktif_pasif')->default(1);
            $table->timestamps();
           // $table->foreign('musteri_id')->references('id')->on('musteris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projes');
    }
}
