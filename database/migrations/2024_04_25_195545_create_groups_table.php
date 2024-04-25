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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table-> string('name')->nullable();
            $table-> string('notes')->nullable();
            $table-> decimal('total_before_discount',8,2)->nullable();
            $table-> decimal('discount_value',8,2)->nullable();
            $table-> decimal('total_after_discount',8,2)->nullable();
            $table-> string('tax_rate')->nullable();
            $table-> decimal('total_with_tax',8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
