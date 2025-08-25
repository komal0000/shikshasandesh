<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('facility_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->enum('type', ['facility', 'achievement']); // 'facility' or 'achievement'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facility_achievements');
    }
};
