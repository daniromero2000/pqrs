<?php

namespace App\Socomir\Finances;

use App\Socomir\Years\Year;
use App\Socomir\FinanceImages\FinanceImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Nicolaslopezj\Searchable\SearchableTrait;

class Finance extends Model
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'finances.name' => 10,
            'finances.description' => 5
        ]
    ];

    protected $fillable = [
        'name',
        'description',
        'cover',
        'status',
        'slug',
    ];


    protected $hidden = [];

    public function years()
    {
        return $this->belongsToMany(Year::class);
    }

    public function images()
    {
        return $this->hasMany(FinanceImage::class);
    }

    public function searchFinance(string $term): Collection
    {
        return self::search($term)->get();
    }
}
