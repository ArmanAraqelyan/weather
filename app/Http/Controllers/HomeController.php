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
        $countries = Country::select('id', 'name')->get();
        return view('index', compact('countries'));
    }
}
