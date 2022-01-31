<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->boolean('first_edition')->default(0);
            $table->string('serial_code', 10)->nullable()->unique();
            $table->enum('ATK', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']);
            $table->enum('DEF', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']);
            $table->enum('starts', ['1', '2', '3', '4', '5']);
            $table->string('description', 255)->nullable();
            $table->string('image', 50);
            $table->date('date_created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
