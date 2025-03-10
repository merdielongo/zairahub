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
        Schema::create('offer_payments', function (Blueprint $table) {
            $table->id();
            $table->morphs('payable');
            $table->string('value');
            $table->foreignId('currency_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offer_payments', function (Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('offer_payments');
    }
};
