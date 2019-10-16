<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagaduriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagadurias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('office');
            $table->string('address');
            $table->string('city');
            $table->string('departament');
            $table->string('phoneNumber'); 
            $table->integer('active');
            $table->integer('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagadurias');
    }
}
