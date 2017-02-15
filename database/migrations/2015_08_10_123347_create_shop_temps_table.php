<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTempsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('shop_temps', function(Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('shop_name', 255);
            $table->string('manager_name', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('shop_temps');
    }

}
