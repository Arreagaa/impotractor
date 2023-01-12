<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotization extends Model
{
    use HasFactory;
    protected $table = 'cotizations';
    protected $guarded = ["id"];

    public function items()
    {
        return $this->hasMany(CotizationItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

}
