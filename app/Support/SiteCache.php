<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class SiteCache
{
    public const TTL_SECONDS = 3600;

    public const KEY_HOME = 'site.home';

    public const KEY_CATEGORIES_INDEX = 'site.categories.index';

    public const KEY_CATEGORY_TREE = 'site.categories.tree';

    public static function remember(string $key, callable $callback): mixed
    {
        return Cache::remember($key, self::TTL_SECONDS, $callback);
    }

    public static function flushAll(): void
    {
        foreach ([self::KEY_HOME, self::KEY_CATEGORIES_INDEX, self::KEY_CATEGORY_TREE] as $key) {
            Cache::forget($key);
        }
    }
}
