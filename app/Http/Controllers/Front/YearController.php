<?php

namespace App\Http\Controllers\Front;

use App\Socomir\Years\Repositories\YearRepository;
use App\Socomir\Years\Repositories\Interfaces\YearRepositoryInterface;
use App\Http\Controllers\Controller;

class YearController extends Controller
{
    /**
     * @var YearRepositoryInterface
     */
    private $yearRepo;

    /**
     * CategoryController constructor.
     *
     * @param YearRepositoryInterface $categoryRepository
     */
    public function __construct(YearRepositoryInterface $yearRepository)
    {
        $this->yearRepo = $yearRepository;
    }

    /**
     * Find the category via the slug
     *
     * @param string $slug
     * @return \App\Socomir\Years\Year
     */


    public function getYear(string $slug)
    {
        $year = $this->yearRepo->findYearBySlug(['slug' => $slug]);
        $repo = new YearRepository($year);
        $finances = $repo->findFinances()->where('status', 1)->all();



        return view('front.years.year', [
            'year' => $year,
            'finances' => $repo->paginateArrayResults($finances, 20)
        ]);
    }
}
