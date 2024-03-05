<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'user_id', 'payment_method'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
