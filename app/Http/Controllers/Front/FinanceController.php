<?php

namespace App\Http\Controllers\Front;

use App\Socomir\Finances\Finance;
use App\Socomir\Finances\Repositories\Interfaces\FinanceRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Socomir\Finances\Transformations\FinanceTransformable;
use Illuminate\Support\Facades\DB;


class FinanceController extends Controller
{
    use FinanceTransformable;

    /**
     * @var FinanceRepositoryInterface
     */
    private $financeRepo;

    /**
     * PFinanceController constructor.
     * @param FinanceRepositoryInterface $productRepository
     */
    public function __construct(FinanceRepositoryInterface $financeRepository)
    {
        $this->financeRepo = $financeRepository;
    }

    // /**
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    //  */
    // public function search()
    // {
    //     if (request()->has('q') && request()->input('q') != '') {
    //         $list = $this->productRepo->searchProduct(request()->input('q'));
    //     } else {
    //         $list = $this->productRepo->listProducts();
    //     }

    //     $products = $list->where('status', 1)->map(function (Product $item) {
    //         return $this->transformProduct($item);
    //     });

    //     return view('front.products.product-search', [
    //         'products' => $this->productRepo->paginateArrayResults($products->all(), 10)
    //     ]);
    // }

    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $finance = $this->financeRepo->findFinanceBySlug(['slug' => $slug]);
        $year = $finance->years()->first();

        return view('front.finances.finance', compact(
            'finance',
            'year',

            /**
         * 'combos'
         */
        ));
    }
}
