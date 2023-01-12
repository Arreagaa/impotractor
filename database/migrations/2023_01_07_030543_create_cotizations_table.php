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
        Schema::create('cotizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference');
            $table->boolean('is_ordered')->default(0);
            $table->double('rate', 10, 4);
            $table->double('total_weight', 10, 4);
            $table->integer('option');
            $table->double('extra_shipping', 10, 4);
            $table->string('provider_code');
            $table->integer('policy')->default(0);

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
        Schema::dropIfExists('cotizations');
    }
};
