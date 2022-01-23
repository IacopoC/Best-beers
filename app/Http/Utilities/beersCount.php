<?php

use App\Models\Beer;
use Illuminate\Support\Facades\Auth;

if(!function_exists('beersCount')) {
    function beersCount()
    {
        $id = Auth::user()->id;
        $sumDrinkBeers = Beer::where('users_id', $id)->sum('count_drink');

        return $sumDrinkBeers;
    }
}
