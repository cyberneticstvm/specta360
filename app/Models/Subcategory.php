<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
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

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }
}
