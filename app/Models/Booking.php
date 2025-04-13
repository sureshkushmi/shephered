<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'destination',
    'depart_date',
    'return_date',
    'duration',
    // add any other fields you're mass assigning
];
}
