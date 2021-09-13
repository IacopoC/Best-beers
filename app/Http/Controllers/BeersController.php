<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeersController extends Controller
{

    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

    public function index($page) {

        $allBeers = $this->basetype->getDefaultBeers($page);

        return view('beers', compact( 'allBeers'));
    }

    public function show($id) {

        $singleBeer = $this->basetype->getSingleBeer($id);
        $count_beer = $this->getCountedBeer($id);

        return view('single-beer', compact( 'singleBeer'));
    }

    public function getCountedBeer($id) {
        $user_id = Auth::user()->id;
        $counted_beer = Beer::where('beers_id', $id)->where('users_id', $user_id)->get();
        
        return $counted_beer;
    }

}
