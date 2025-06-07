<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('warehouses')) {
            Schema::create('warehouses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('code')->nullable();
                $table->unsignedBigInteger('branch_id')->nullable();
                $table->string('icon')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedBigInteger('manager_id')->nullable();
                $table->unsignedInteger('total_stock')->default(0);
                $table->unsignedInteger('min_stock')->default(0);
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
