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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(\App\Models\User::class)
                ->nullable();
            $table->integer('session_id')
                ->nullable();

            $table->enum('status', [
                'active', 'completed', 'abandoned'
            ]);

            $table->decimal('cart_total', 10, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
