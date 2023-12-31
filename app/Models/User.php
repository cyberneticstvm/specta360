<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'datetime'
    ];

    public function getStatus(){
        return ($this->status == 'active') ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Inactive</span>";
    }

    public function createdAt(){
        return ($this->created_at) ? $this->created_at->format('d/M/Y') : '';
    }

    public function products(){
        return $this->hasMany(Product::class, 'id', 'vendor_id');
    }

    public function addresses(){
        return $this->hasMany(Address::class, 'id', 'user_id');
    }
}
