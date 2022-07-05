<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelContractReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'reservationDate_id',
        'mealPlan_id',
        'roomCategory_id',
        'note',
        'rate', 'name',

    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function roomTypes()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
    }

    public function mealPlans()
    {
        return $this->belongsTo(MealPlan::class, 'mealPlan_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(GuestReservation::class, 'hotelContract_id', 'id');
    }

    public function roomCategors()
    {
        return $this->belongsTo(RoomCategory::class, 'roomCategory_id', 'id');
    } public function reservationDates()
    {
        return $this->belongsTo(ReservationDate::class, 'reservationDate_id', 'id');
    }
}

