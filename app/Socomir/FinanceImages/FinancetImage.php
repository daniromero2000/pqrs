<?php

namespace App\Socomir\FinanceImages;

use App\Socomir\Finances\Finance;
use Illuminate\Database\Eloquent\Model;

class FinanceImage extends Model
{
    protected $fillable = [
        'finance_id',
        'src'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Finance::class);
    }
}
