<?php

namespace App\Socomir\Years;

use App\Socomir\Finances\Finance;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use NodeTrait;

    protected $fillable = [
        'year',
        'slug',
        'status',
        'parent_id'
    ];


    protected $hidden = [];

    public function finances()
    {
        return $this->belongsToMany(Finance::class);
    }
}
