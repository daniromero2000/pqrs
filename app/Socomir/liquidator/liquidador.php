<?php

namespace App;

use App\Socomir\pagaduria\pagaduria;
use Illuminate\Database\Eloquent\Model;

class liquidador extends Model
{
    protected $table = 'liquidator';

    public $timestamps = false;
    
    protected $fillable = ['creditLine', 'pagaduria', 'age', 'customerType', 'salary','amount','timeLimit'];

    public function lead()
    {
        return $this->belongsTo(lead::class);
    }

    public function pagaduria()
    {
        return $this->belongsTo(pagaduria::class);
    }
}
