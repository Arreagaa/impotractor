<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotization extends Model
{
    use HasFactory;
    protected $table = 'cotizations';
    protected $guarded = ["id"];
}
