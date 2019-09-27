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


    public $fillable = [
        'pqr_id',
        'commentary_1',
        'user',
        'status'
    ];

    protected $hidden = [];

    protected $dates = ['deleted_at'];

    public function pqr()
    {
        return $this->belongsTo(Pqr::class);
    }
}
