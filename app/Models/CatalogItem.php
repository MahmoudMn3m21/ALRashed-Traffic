<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'file',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function getTitle()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }
}
