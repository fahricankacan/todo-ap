<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilgiBankasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilgi_banksis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('proje_id')->nullable();
            $table->unsignedBigInteger('dosya_id')->nullable(); 
            $table->string('baslik')->nullable();
            $table->string('aciklama')->nullable();
            $table->unsignedBigInteger('activity_id')->default('1')->nullable();;
            $table->unsignedBigInteger('personel_id')->nullable();
            $table->timestamps();
            // $table->foreign('proje_id')->references('id')->on('projes');
            // $table->foreign('dosya_id')->references('id')->on('dosyas');
            // $table->foreign('activity_id')->references('id')->on('bilgi_bankasi_activities');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bilgi_bankasis');
    }
}
