<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coffee_shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('town')->nullable();
            $table->string('postcode')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('google_place_id')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->boolean('has_wifi')->default(false);
            $table->boolean('has_outdoor')->default(false);
            $table->boolean('dog_friendly')->default(false);
            $table->boolean('hot_food')->default(false);
            $table->boolean('accessible')->default(false);
            $table->string('opening_hours')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coffee_shops');
    }
};
