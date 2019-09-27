<?php

namespace App\Socomir\FinanceImages;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Finances\Finance;

class FinanceImageRepository extends BaseRepository
{

    public function __construct(FinanceImage $financeImage)
    {
        parent::__construct($financeImage);
        $this->model = $financeImage;
    }


    public function findFinance(): Finance
    {
        return $this->model->finance;
    }
}
