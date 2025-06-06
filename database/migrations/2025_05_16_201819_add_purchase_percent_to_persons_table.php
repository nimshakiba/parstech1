<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->double('purchase_percent')->nullable()->after('total_purchases');
        });
    }

    public function down(): void
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->dropColumn('purchase_percent');
        });
    }
};
