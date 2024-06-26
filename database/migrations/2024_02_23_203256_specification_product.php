<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('specification_product', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('specification_id');
            $table->string('value')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('specification_product');
    }
};
