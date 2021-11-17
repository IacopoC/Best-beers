@extends('layout')

@section('title')
    Home - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="display-4 text-white mt-5 mb-2">Welcome to Best Beers</h1>
                            <p class="text-white">Happy surfing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h3>Functionality of Best Beers</h3>
               <ul class="pt-4">
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
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('img/beers.jpg') }}" alt="birre">
            </div>
        </div>
    </div>
@endsection
