<?php

namespace App\Socomir\lead;

use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'name', 'lastName', 'email', 'telephone', 'city', 'typeService', 'typeProduct', 'state', 'channel', 'termsAndConditions', 'typeDocument', 'identificationNumber', 'assessor', 'nearbyCity'
    ];

    public function liquidator()
    {
        return $this->hasMany(liquidator::class);
    }
}
