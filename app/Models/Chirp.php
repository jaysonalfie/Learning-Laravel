<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;
     
    //Defines attributes that can be mass -assigned
    protected $fillable = [
        'message',// Only the 'message' attribute can be mass-assigned
    ];
}
