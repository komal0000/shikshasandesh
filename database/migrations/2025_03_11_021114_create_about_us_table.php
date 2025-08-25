<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('photo'); // Field for main photo (path to image)
            $table->string('thumbnail'); // Field for thumbnail photo (path to image)
            $table->string('youtube_video_link')->nullable(); // Field for YouTube video link
            $table->text('description')->nullable(); // Optional field for description
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
