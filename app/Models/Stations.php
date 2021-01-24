<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'name',
        'id',
        'address',
        'description',
        'user_id',
    ];

   protected $primary_key = 'id';
   protected $table = 'stations';
}
