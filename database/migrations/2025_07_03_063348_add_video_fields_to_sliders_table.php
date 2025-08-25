<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->boolean('is_video')->default(false)->after('link');
            $table->string('video_url')->nullable()->after('is_video');
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['is_video', 'video_url']);
        });
    }
};
