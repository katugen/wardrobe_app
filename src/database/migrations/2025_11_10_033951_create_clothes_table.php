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
    Schema::create('clothes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('category_id')->nullable();
        $table->string('color')->nullable();
        $table->string('size')->nullable();
        $table->string('brand')->nullable();
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes');
    }
};
