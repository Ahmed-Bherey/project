<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelContract extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'date',
        'name',
        'rate',
        'note',
        'offerFrom',
        'offerTo',
        'mealPlan_id',
        'roomCategory_id', 'offerRate','reservationRate_id',

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
    }


}
