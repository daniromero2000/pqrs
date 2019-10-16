<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('creditLine')->nullable();
            $table->string('pagaduria')->nullable();
            $table->integer('age')->nullable();
            $table->string('customerType')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('timeLimit')->nullable(); 
            $table->unsignedInteger('idLead');
            $table->foreign('idLead')->references('id')->on('leads');
            $table->unsignedInteger('idpagaduria');
            $table->foreign('idpagaduria')->references('id')->on('pagadurias');
            $table->integer('salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquidators');
    }
}
