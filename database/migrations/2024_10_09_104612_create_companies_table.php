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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // معرف الشركة
            $table->string('name'); // اسم الشركة
            $table->string('address')->nullable(); // عنوان الشركة
            $table->string('phone')->nullable(); // رقم هاتف الشركة
            $table->string('email')->nullable(); // بريد إلكتروني للشركة
            $table->text('description')->nullable(); // وصف للشركة
            $table->timestamps(); // توقيت الإنشاء والتحديث
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
