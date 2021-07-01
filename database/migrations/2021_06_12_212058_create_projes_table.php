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
            $table->string('proje_adi')->nullable();
            $table->date('alim_tarihi')->nullable();
            $table->date('teslim_tarihi')->nullable();
            $table->longText('proje_aciklamasi')->nullable();            
            $table->unsignedInteger('musteri_id')->nullable();
            $table->boolean('aktif_pasif')->default(1);//proje yapılıyor durumunda ise aktif , proje durmuş ise pasif olacak
            $table->unsignedBigInteger('sozlesme_id')->nullable();
            $table->unsignedBigInteger('proje_durum_id')->default(1)->nullable();
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
