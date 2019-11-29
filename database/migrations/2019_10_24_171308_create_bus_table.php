<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
			$table->string('bu_name');
			$table->string('bu_price');
			$table->boolean('bu_rent')->default(true);
			$table->string('bu_square');
			$table->boolean('bu_type')->default(true);
			$table->string('bu_small_dis');
			$table->string('bu_meta');
			$table->string('bu_langtuide');
			$table->string('bu_latituide');
			$table->string('bu_large_dis');
			$table->boolean('bu_status')->default(true);
			$table->integer('user_id');
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
        Schema::dropIfExists('bus');
    }
}
