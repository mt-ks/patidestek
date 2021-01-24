<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'code', 'name'
    ];

    public function regions()
    {
        return $this->hasMany(Region::class,'city_id','id');
    }
}
