<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nit");
            $table->string("client");
            $table->string("contact");
            $table->string("phone");
            $table->string("email");
            $table->string("city");
            $table->string("paymentMethod");
            $table->string("type");
            $table->double("discount", 10, 2);
            $table->integer('cotization_id')->unsigned();
            $table->foreign('cotization_id')->references('id')->on('cotizations');

            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('orders');
    }
};
