<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('products') || !Schema::hasColumn('products', 'subcategory_id')) {
            return;
        }

        // Backfill any existing NULL subcategory_id values with a per-category "General" subcategory.
        $nullCategoryIds = DB::table('products')
            ->whereNull('subcategory_id')
            ->whereNotNull('category_id')
            ->distinct()
            ->pluck('category_id');

        foreach ($nullCategoryIds as $categoryId) {
            $subcategoryId = DB::table('subcategories')
                ->where('category_id', $categoryId)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->value('id');

            if (!$subcategoryId) {
                $subcategoryId = DB::table('subcategories')->insertGetId([
                    'category_id' => $categoryId,
                    'name_en' => 'General',
                    'name_ar' => 'عام',
                    'sort_order' => 9999,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::table('products')
                ->where('category_id', $categoryId)
                ->whereNull('subcategory_id')
                ->update([
                    'subcategory_id' => $subcategoryId,
                    'updated_at' => now(),
                ]);
        }

        // Enforce NOT NULL at the DB level (MySQL).
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            // This FK is created as ON DELETE SET NULL by default (nullOnDelete),
            // so we must replace it with RESTRICT before making the column NOT NULL.
            DB::statement('ALTER TABLE `products` DROP FOREIGN KEY `products_subcategory_id_foreign`');
            DB::statement('ALTER TABLE `products` MODIFY `subcategory_id` BIGINT UNSIGNED NOT NULL');
            DB::statement('ALTER TABLE `products` ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories`(`id`) ON DELETE RESTRICT');
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('products') || !Schema::hasColumn('products', 'subcategory_id')) {
            return;
        }

        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE `products` DROP FOREIGN KEY `products_subcategory_id_foreign`');
            DB::statement('ALTER TABLE `products` MODIFY `subcategory_id` BIGINT UNSIGNED NULL');
            DB::statement('ALTER TABLE `products` ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories`(`id`) ON DELETE SET NULL');
        }
    }
};

