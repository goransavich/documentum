<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('clas_id');
            $table->string('clas_label')->unique();
            $table->string('clas_name');
            $table->timestamps();
        });

        Schema::create('clas_department', function (Blueprint $table) {
            $table->integer('clas_id');
            $table->integer('department_id');
            $table->primary(['clas_id', 'department_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');

        Schema::dropIfExists('clas_department');
    }
}
