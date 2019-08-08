<?php

namespace App\Socomir\Finances\Transformations;

use App\Socomir\Finances\Finance;
use Illuminate\Support\Facades\Storage;

trait FinanceTransformable
{
    /**
     * Transform the finance
     *
     * @param Finance $finance
     * @return Finance
     */
    protected function transformFinance(Finance $finance)
    {
        $prod = new Finance;
        $prod->id = (int) $finance->id;
        $prod->name = $finance->name;
        $prod->sku = $finance->sku;
        $prod->slug = $finance->slug;
        $prod->description = $finance->description;
        $prod->cover = $finance->cover;
        $prod->status = $finance->status;
        return $prod;
    }
}
