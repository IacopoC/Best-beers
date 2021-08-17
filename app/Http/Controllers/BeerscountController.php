<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;

class BeerscountController extends Controller
{
    public function create(Request $request) {
        $beer_data = new Beer();

        $this->validate(request(), [
            'users_id' => 'integer',
        ]);

        $beer_data->name = request('name');
        $beer_data->tagline = request('tagline');
        $beer_data->count_drink = request('count_drink');
        $beer_data->drunk = request('drunk');
        $beer_data->users_id = request('users_id');

        $beer_data->save();

        return view('saved-beer');

    }
}
