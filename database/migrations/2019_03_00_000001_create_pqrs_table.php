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
            $table->string('name');
            $table->string('cedula')->nullable()->index();
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->string('genre')->nullable();
            $table->string('lead')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default(0);
            $table->integer('pqr_status_id')->unsigned();
            $table->foreign('pqr_status_id')->references('id')->on('pqr_statuses');
            $table->date('birthday')->nullable();
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
