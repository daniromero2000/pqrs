<?php

namespace App\Http\Controllers\Front\TermsConditions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function termsConditions()
    {
        return view('front.termsConditions.termsConditions');
    }
}
