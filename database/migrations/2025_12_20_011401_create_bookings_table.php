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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('venue_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('parent_booking_id')
                ->nullable()
                ->constrained('bookings')
                ->nullOnDelete();

            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->integer('total_hours');
            $table->decimal('total_price', 12, 2);

            $table->string('booking_code')->unique();

            $table->enum('status', [
                'pending',
                'confirmed',
                'cancelled',
                'completed',
            ])->default('pending');

            $table->timestamp('checkin_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
