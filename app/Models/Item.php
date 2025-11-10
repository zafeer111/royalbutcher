<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Item extends Model
{
    use HasFactory;

        protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'base_price',
        'discount_percent',
        'status',
        'customization_options',
    ];

        protected $casts = [
        'status' => 'boolean',
        'base_price' => 'decimal:2',
        'discount_percent' => 'decimal:2',
        'customization_options' => 'array', // Automatically handle JSON
    ];

        public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function discountedPrice(): Attribute
    {
        return new Attribute(
            get: function () {
                if ($this->discount_percent > 0) {
                    $discountAmount = ($this->base_price * $this->discount_percent) / 100;
                    return round($this->base_price - $discountAmount, 2);
                }
                return $this->base_price;
            },
        );
    }
}
