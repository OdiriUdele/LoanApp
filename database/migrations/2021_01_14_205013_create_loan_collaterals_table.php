<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanCollateralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_collaterals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('loan_id')->unsigned();
            $table->foreign('loan_id')->references('id')
            ->on('loans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('car_make');
            $table->string('car_year');
            $table->string('car_model');
            $table->string('car_body_style');
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
        Schema::dropIfExists('loan_collaterals');
    }
}
