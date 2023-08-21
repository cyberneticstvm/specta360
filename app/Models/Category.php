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
        return ($this->status == 1) ? "<span class='text-primary'>Active</span>" : "<span class='text-danger'>Cancelled</span>";
    }
}