<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class City
 * @package App\Models
 * @mixin Builder
 */
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
