<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('sistemas_id')->unsigned();
          $table->string('justificativa', 500);
          $table->string('usuario', 100)->default('Maycon');
          $table->enum('status',['Ativo','Cancelado'])->default('Ativo');
          $table->foreign('sistemas_id')->references('id')->on('sistemas');
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
        Schema::dropIfExists('controles');
    }
}
