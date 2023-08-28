<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getStatus(){
        return ($this->status == 1) ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Inactive/Cancelled</span>";
    }

    public function vendor(){
        return $this->belongsTo(vendor::class, 'vendor_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function tags(){
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }

    public function colors(){
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    public function sizes(){
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }
}
