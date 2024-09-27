<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;
     
    //Defines attributes that can be mass -assigned
    protected $fillable = [
        'message',// Only the 'message' attribute can be mass-assigned
    ];


    //establishes relationship
    public function user(): BelongsTo
    {    

        //The chirp belongs to the User
        //Chirps table has a 'user_id' column
        //this is the foreign key pointingbto the id column in the 'users' table
        return $this->belongsTo(User::class);
    }
}
