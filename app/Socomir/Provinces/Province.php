<?php

namespace App\Socomir\Provinces;

use App\Socomir\Cities\City;
use App\Socomir\Countries\Country;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    protected $fillable = [
        'name',
        'country_id'
    ];


    protected $hidden = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
