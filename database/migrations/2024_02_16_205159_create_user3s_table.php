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
        Schema::create('user3s', function (Blueprint $table) {
            $table->id();
            $table->string('First_name');
            $table->string('Last_name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->foreignId('wilaya_id')->constrained('wilayas');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('year_of_experience');
            $table->string('devise_token')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user3s');
    }
};
