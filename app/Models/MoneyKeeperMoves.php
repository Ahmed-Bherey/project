<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyKeeperMoves extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'collect',
        'pay',
       'note','moneyKeeper_id',
        'kind','name','total_id','user_id'
    ];
    public function moneyKeepers()
    {
        return $this->belongsTo(MoneyKeeper::class, 'moneyKeeper_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
