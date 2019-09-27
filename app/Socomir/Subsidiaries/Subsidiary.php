<?php

namespace App\Socomir\Subsidiaries;

use App\Socomir\Cities\City;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use NodeTrait;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'opening_hours',
        'city_id',
        'parent_id'
    ];


    protected $hidden = [];


    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
