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
        Schema::create('pack_consumptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pack_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity_used')->default(0);
            $table->foreignId('subscription_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pack_consumptions', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['pack_id']);
            $table->dropForeign(['subscription_id']);
        });
        Schema::dropIfExists('pack_consumptions');
    }
};
