<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = ['start' => 'datetime', 'end' => 'datetime'];

    public function getStatus(){
        return ($this->status == 1) ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-warning'>Pending</span>";
    }

    public function expired(){
        return ($this->end >= Carbon::today()) ? "" : "<span class='badge bg-danger'>Expired</span>";
    }

    public function couponNameToUpper($name){
        return $this->name = strtoupper($name);
    }

    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}
