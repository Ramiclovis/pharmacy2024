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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->decimal('debt_amount', 10, 2);
            $table->date('debt_date');
            $table->date('due_date');
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('remaining_amount', 10, 2)->nullable();
            $table->text('note')->nullable();
            $table->enum('payment_status', ['Paid', 'Unpaid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
