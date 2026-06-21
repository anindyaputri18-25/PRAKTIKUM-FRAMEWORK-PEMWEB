<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Harvest extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'commodity_name',
        'quantity_kg',
        'harvest_date',
    ];
}