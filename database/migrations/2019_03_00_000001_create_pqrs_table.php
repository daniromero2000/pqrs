<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePqrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula')->nullable()->index();
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->string('lead')->nullable();
            $table->string('phone')->nullable();
            $table->string('pqr');
            $table->string('asunto');
            $table->string('mensaje');
            $table->integer('status')->default(0);
            $table->integer('pqr_status_id')->unsigned();
            $table->foreign('pqr_status_id')->references('id')->on('pqr_statuses');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->boolean('data_politics')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('pqrs');
    }
}
