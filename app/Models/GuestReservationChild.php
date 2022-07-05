<?php

namespace App\Models;

use App\Models\GuestReservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestReservationChild extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_reservation_id',
        'nid',
        'name',

        'birth_date'
    ];

    public function guestReservations(){
        return $this->belongsTo(GuestReservation::class , 'guest_reservation_id' , 'id');
    }
}
