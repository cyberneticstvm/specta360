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
        return ($this->status == 1) ? "<span class='text-primary'>Active</span>" : "<span class='text-danger'>Cancelled</span>";
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
