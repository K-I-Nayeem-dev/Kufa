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
        Schema::create('about_des_imgs', function (Blueprint $table) {
            $table->id();
            $table->longText('about_education_description');
            $table->string('about_img')->nullable();
            $table->string('about_des_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_des_imgs');
    }
};
