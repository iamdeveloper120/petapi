<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->text('post_title')->comment('same as user types');
            $table->string('post_slug')->comment('custom title and/or title with dashes');
            $table->string('post_name')->comment('title with dashes ')->nullable();
            $table->text('post_content')->nullable();
            $table->text('post_excerpt')->comment('save post_content with maximum 55 words')->nullable();
            $table->string('post_status')->comment('1:publish, 2:draft, 3:pending, 4:trash, 5:future')->default('1');
            $table->integer('post_visibility')->comment('1:public, 2:private')->default('1');
            $table->text('post_type')->comment('1:posts, 2:pages')->nullable();
            $table->text('post_guid')->nullable();
            $table->integer('post_modified')->comment('check if post is edited or not 1:yes, 2:no')->default('2');
            $table->string('ping_status')->comment('send notification to ip/email if post content is updated 1:yes, 2:no');
            $table->string('post_password')->nullable();
            $table->string('post_feature_image')->nullable();
            $table->text('to_ping')->comment('ip/email to send notification')->nullable();
            $table->integer('comment_status')->comment('1:enabled, 2:disabled')->default('1');
            $table->bigInteger('comment_count')->nullable()->default('0');
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
        Schema::dropIfExists('posts');
    }
}
