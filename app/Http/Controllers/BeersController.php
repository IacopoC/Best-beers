<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeersController extends Controller
{
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

    public function index() {

        $allBeers = $this->basetype->getDefaultBeers();

        return view('beers', compact( 'allBeers'));
    }

}
