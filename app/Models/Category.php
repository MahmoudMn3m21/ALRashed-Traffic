<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
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
