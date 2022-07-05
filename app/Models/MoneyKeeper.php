<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyKeeper extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'balance',
        'kind',
        'note',
        'number',

    ];

}


