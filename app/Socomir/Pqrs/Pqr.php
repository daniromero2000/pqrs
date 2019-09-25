<?php

namespace App\Socomir\Pqrs;

use App\Socomir\Addresses\Address;
use App\Socomir\PqrCommentaries\PqrCommentary;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Socomir\PqrStatuses\PqrStatus;
use Nicolaslopezj\Searchable\SearchableTrait;

class Pqr extends Authenticatable
{
    use Notifiable, SoftDeletes, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cedula',
        'email',
        'pqr',
        'asunto',
        'mensaje',
        'status',
        'city_id',
        'pqr_status_id',
        'lead',
        'phone',
        'data_politics'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'pqrs.name' => 10,
            'pqrs.cedula' => 10,
            'pqrs.lead' => 10,
            'pqrs.name' => 10,
            'pqrs.email' => 5,
            'pqrs.phone' => 5
        ],
        'joins' => [
            'pqr_statuses' => ['pqr_statuses.id', 'pqrs.pqr_status_id']
        ],
        'groupBy' => ['pqrs.id']
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class)->whereStatus(true);
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pqrcommentaries()
    {
        return $this->hasMany(PqrCommentary::class)->whereStatus(true);
    }


    /**
     * @param $term
     *
     * @return mixed
     */
    public function searchPqr($term)
    {
        return self::search($term);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pqrStatus()
    {
        return $this->belongsTo(PqrStatus::class);
    }
}
