<?php

namespace App\Socomir\Employees;

use App\Socomir\Subsidiaries\Subsidiary;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Employee extends Authenticatable
{
    use Notifiable, SoftDeletes, LaratrustUserTrait;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'status',
        'position',
        'subsidiary_id'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
