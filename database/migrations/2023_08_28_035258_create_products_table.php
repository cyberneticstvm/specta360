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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('subcategory_id')->references('id')->on('subcategories');
            $table->unsignedBigInteger('vendor_id')->references('id')->on('vendors')->default(0);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('pcode', 15)->unique();
            $table->integer('qty')->default(0);
            $table->decimal('mrp', 8, 2)->default(0);
            $table->decimal('selling_price', 8, 2)->default(0);
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->boolean('hot_deal')->comment('1-yes, 0-no')->default(0);
            $table->boolean('special_offer')->comment('1-yes, 0-no')->default(0);
            $table->boolean('featured_product')->comment('1-yes, 0-no')->default(0);
            $table->boolean('special_deal')->comment('1-yes, 0-no')->default(0);
            $table->string('image')->nullable();
            $table->boolean('status')->comment('1-active, 0-inactive')->default(1);
            $table->unsignedBigInteger('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
