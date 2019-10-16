<?php

namespace App\Socomir\pagaduria;

use Illuminate\Database\Eloquent\Model;

class pagaduria extends Model
{
    public $table='pagaduria';
    public $timestamps = false;
    protected $primaryKey= 'id';

    protected $fillable = ['id','name','office','city','departament','active','category'];

    public function liquidator()
    {
        return $this->hasMany(liquidator::class);
    }

}
