<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Category',
        'Title',
        'Poster',
        'Description',
        'Price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }
}
