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
            $table->integer('assigned')->default(0);
            $table->integer('answered')->nullable();
            $table->integer('archived')->nullable();
            $table->string('status')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('cancelled')->nullable();
            $table->integer('revision')->nullable();
            $table->integer('tutorprice')->nullable();
            $table->integer('reviews')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->integer('late')->nullable();
            $table->integer('completed')->nullable();
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
