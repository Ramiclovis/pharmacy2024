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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone'); // تحديد الطول لأرقام الهواتف
            $table->text('notes')->nullable(); // ملاحظات يمكن أن تكون فارغة 
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['active', 'inactive']); // حالة المورد 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
