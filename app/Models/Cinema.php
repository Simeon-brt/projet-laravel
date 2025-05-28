<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titre',
        'description',
        'image',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }


}
