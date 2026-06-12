<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_name',
        'guest_name',
        'guest_email',
        'guests',
        'travel_date',
        'notes',
    ];
}
