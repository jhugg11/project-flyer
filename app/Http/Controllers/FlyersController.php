<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Utilities\Country;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\AuthorizeUsers;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;

/**
 * Class FlyersController
 * @package App\Http\Controllers
 */
class FlyersController extends Controller
{

    use AuthorizeUsers;

    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['show']]);
        parent::__construct();

    }

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

        if (! $this->userCreatedFlyer($request)) {
           return $this->unauthorized($request);
        }
        $photo = $this->makePhoto($request->file('photo'));


        Flyer::locatedAt($zip, $street)>addPhoto($photo);

    }



    protected function makePhoto(UploadedFile $file)
    {
//        return $photo = Photo::fromForm($file)->store($file);
        return $photo = Photo::named($file->getClientOriginalName())
            ->move($file);

    }
}


