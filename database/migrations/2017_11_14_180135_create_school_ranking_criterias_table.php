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
            $table->integer('pass');
            $table->integer('attendance');
            $table->integer('students');
            $table->integer('teachers');
            $table->integer('fee');
            $table->string('class');
            $table->integer('school_id');
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
