<?php

namespace App\Models;

use App\Models\HotelPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'address',
        'room_no',
        'tel',
        'whatsapp',
        'email',
    ];

//    public function meals(){
//        $this->belongsTo(HotelPrice::class , 'hotel_id' , 'id');
//    }
}
