<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'region';
    protected $fillable = [
        'city_id', 'name'
    ];

    public function region_sub()
    {
        return $this->hasOne(RegionSub::class,'region_id','id');
    }
}
