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
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('meta_title');
            $table->string('country_name', 50);
            $table->string('country_code', 5);
            $table->string('flag');
            $table->string('currency', 25);
            $table->string('currency_symbol');
            $table->string('tax_name', 25);
            $table->decimal('tax_percentage', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_settings');
    }
};
