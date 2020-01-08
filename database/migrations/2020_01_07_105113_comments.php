<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->integer('parent_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rate_id');
            $table->longText('comment_text');
            $table->boolean('is_visible')->default(0);
            $table->string('lang');
            $table->timestamps();

            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('rate_id')->references('rate_id')->on('rates');
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
