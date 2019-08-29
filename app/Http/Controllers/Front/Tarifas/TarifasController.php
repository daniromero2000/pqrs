<?php

namespace App\Http\Controllers\Front\Tarifas;


use App\Http\Controllers\Controller;
use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;

class TarifasController extends Controller
{
    /**
     * @var FinanceRepositoryInterface
     */
    private $financeRepo;

    /**
     * FinanceController constructor.
     *
     * @param FinanceRepositoryInterface $financeRepository
     */
    public function __construct(

        FinanceRepositoryInterface $financeRepository
    ) {
        $this->financeRepo = $financeRepository;
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function tarifas()
    {
        $finance = $this->financeRepo->searchFinance('tarifas');

        return view('front.tarifas.tarifas', [
            'finance' => $this->financeRepo->findFinanceById($finance[0]->id)
        ]);
    }
}
