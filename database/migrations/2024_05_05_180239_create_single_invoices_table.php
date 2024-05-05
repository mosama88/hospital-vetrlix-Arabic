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
        Schema::create('single_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->foreignId('patient_id')->references('id')->on('patients')->cascadeOnDelete();
            $table->foreignId('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('service_id')->references('id')->on('services')->cascadeOnDelete();
            $table->double('price',8,2)->default(0);
            $table->double('discount_value',8,2)->default(0);     //قيمة الخصم قبل الضريبه
            $table->string('tax_rate');    //  20% نسبة الضريبه
            $table->string('tax_value');     //   قيمة الضريبه من 20%
            $table->double('total_with_tax',8,2)->default(0);
            $table->integer('type')->default(1);   //نقدى ام آجل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_invoices');
    }
};
