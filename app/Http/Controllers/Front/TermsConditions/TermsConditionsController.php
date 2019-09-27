<?php

namespace App\Http\Controllers\Front\TermsConditions;

use App\Http\Controllers\Controller;

class TermsConditionsController extends Controller
{
    public function termsConditions()
    {
        return view('front.termsConditions.termsConditions');
    }
}
