<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;
    protected $fillable = [
        'source_location_id',
        'destination_location_id',
        'produit_id',
        'quantity',
        'unit_cost',
        'total_cost',
    ];
}
