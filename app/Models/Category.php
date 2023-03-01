<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    // One to many relationship for getting the shops owned by the user
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
