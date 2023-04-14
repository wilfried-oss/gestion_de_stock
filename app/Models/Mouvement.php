<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'location_id',
        'type',
        'quantity',
        'unit_cost',
        'total_cost',
    ];
}
