<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionSub extends Model
{
    use HasFactory;
    protected $table = 'region_sub';
    protected $fillable = [
        'region_id', 'city_id', 'name'
    ];
}
