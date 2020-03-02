<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('parent_id')->default('0');
            $table->text('title');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('excerpt')->comment('save content with maximum 55 words')->nullable();
            $table->string('status')->comment('1:publish, 2:draft, 3:pending, 4:trash, 5:future')->default('1');
            $table->text('guid')->nullable();
            $table->integer('modified')->comment('check if category is edited or not 1:yes, 2:no')->default('2');
            $table->string('feature_image')->nullable();
            $table->string('section')->comment('1:bird, 2:cat, 3:dog, 4:fish');
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
        Schema::dropIfExists('categories');
    }
}
