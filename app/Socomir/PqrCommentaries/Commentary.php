<?php

namespace App\Socomir\PqrCommentaries;

use App\Socomir\Pqrs\Pqr;
use App\Socomir\Provinces\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Commentary extends Model
{
    use SoftDeletes, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'Pqr_id',
        'commentary_1',
        'user',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = ['deleted_at'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'commentary_1' => 10,
        ]
    ];

    public function pqr()
    {
        return $this->belongsTo(Pqr::class);
    }
  
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @param $term
     *
     * @return mixed
     */
    public function searchCommentary($term)
    {
        return self::search($term);
    }
}
