<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('adds', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // Insert default values
        DB::table('adds')->insert([
            ['key' => 'students', 'value' => '', 'icon' => null],
            ['key' => 'graduates', 'value' => '', 'icon' => null],
            ['key' => 'awards', 'value' => '', 'icon' => null],
            ['key' => 'faculties', 'value' => '', 'icon' => null],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adds');
    }
};
