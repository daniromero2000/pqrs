<?php

namespace App\Http\Controllers\Front\Tarifas;

use App\Http\Controllers\Controller;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;

class TarifasController extends Controller
{
    private $financeRepo;

    public function __construct(
        FinanceRepositoryInterface $financeRepository
    ) {
        $this->financeRepo = $financeRepository;
    }

    public function tarifas()
    {
        $finance = $this->financeRepo->searchFinance('tarifas');

        return view('front.tarifas.tarifas', [
            'finance' => $this->financeRepo->findFinanceById($finance[0]->id)
        ]);
    }
}
