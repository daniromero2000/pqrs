<?php

namespace App\Socomir\PqrStatuses;

use App\Socomir\Pqrs\pqr;
use Illuminate\Database\Eloquent\Model;

class PqrStatus extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];


    protected $hidden = [];

    public function pqrs()
    {
        return $this->hasMany(Pqr::class);
    }
}
