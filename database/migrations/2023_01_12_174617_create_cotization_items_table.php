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
        Schema::create('cotization_items', function (Blueprint $table) {
            $table->id();
            $table->text('partNumber');
            $table->text('quantity'); //cantidad
            $table->text('description');
            $table->double('weightUnit'); //Peso Unitario
            $table->double('price')->nullable();
            
            
            $table->foreignId('cotization_id')->on('cotizations')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('cotization_items');
    }
};
