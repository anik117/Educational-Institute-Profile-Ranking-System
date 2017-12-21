<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolRankingCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_ranking_criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->float('pass');
            $table->float('attendance');
            $table->integer('students');
            // $table->integer('teachers');
            $table->integer('fee');
            $table->string('class');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')
                ->references('id')->on('schools')
                ->ondelete('cascade');
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
        Schema::drop('school_ranking_criterias');
    }
}
