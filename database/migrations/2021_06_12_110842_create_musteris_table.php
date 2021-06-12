<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musteris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad');
            $table->string('soyad');
            $table->string('tel_no');
            $table->string('mail_adresi');
            $table->string('il');
            $table->string('ilce');
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
        Schema::dropIfExists('musteris');
    }
}
