<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('cate_id');
            $table->Integer('user_created');
            $table->Integer('user_update');
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->string('slug');
            $table->string('thumbnail');
            $table->integer('type');
            $table->integer('show_home');
            $table->integer('oder');
            $table->integer('views');
            $table->integer('status')->default(1);
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
