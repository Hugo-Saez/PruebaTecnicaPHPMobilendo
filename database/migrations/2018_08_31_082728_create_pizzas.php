<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pizzas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->float('precio');
          $table->string('url_imagen');
          $table->integer('ingrediente_id')->unsigned();
          $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
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
      Schema::dropIfExists('pizzas');
    }
}
