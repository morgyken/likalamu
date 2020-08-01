<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_tables', function (Blueprint $table) {
            $table->id();

            $table->text('userid'); //the person who assignes, may be student or admin

            $table->text('questionid'); // id of the question

            $table->text('tutorid'); // the assigned tutor

            $table->text('name'); // tutorname

            $table->timestamps(); // time stamps

            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_tables');
    }
}
