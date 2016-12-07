<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('background_color');
            $table->string('headers_color');
            $table->string('text_color');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('portfolios');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
