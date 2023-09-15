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
            $table->string('title')->nullable(); // Product Title
            $table->string('description')->nullable(); // Product Description
            $table->string('image')->nullable(); // Product Image
            $table->string('catagory')->nullable(); // Product Catagory
            $table->string('quantity')->nullable(); // Product Quantity
            $table->string('price')->nullable(); // Product Price
            $table->string('discount_price')->nullable(); // Product Discount Price
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
