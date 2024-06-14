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
            $table->string('name');
            $table->string('brand')->nullable();
            $table->year('production_year')->nullable();
            $table->string('type');
            $table->string('color');
            $table->enum('condition', ['Baru', 'Bekas']);
            $table->double('price');
            $table->longText('description');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('sub_categorie_id')->constrained('sub_categories');
            $table->foreignId('status_id')->constrained('status_products');
            $table->foreignId('village_id')->constrained('villages')->nullable()->default(null);
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
