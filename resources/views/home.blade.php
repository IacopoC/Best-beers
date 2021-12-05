@extends('layout')

@section('title')
    Home - Best Beers
@endsection

@section('content')
    <header class="py-5">
        <div class="container h-100">
            <div class="full-width">
                <img src="{{ asset('img/header.jpg') }}" class="img-fluid" alt="header">
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
            </div>
        </div>
        <div class="divider"></div>
    </div>
@endsection
