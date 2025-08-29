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
        Schema::table('products', function (Blueprint $table) {
            // Drop the single name column
            $table->dropColumn('name');
            
            // Add multilingual name columns
            $table->string('name_en')->after('id');
            $table->string('name_ar')->after('name_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop multilingual name columns
            $table->dropColumn(['name_en', 'name_ar']);
            
            // Add back single name column
            $table->string('name')->after('id');
        });
    }
};
