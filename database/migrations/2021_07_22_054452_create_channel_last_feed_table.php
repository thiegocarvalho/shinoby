<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelLastFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_last_feed', function (Blueprint $table) {
            $table->id();
            $table->string("channel_platform_id");
            $table->foreign('channel_platform_id')->references('channel_platform_id')->on('channel')->onDelete('cascade');
            $table->string("feed_platform_id")->unique();
            $table->string("title");
            $table->text("description")->nullable();
            $table->string("thumbnail_url");
            $table->string("views");
            $table->string("rating");
            $table->string("url");
            $table->dateTime("platform_published_at");
            $table->dateTime("platform_updated_at");
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
        Schema::dropIfExists('last_video');
    }
}
