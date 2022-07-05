<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaMoves extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'collect',
        'pay',
        'note',
        'kind',
        'agent_id',
        'hotel_id',
        'guest_id',
        'total_id','user_id'
    ];
    public function hotels(){
        return $this->belongsTo(Hotel::class,'hotel_id','id' , 'id');
    }
    public function agents(){
        return $this->belongsTo(NewAgent::class,'agent_id','id' , 'id');
    }
    public function guests(){
        return $this->belongsTo(NewGuest::class,'guest_id','id' , 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
