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
        Schema::create('dependencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dependency_id')->constrained('modules')->cascadeOnDelete();
            $table->boolean('has_required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dependencies', function (Blueprint $table) {
            $table->dropForeign(['module_id']);
            $table->dropForeign(['dependency_id']);
        });
        Schema::dropIfExists('dependencies');
    }
};
