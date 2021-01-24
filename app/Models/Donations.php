<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Donation  extends Models
{
    use HasFactory, Notifiable;
    
   

    protected $fillable = [
        'id',
        'user_id',
        'receiver_id',
        'quantity',
        'description',


    ];
    protected $table = 'donations';
    protected $primaryKey = 'id';
    protected $hidden = ['quantity'];

}