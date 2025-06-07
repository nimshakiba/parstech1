<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // جدول sales
        if (!Schema::hasTable('sales')) {
            Schema::create('sales', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('invoice_number');
                $table->unsignedBigInteger('customer_id');
                $table->unsignedBigInteger('seller_id');
                $table->decimal('total_price', 15, 2)->default(0);
                $table->decimal('total_amount', 15, 2)->default(0);
                $table->decimal('discount', 15, 2)->default(0);
                $table->decimal('tax', 15, 2)->default(0);
                $table->decimal('final_amount', 15, 2)->default(0);
                $table->decimal('paid_amount', 15, 2)->default(0);
                $table->decimal('remaining_amount', 15, 2)->default(0);
                $table->string('status')->default('pending');
                $table->string('payment_status')->default('unpaid');
                $table->decimal('cash_amount', 15, 2)->default(0);
                $table->string('cash_reference')->nullable();
                $table->timestamp('cash_paid_at')->nullable();
                $table->decimal('card_amount', 15, 2)->default(0);
                $table->string('card_reference')->nullable();
                $table->string('card_number', 16)->nullable();
                $table->timestamp('card_paid_at')->nullable();
                $table->decimal('pos_amount', 15, 2)->default(0);
                $table->string('pos_reference')->nullable();
                $table->timestamp('pos_paid_at')->nullable();
                $table->decimal('cheque_amount', 15, 2)->default(0);
                $table->string('cheque_number')->nullable();
                $table->string('cheque_bank')->nullable();
                $table->date('cheque_due_date')->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // جدول sales_items
        if (!Schema::hasTable('sales_items')) {
            Schema::create('sales_items', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('sale_id');
                $table->unsignedBigInteger('product_id');
                $table->decimal('amount', 15, 2);
                $table->decimal('unit_price', 15, 2);
                $table->decimal('total_price', 15, 2);
                $table->timestamps();
                $table->softDeletes();

                // روابط کلیدی
                // $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
                // $table->foreign('product_id')->references('id')->on('products');
            });
        }

        // جدول payments
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('sale_id');
                $table->decimal('amount', 15, 2);
                $table->string('method');
                $table->string('reference')->nullable();
                $table->dateTime('paid_at')->nullable();
                $table->timestamps();
                $table->softDeletes();

                // روابط کلیدی
                // $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            });
        }

        // به همین شکل بقیه جدول‌ها را هم اضافه کن
    }

    public function down()
    {
        // حذف معکوس جدول‌ها (این قسمت اختیاری است)
        Schema::dropIfExists('payments');
        Schema::dropIfExists('sales_items');
        Schema::dropIfExists('sales');
    }
};
