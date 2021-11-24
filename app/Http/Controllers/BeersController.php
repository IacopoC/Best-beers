<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;
use Illuminate\Support\Facades\Auth;

class BeersController extends Controller
{

    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

    public function index($page)
    {

        $allBeers = $this->basetype->getDefaultBeers($page);

        return view('beers', compact( 'allBeers'));
    }

    public function show($id)
    {

        $singleBeer = $this->basetype->getSingleBeer($id);
        $count_beer = $this->getCountedBeer($id);

        return view('single-beer', compact( 'singleBeer','count_beer'));
    }

    public function getCountedBeer($id)
    {

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $counted_beer = Beer::where('beers_id', $id)->where('users_id', $user_id)->first();

            return $counted_beer;
        }
    }

}
