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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('house_name')->nullable();
            $table->string('area')->nullable();
            $table->unsignedBigInteger('city_id')->default(0); 
            $table->unsignedBigInteger('state_id')->default(0); 
            $table->string('pincode');
            $table->string('landmark')->nullable();
            $table->string('mobile', 10)->nullable();
            $table->enum('type', ['shipping', 'billing'])->default('shipping');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
