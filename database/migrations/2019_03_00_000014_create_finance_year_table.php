<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_year', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')->references('id')->on('years');
            $table->integer('finance_id')->unsigned()->index();
            $table->foreign('finance_id')->references('id')->on('finances');
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
        Schema::dropIfExists('finance_year');
    }
}
