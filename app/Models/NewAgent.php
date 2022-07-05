<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAgent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tel',
        'address',
        'email',
        'whatsapp',
        'note',
    ];
    public function travelAgents(){
        return $this->hasMany(TravelAgentRoom::class, 'travel_agent_id' , 'id');
    }
 public function totalReservation(){
        return $this->hasMany(TotalReservation::class, 'travel_agent_id' , 'id');
    }
public function Reservation(){
        return $this->hasMany(TotalReservation::class, 'travel_agent_id' , 'id');
    }

}
