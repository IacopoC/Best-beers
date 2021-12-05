<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Support\Facades\Auth;

class BeerscountController extends Controller
{

    public function create()
    {
        $beer_data = new Beer();

        $this->validate(request(), [
            'beers_id' => 'integer',
            'users_id' => 'integer',
        ]);

        $beer_data->beers_id = request('beers_id');
        $beer_data->name = request('name');
        $beer_data->tagline = request('tagline');
        $beer_data->count_drink = request('count_drink');
        $beer_data->drunk = request('drunk');
        $beer_data->users_id = request('users_id');

        $beer_data->save();

        return view('saved-beer');

    }

    public function update()
    {

        $id = Auth::user()->id;
        $beer_id = request('beers_id');

        $beer_data = Beer::where('beers_id', $beer_id)->where('users_id', $id)->first();

        $this->validate(request(), [
            'beers_id' => 'integer',
            'users_id' => 'integer',
        ]);

        $beer_data->count_drink = request('count_drink');
        $beer_data->drunk = request('drunk');

        $beer_data->save();

        return view('updated-beer');
    }

    public function show()
    {

        $id = Auth::user()->id;
        $yourBeers = Beer::where('users_id', $id)->orderBy('created_at', 'asc')->simplePaginate(10);
        $sumDrinkBeers = Beer::where('users_id', $id)->sum('count_drink');

        return view('your-beer', array('yourBeers' => $yourBeers, 'sumDrinkBeers' => $sumDrinkBeers, 'user' => Auth::user()));
    }

    public function delete()
    {

        $id = Auth::user()->id;
        $beer_id = request('beer_id');

        $yourBeers = Beer::where('beers_id', $beer_id)->where('users_id', $id)->first();
        $yourBeers->delete();

        return redirect()->route('your-beer');
    }
}
