<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->string("contact_name");
            $table->string("contact_phone");
            $table->string("contact_email");
            $table->string("city");
            $table->string("payment_method");
            $table->string("type");
            $table->double("discount", 10, 2);
            $table->integer('cotization_id')->unsigned();
            $table->timestamps();
            $table->foreign('cotization_id')->references("id")->on('cotization');
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
}
