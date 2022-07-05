<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewGuest extends Model
{
    use HasFactory;
    protected $fillable = [
        'nid',
        'name',
        'birth_date',
        'nationality',
        'tel',
        'whatsapp',
        'email',
    ];

}
