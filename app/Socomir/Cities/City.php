<?php

namespace App\Socomir\Cities;

use App\Socomir\Provinces\Province;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'province_id'
    ];

    public $timestamps = false;

    protected $hidden = [];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
