<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name_en',
        'name_ar',
        'image',
        'description',
        'code',
        'material',
        'color',
        'features',
        'usages'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function getName()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getAlternateName()
    {
        return app()->getLocale() === 'ar' ? $this->name_en : $this->name_ar;
    }


}
