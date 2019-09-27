<?php

namespace App\Http\Controllers\Front;

use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Socomir\Finances\Transformations\FinanceTransformable;

class FinanceController extends Controller
{
    use FinanceTransformable;

    private $financeRepo;

    public function __construct(FinanceRepositoryInterface $financeRepository)
    {
        $this->financeRepo = $financeRepository;
    }


    public function show(int $id)
    {
        $finance = $this->financeRepo->findFinanceByID($id);
        $year = $finance->years()->first();

        return view('front.finances.finance', compact(
            'finance',
            'year'
        ));
    }
}
