<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'deleted_at',
        'created_at',
        'updated_at' 
    ];

    use HasFactory;

    protected $primary_key = 'id';
    protected $table = 'stations';}
