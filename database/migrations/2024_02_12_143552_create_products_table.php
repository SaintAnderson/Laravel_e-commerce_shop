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
            $table->string('title');
            $table->string('slug');
            $table->bigInteger('seller_id')->nullable()->constrained()->nullOnDelete();
            $table->bigInteger('category_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('seller_id');
            $table->integer('category_id');
            $table->text('article');
            $table->text('description');
            $table->integer('count');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seller_id')->on('sellers')->references('id');
            $table->foreign('category_id')->on('categoryes')->references('id');
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
