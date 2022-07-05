<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{


    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'travel_agent_id',
        'room_no',
        'note',

    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function travelAgents()
    {
        return $this->belongsTo(TravelAgentRoom::class, 'travel_agent_id', 'id');
    }


}
