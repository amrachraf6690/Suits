<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'duration',
        'suit_id',
        'name',
        'phone',
        'email',
        'secret_code',
        'taken',
    ];
    
    public function suit(){
        return $this->belongsTo(Suit::class);
    }

}
