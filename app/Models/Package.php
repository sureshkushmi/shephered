<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
	protected $fillable = 
	[
	'title',
        'description',
        'price',
        'image',
	];

}
