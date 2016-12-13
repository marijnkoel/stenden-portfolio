<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('slb');
            $table->integer('type');
            $table->float('grade')->nullable();
            $table->integer('portfolio_id')->unsigned();
            $table->foreign('portfolio_id')->references('id')->on('portfolios');
            $table->boolean('approved')->default(true);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('path')->nullable();
            $table->string('url')->nullable();
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
        Schema::drop('modules');
    }
}
