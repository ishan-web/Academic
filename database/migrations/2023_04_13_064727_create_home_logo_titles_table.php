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
        Schema::create('home_logo_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->boolean('status')->default(0);
            $table->boolean('stat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_logo_titles');
    }
};