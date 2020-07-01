<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->text('fname')->nullable();
            $table->text('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('tutorid')->unique();
            $table->string('timezone')->nullable();
            $table->text('phone')->nullable();
            $table->text('language')->nullable();
            $table->string('software')->unique();
            $table->string('expertise')->nullable();
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
        Schema::dropIfExists('tutors');
    }
}
