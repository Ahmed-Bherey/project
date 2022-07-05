<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankMoves extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'collect',
        'pay',
       'note','Bank_id',
        'kind','name','total_id','user_id'
    ];
    public function banks()
    {
        return $this->belongsTo(Bank::class, 'Bank_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
