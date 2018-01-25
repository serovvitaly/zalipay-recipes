<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('url_id');
            $table->string('name');
            $table->string('image');
            $table->string('recipe_yield');
            $table->string('total_time');
            $table->string('recipe_cuisine');
            $table->string('description');
        });

        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->integer('ingredient_id');
            $table->string('name');
            $table->string('value');
        });

        Schema::create('recipe_instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->integer('step_num');
            $table->text('text');
            $table->string('media_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('recipe_ingredients');
        Schema::dropIfExists('recipe_instructions');
    }
}
