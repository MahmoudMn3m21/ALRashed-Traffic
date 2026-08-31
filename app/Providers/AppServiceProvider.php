<?php

namespace App\Providers;

use App\Models\CatalogItem;
use App\Models\Category;
use App\Models\Client;
use App\Models\GalleryItem;
use App\Models\Product;
use App\Models\Project;
use App\Models\Subcategory;
use App\Support\SiteCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $flushSiteCache = static function (): void {
            SiteCache::flushAll();
        };

        foreach ([
            Product::class,
            Project::class,
            Client::class,
            Category::class,
            Subcategory::class,
            GalleryItem::class,
            CatalogItem::class,
        ] as $modelClass) {
            /** @var class-string<Model> $modelClass */
            $modelClass::saved($flushSiteCache);
            $modelClass::deleted($flushSiteCache);
        }
    }
}
