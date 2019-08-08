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

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'finances.name' => 10,
            'finances.description' => 5
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cover',
        'status',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function years()
    {
        return $this->belongsToMany(Year::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(FinanceImage::class);
    }

    /**
     * @param string $term
     * @return Collection
     */
    public function searchFinance(string $term): Collection
    {
        return self::search($term)->get();
    }
}
