<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'meal_id',
        'date_range',
        'price'
    ];

    public function hotels(){
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    } public function meals(){
        return $this->belongsTo(MealPlan::class,'meal_id','id');
    }
}
