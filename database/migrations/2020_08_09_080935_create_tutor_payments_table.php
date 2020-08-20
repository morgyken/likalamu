<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_payments', function (Blueprint $table) {
            $table->id();

            $table->text('tutorid'); //the person who assignes, may be student or admin

            $table->text('name'); // id of the question

            $table->text('email'); // id of the question

            $table->text('phone'); // id of the question

            $table->text('tutorpay'); // id of the question

            $table->text('paid')->nullable(); // id of the question

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
        Schema::dropIfExists('tutor_payments');
    }
}
