<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->date('shipping_date');
            $table->time('shipping_time');
            $table->unsignedInteger('age');
            $table->string('gender');
            $table->string('relation')->nullable();
            $table->unsignedInteger('mobile');
            $table->string('email')->nullable();
            $table->string('city');
            $table->unsignedInteger('postal');
            $table->string('address');
            $table->longtext('note')->nullable();
            $table->string('status')->default('incomplete');

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
        Schema::dropIfExists('shippings');
    }
}
