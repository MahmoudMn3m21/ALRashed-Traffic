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
            // Drop old columns if they exist
            $table->dropColumn(['name_en', 'name_ar']);
            
            // Add new columns
            $table->string('name')->after('id');
            $table->text('description')->nullable()->after('image');
            $table->string('code')->nullable()->after('description');
            $table->string('material')->nullable()->after('code');
            $table->string('color')->nullable()->after('material');
            $table->text('features')->nullable()->after('color');
            $table->text('usages')->nullable()->after('features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn(['name', 'description', 'code', 'material', 'color', 'features', 'usages']);
            
            // Add back old columns
            $table->string('name_en')->after('id');
            $table->string('name_ar')->after('name_en');
        });
    }
};
