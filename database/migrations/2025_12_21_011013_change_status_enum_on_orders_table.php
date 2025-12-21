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
        DB::table('orders')
            ->where('status', 'refunded')
            ->update(['status' => 'failed']);

        DB::statement("
            ALTER TABLE orders
            MODIFY status ENUM(
                'pending',
                'paid',
                'expired',
                'failed'
            ) DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE orders
            MODIFY status ENUM(
                'pending',
                'paid',
                'failed',
                'expired',
                'refunded'
            ) DEFAULT 'pending'
        ");
    }
};
