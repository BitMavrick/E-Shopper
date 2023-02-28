<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
    ];

    // Reverse relationship for getting the user who owns the shop form shop id
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
