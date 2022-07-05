<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\NewAgent;
use App\Models\NewGuest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'hotel_id',
        'travel_agent_id',
        'date',
        'nights_no',
        'rate',
        'roomType_id',
        'roomCategory_id',
        'hotelContract_id',
        'hotelContractName',
        'adult',
        'child',
        'roomNumber',
        'sellingRate',
        'meal_id',
        'total_id',
        'note',
        'cancel',
        'rooms',


    ];

    public function guests()
    {
        return $this->belongsTo(NewGuest::class, 'guest_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
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
        return $this->hasMany(RoomCategory::class,'roomCategory_id','id');
    }
}
