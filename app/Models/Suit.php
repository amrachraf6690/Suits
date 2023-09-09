<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'discription',
        'price',
        'color',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}
