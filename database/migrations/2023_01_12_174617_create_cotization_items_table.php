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
            $table->double('quantity'); //cantidad
            $table->text('description');
            $table->double('price', 10, 2)->nullable();
            
            $table->double('percentage', 10, 4)->nullable();
            $table->double('total_unit', 10, 4)->nullable();
            $table->double('total', 10, 4)->nullable();
            
            $table->foreignId('cotization_id')->on('cotizations')->onDelete('cascade');
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
