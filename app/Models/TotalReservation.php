<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalReservation extends Model
{




    use HasFactory;
    protected $fillable = ['guest_id' ,'meal_id','total','note','roomType_id','roomCategory_id','travel_agent_id'
        ,'nights_no','from','hotel_id','user_id','to' ,'adult','agentTotal','hotelTotal',
        'child', 'roomNumber','specialRequest','totalHotel','cancel','rooms','extraCharge','dateReservation'];
    public function guests()
    {
        return $this->belongsTo(NewGuest::class, 'guest_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
   public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function travelAgents()
    {
        return $this->belongsTo(NewAgent::class, 'travel_agent_id', 'id');
    }
    public function roomTypes()
    {
        return $this->belongsTo(RoomType::class, 'roomType_id', 'id');
    }

    public function meals()
    {
        return $this->belongsTo(MealPlan::class, 'meal_id', 'id');
    }

    public function hotelContracts()
    {
        return $this->belongsTo(HotelContract::class, 'hotelContract_id', 'id');
    }
    public function totals()
    {
        return $this->belongsTo(TotalReservation::class, 'total_id', 'id');
    }
    public function roomCategors(){
        return $this->belongsTo(RoomCategory::class,'roomCategory_id','id');
    }
}
