<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class DashboardController extends Controller
{
    use RegistersUsers;
    
    /**
     * ItemController constructor.
     *
     * @param DashboardRepositoryInterface $itemRepository
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('admin.dashboard', [
            'user' => $user = auth()->guard('employee')->user()
        ]);
    }
}
