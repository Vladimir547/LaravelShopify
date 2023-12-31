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
            $table->bigInteger('external_id');
            $table->string('name');
            $table->string('sku');
            $table->string('image');
            $table->text('description');
            $table->float('price');
            $table->bigInteger('shops_id')->unsigned()->index('shops_id')->nullable();
            $table->foreign('shops_id', 'shops_products_fk')->references('id')->on('shops');
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
