@extends('layout')

@section('title')
    Updated Beer - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Beer updated!</h1>
                            <p class="text-white">Congratulations!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Your beer has been updated</h2>
                <p>Go back to see other beers you want to save or update.</p>
                <a class="d-inline" href="{{ url('beers/1') }}"><button type="button" class="btn btn-warning">Go to Beers</button></a>
                <a class="d-inline" href="{{ url('your-beer') }}"><button type="button" class="btn btn-warning">Your Beers</button></a>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('img/update-beer.jpg') }}" alt="beers">
            </div>
        </div>
    </div>
@endsection
