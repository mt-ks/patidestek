<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Station
 * @package App\Models
 * @mixin Builder
 */
class Station extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description',
        'user_id',
        'image',
        'receiver_location',
        'map_type',
        'confirmed_by_admin',
        'city_id',
        'town_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    use HasFactory;

    protected $primary_key = 'id';
    protected $table = 'stations';

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
