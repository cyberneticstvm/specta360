<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
        'status',
        'created_by',
        'updated_by',
    ];

    public function getStatus(){
        return ($this->status == 1) ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Cancelled</span>";
    }

    public function subCategory(){
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
