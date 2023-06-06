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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('partNumber'); 
            $table->text('description');
            $table->double('ene')->default(0);
            $table->double('feb')->default(0);
            $table->double('mar')->default(0);
            $table->double('abr')->default(0);
            $table->double('may')->default(0);
            $table->double('jun')->default(0);
            $table->double('jul')->default(0);
            $table->double('ago')->default(0);
            $table->double('sep')->default(0);
            $table->double('oct')->default(0);
            $table->double('nov')->default(0);
            $table->double('dic')->default(0);
            $table->double('stock')->default(0);
            $table->double('minimumAmount')->default(0);
            $table->text('rotation')->nullable();
            $table->text('settlement')->nullable();
            $table->double('monthlyForecast')->default(0); 
            $table->double('quarterlyForecast')->default(0);
            $table->double('missingMonthly')->default(0);
            $table->double('quarterlyShortfall')->default(0);
            $table->double('suggestion')->default(0);
            $table->double('suggestionSeller')->default(0);
            $table->double('suggestionSeller3')->default(0);
            $table->foreignId('order_item_id')->on('order_items')->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
};
