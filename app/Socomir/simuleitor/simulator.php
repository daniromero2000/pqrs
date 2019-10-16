<?php

namespace App\Socomir\simuleitor;

use App\lead;
use Illuminate\Database\Eloquent\Model;

class simulator extends Model
{
    protected $table = 'simulators';
    protected $fillable = ['rate','gap','assurance','assurance2'];

}
