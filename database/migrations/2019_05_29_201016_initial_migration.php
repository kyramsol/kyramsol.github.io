<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function($table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('father_name');
            $table->integer('initial_year');
            $table->timestamps();
        });

        Schema::create('departments', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->integer('duration');
            $table->timestamps();
        });

        Schema::create('available_groups', function($table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->string('group_code');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
        });

        Schema::create('diplomas', function($table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->string('mark');
            $table->string('kurator');
            $table->string('file_path');
            $table->string('original_file_name');
            $table->text('description');
            $table->integer('creation_year');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('group_id')->references('id')->on('available_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diplomas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('students');
        Schema::dropIfExists('available_groups');
        Schema::dropIfExists('departments');
    }
}
