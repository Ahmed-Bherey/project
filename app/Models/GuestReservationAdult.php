<?php

namespace App\Models;

use App\Models\NewGuest;
use App\Models\GuestReservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestReservationAdult extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_reservation_id',
        'nid',
        'name',

        'birth_date',
        'nationality',
        'tel',
        'whatsapp',
        'email'
    ];

    public function guestReservations(){
        return $this->belongsTo(GuestReservation::class , 'guest_reservation_id' , 'id');
    }

}
