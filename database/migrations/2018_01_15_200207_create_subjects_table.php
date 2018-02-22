<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('subject_id');
            $table->integer('city_id');
            $table->integer('clas_id');
            $table->integer('department_id');
            $table->string('archive');
            $table->integer('municipality_id');
            $table->integer('unit_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('subjecttype');
            $table->string('controlled');
            $table->string('owner');
            $table->integer('ord_number');
            $table->integer('ord_year');
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
        Schema::dropIfExists('subjects');
    }
}
