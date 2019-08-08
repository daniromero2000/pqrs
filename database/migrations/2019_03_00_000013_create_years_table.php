<?php

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year')->unique();
            $table->string('slug');
            $table->integer('status')->default(0);
            $table->timestamps();
            NestedSet::columns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('years', function (Blueprint $table) {

            $sm = Schema::getConnection()->getDoctrineSchemaManager();

            $doctrineTable = $sm->listTableDetails('years');

            if ($doctrineTable->hasIndex('years__lft__rgt_parent_id_index')) {
                $table->dropIndex('years__lft__rgt_parent_id_index');
            }
        });

        Schema::dropIfExists('years');
    }
}
