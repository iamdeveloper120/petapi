<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('comment_post_id');
            $table->string('comment_title')->nullable();
            $table->string('comment_content')->nullable();
            $table->string('comment_media')->comment('can be image, url and/or file')->nullable();
            $table->bigInteger('commenter_id')->comment('if commenter is existing user/commenter')->nullable();
            $table->text('commenter_url')->nullable();
            $table->string('commenter_email')->nullable();
            $table->ipAddress('commenter_ip')->nullable();
            $table->bigInteger('comment_parent_id')->comment('if replying to the comment')->nullable();
            $table->integer('comment_status')->comment('1:approved, 2:pending, 3:rejected')->default('1');
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
        Schema::dropIfExists('comments');
    }
}
