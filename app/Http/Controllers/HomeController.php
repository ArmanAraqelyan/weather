<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return View
    */
    public function index(): View
    {
        $countries = Country::all();
        return view('index', compact('countries'));
    }
}
