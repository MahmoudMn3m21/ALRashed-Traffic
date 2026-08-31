<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->index(['category_id', 'sort_order', 'id'], 'products_category_sort_id_index');
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->index(['sort_order', 'id'], 'gallery_items_sort_id_index');
        });

        Schema::table('catalog_items', function (Blueprint $table) {
            $table->index(['sort_order', 'id'], 'catalog_items_sort_id_index');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_category_sort_id_index');
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropIndex('gallery_items_sort_id_index');
        });

        Schema::table('catalog_items', function (Blueprint $table) {
            $table->dropIndex('catalog_items_sort_id_index');
        });
    }
};
