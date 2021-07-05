<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSozlesmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sozlesmes', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('proje_fiyat')->default(0);
            $table->timestamp('alim_tarihi')->nullable();
            $table->timestamp('teslim_tarihi')->nullable();
            $table->string('aciklama_metni')->nullable();
            $table->unsignedBigInteger('proje_id')->nullable();//proje alım tarihi , kime yapılacağı(müşteri id) ,teslim tarihi gibi biligler burdan alınacak.
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
        Schema::dropIfExists('sozlesmes');
    }
}
