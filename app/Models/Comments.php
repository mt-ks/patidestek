<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'station_id',
        'image',
        'comment',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
