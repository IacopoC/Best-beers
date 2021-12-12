@extends('layout')

@section('title')
    Home - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Home</h1>
                            <p class="text-white">The home of Best Beers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row mb-3 mt-3">
            <div class="col-md-7">
                <h3 class="pt-4">Welcome to Best Beers: archive of the brewdog beers</h3>
                <p class="pt-4">Functionality of Best Beers Website</p>
               <ul class="pt-2">
                   <li>Login user</li>
                   <li>See all the beer in Brewdog catalogue</li>
                   <li>Register user</li>
                   <li>Drink and save beers</li>
               </ul>
                @guest
                <div class="pt-3">
                    <p><strong><a class="text-danger" href="{{ url('/register') }}">Register</a> or <a class="text-danger" href="{{ url('/login') }}">login</a> to drink and save beers</strong></p>
                </div>
                @endguest
            </div>
            <div class="col-md-5">
                <img class="img-fluid" src="{{ asset('img/beers.jpg') }}" alt="beers">
            </div>
        </div>
        <hr class="divider">
        <div class="row mb-3 mt-3">
            <div class="col-md-5">
                <img class="img-fluid" src="{{ asset('img/beer-pub.jpg') }}" alt="pub">
            </div>
            <div class="col-md-7">
                <h3 class="pt-4">History of Brewdog</h3>
                <p class="pt-4">BrewDog is a multinational brewery and pub chain based in Ellon, Scotland. It was founded in 2007 by James Watt and Martin Dickie. Together they own 46% of the company.</p>
                <a href="https://en.wikipedia.org/wiki/BrewDog">Learn more in Wiki</a>
            </div>
        </div>
        <div class="divider"></div>
    </div>
@endsection
