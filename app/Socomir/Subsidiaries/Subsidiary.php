<?php

namespace App\Socomir\Subsidiaries;


use App\Socomir\Cities\City;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use NodeTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'city_id',
        'parent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
