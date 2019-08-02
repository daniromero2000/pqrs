<?php

namespace App\Socomir\PqrCommentaries;

use App\Socomir\Pqrs\pqr;
use App\Socomir\Provinces\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class PqrCommentary extends Model
{
    use SoftDeletes, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'pqr_id',
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
     * @param $term
     *
     * @return mixed
     */
    public function searchPqrCommentary($term)
    {
        return self::search($term);
    }
}
