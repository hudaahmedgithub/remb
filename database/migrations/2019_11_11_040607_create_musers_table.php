<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusersTable extends Migration
{
    public function up()
    {
        Schema::create('musers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('price');
			$table->integer('operation_id')->unsigned();
			$table->string('image')->default('default.png');
			$table->integer('category_id')->unsigned();
			$table->string('small_dis');
			$table->integer('countrty_id')->unsigned();
			$table->string('large_dis');
			$table->boolean('status')->default(true);
			$table->integer('user_id')->unsigned();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
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
        Schema::dropIfExists('musers');
    }
}
