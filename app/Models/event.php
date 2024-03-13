<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'lieu',
        'durai',
        'prix',
        'image',
        'isvalide',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
}
