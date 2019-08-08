<?php

namespace App\Socomir\FinanceImages;

use Jsdecena\Baserepo\BaseRepository;
use App\Socomir\Finances\Finance;

class FinanceImageRepository extends BaseRepository
{
    /**
     * FinanceImageRepository constructor.
     * @param FinanceImage $financeImage
     */
    public function __construct(FinanceImage $financeImage)
    {
        parent::__construct($financeImage);
        $this->model = $financeImage;
    }

    /**
     * @return mixed
     */
    public function findFinance() : Finance
    {
        return $this->model->finance;
    }
}
