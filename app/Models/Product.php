<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug', 'price'];


    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            $slug = Str::slug($product->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function(Product $product) {        
            $slug = Str::slug($product->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
