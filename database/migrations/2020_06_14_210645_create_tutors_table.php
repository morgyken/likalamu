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
            $table->string('tutorid')->nullable();
            $table->string('about')->nullable();
            $table->string('timezone')->nullable();
            $table->text('phone')->nullable();
            $table->string('country')->nullable();
            $table->text('language')->nullable();
            $table->string('software')->nullable();
            $table->string('expertise')->nullable();
            $table->string('school')->nullable();
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
        Schema::dropIfExists('tutors');
    }
}
