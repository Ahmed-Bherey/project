<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'ar_name',
        'tel',
        'tel1',
        'tel2',
        'tel3',
        'tel4',
        'address',
        'logo',
        'vat_num',
        'cr',
        'email',
        'fax',
    ];
}
