<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id', 'name'
    ];

    public function districts()
    {
        return $this->hasMany(District::class,'town_id','id');
    }
}
