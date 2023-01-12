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
            $table->string('referencia');
            $table->boolean('status')->default(0);
            $table->string('codigoProveedor');
            $table->double('cambio', 10, 4);
            $table->string('transporte');
            $table->double('fleteExtra', 10, 4);
            $table->double('pesoTotal', 10, 4);
            $table->text('numeroParte');
            $table->text('cantidad');
            $table->text('descripcion');
            $table->double('pesoUnidad');
            $table->double('precio');
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
