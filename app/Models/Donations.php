<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Donation  extends Models
{
    use HasFactory, Notifiable;

    @var array

    protected $fillable = [
        'id',
        'name',
        'price',
        'information',


    ];
    protected $table = 'Donations';
    protected $primaryKey = 'id';
    protected $hidden = 'price';

     @var array

    protected $casts = [
        'donations_send' => 'datetime',
    ];
