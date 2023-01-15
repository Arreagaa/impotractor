<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizationItem extends Model
{
    use HasFactory;
    protected $table = 'cotization_items';

    public function cotization()
    {
        return $this->belongsTo(Cotization::class);
    }
}
