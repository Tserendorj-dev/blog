<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('pic_path');
            $table->longText('desc_text');
            $table->longText('full_text');
            $table->boolean('is_visible')->default(0);
            $table->integer('views');
            $table->integer('comments');
            $table->string('lang');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cat_id')->references('cat_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
