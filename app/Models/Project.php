<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image'
    ];

    /**
     * Get the project title in the current locale
     */
    public function getTitle()
    {
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }

    /**
     * Get the project title in the opposite locale
     */
    public function getAlternateTitle()
    {
        return app()->getLocale() == 'ar' ? $this->title_en : $this->title_ar;
    }

    /**
     * Get the project description in the current locale
     */
    public function getDescription()
    {
        return app()->getLocale() == 'ar' ? $this->description_ar : $this->description_en;
    }

    /**
     * Get the project description in the opposite locale
     */
    public function getAlternateDescription()
    {
        return app()->getLocale() == 'ar' ? $this->description_en : $this->description_ar;
    }
}
