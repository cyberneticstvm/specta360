<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingArea extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function status(){
        return ($this->deleted_at) ? "<span class='badge bg-danger'>Deleted</span>" : "<span class='badge bg-success'>Active</span>";
    }
}
