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
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // اسم الدواء
            $table->string('scientific_name')->nullable(); // الاسم العلمي
            $table->text('description')->nullable(); // الوصف
            $table->string('barcode')->unique(); // الباركود
            $table->date('expiry_date')->nullable(); // تاريخ الانتهاء
            $table->string('manufacturer')->nullable(); // اسم الشركة
            $table->unsignedBigInteger('company_id'); // مفتاح أجنبي للشركات
            $table->unsignedBigInteger('category_id'); // مفتاح أجنبي للتصنيفات
            $table->decimal('pack_purchase_price', 10, 2)->nullable(); // سعر شراء الباكيت
            $table->decimal('pack_sell_price', 10, 2)->nullable(); // سعر بيع الباكيت
            $table->decimal('strip_purchase_price', 10, 2)->nullable(); // سعر شراء الشريط
            $table->decimal('strip_sell_price', 10, 2)->nullable(); // سعر بيع الشريط
            $table->integer('strip_quantity')->nullable(); // كمية الشريط
            $table->integer('pack_quantity')->nullable(); // كمية الباكيت
            $table->string('second_unit_name')->nullable(); // اسم الوحدة الثانية (باكيت أو شريط)
            $table->string('packing_info')->nullable(); // التعبئة (كم شريط داخل الباكيت)
            $table->string('status')->default('active'); // حالة المنتج (نشط/غير نشط)
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
