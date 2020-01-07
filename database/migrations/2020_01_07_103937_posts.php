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
            $table->integer('cat_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('pic_path');
            $table->longText('desc_text');
            $table->longText('full_text');
            $table->boolean('is_visible')->default(0);
            $table->integer('views');
            $table->integer('comments');
            $table->string('lang');
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
        //
    }
}
