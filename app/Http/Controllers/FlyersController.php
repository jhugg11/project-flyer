<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Utilities\Country;
use App\Photo;
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
        $countries = Country::all();

        return view('flyers.create', compact('countries'));
    }

    /**
     * @param Request $request
     */
    public function store(Requests\FlyerRequest $request)
    {
        Flyer::create($request->all());

//        session()->flash('flash_message', 'Flyer successfully created!');
        flash()->success('Success', 'Your Flyer has been created!');

        return redirect()->back();
    }

    public function show($zip, $street)
    {

        $flyer = Flyer::locatedAt($zip, $street);
//        dd(compact('flyer'));

        return view('flyers.show', compact('flyer'));
    }

    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = Photo::fromForm($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

        return 'Done';
    }
}


