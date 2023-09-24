<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type',
        'price',
        'duration',
        'user_id',
        'activation_date',
        'expiry_date',        
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
