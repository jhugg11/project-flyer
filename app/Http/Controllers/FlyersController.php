<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class FlyersController
 * @package App\Http\Controllers
 */
class FlyersController extends Controller
{
    public function create()
    {
        $countries = \App\Http\Utilities\Country::all();

        return view('flyers.create', compact('countries'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }
}


