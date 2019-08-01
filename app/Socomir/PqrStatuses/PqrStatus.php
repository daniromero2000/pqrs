<?php

namespace App\Socomir\PqrStatuses;

use App\Socomir\Pqrs\pqr;
use Illuminate\Database\Eloquent\Model;

class PqrStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function pqrs()
    {
        return $this->hasMany(Pqr::class);
    }
}
