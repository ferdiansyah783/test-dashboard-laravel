<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained(
                table: 'users', indexName: 'transactions_customer_id'
            );
            $table->foreignId('product_id')->nullable()->constrained();
            $table->integer('quantity')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('reference_number')->default(DB::raw('UUID()'))->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
