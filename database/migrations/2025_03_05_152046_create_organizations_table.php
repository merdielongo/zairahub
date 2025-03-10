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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('organization_type_id')->constrained()->cascadeOnDelete();
            $table->string('email')->nullable();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('owner_id')->constrained('people')->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('status')->default('pending');
            $table->string('logo')->nullable();
            $table->foreignId('address_id')->constrained()->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('organizations')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropForeign(['organization_type_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['address_id']);
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('organizations');
    }
};
