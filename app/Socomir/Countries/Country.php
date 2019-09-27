<?php

namespace App\Socomir\Countries;

use App\Socomir\Provinces\Province;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'name',
        'iso',
        'iso3',
        'numcode',
        'phonecode',
        'status'
    ];

    protected $hidden = [];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
