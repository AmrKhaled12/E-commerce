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
            $table->string('name')->nullable(false);
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('adress')->nullable();
            $table->string('price')->nullable()->default('free');
            $table->foreignId('user_id')->nullable(false)->constrained('users','id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('chaild_category_id')->nullable(false)->constrained('chaild_categories','id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
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
