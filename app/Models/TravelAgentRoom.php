<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\NewAgent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelAgentRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'travel_agent_id',
        'hotel_id',
        'room_no',
        'note'
    ];

    public function travelAgents(){
        return $this->belongsTo(NewAgent::class, 'travel_agent_id' , 'id');
    }

    public function hotels(){
        return $this->belongsTo(Hotel::class,'hotel_id','id' , 'id');
    }
}
