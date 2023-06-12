<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected static function booted(): void
    {
        static::creating(function (Category $category) {
            $slug = Str::slug($category->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $category->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function(Category $category) {        
            $slug = Str::slug($category->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $category->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    
    public function products():HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    
}
