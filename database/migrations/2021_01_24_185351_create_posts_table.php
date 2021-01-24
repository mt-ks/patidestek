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
            $table->id();
            $table->bigInteger('user_id');
            $table->longText('description');
            $table->longText('image')->nullable();
            $table->string('location')->nullable();
            $table->integer('city_id');
            $table->integer('region_id');
            $table->integer('region_sub_id');
            $table->boolean('is_published')->default(1);
            $table->index(['city_id','region_id','region_sub_id','is_published'],'filter_post');
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
