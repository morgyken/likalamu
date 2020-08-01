<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->string('qid');
            $table->string('assigned');
            $table->string('answered')->nullable();
            $table->string('archived')->nullable();
            $table->string('paid')->nullable();
            $table->string('cancelled')->nullable();
            $table->string('revision')->nullable();
            $table->string('price')->nullable();
            $table->string('tutorprice')->nullable();
            $table->string('late')->nullable();
            $table->string('completed')->nullable();
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
        Schema::dropIfExists('matrices');
    }
}
