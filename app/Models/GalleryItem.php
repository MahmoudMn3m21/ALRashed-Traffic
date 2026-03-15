<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function getTitle()
    {
        if (app()->getLocale() === 'ar' && $this->title_ar) {
            return $this->title_ar;
        }
        return $this->title_en ?: '';
    }
}
