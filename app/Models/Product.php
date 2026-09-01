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
        'usages',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
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

    public function getImageUrl(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return asset('storage/'.$this->image);
    }

    /**
     * @return array<int, array{label: string, value: string}>
     */
    public function getSpecificationEntries(): array
    {
        $fields = [
            'code' => __('products.product_code'),
            'material' => __('products.material'),
            'color' => __('products.color'),
        ];

        $entries = [];

        foreach ($fields as $field => $label) {
            $value = $this->{$field};

            if (filled($value)) {
                $entries[] = [
                    'label' => $label,
                    'value' => $value,
                ];
            }
        }

        return $entries;
    }

    /**
     * @return array<int, string>
     */
    public function getUsageLines(): array
    {
        return $this->splitMultilineField($this->usages);
    }

    /**
     * @return array<int, string>
     */
    public function getFeatureLines(): array
    {
        return $this->splitMultilineField($this->features);
    }

    /**
     * @return array<int, array{src: string, alt: string}>
     */
    public function getGalleryImages(): array
    {
        if (! $this->image) {
            return [];
        }

        return [
            [
                'src' => $this->getImageUrl(),
                'alt' => $this->getName(),
            ],
        ];
    }

    /**
     * @return array<int, string>
     */
    private function splitMultilineField(?string $value): array
    {
        if (! filled($value)) {
            return [];
        }

        $normalized = str_replace('\\n', "\n", $value);

        return collect(preg_split('/\R+/', $normalized))
            ->map(fn ($line) => trim((string) $line))
            ->filter()
            ->values()
            ->all();
    }
}
