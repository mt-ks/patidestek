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

    public function towns()
    {
        return $this->hasMany(Town::class,'city_id','id');
    }
}
