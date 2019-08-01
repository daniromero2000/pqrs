<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePqrCommentaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqrcommentaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commentary_1');
            $table->string('user');
            $table->integer('pqr_id')->unsigned()->index();
            $table->foreign('pqr_id')->references('id')->on('pqrs');
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('pqrcommentaries');
    }
}
