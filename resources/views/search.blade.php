@extends('layout')

@section('title')
    Searched: {{ $query }} - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Searched: {{ $query }}</h1>
                            <p class="text-white">All details of searched beers</p>
                            <p class="text-white"><a class="text-white" href="{{ url('/') }}">Home</a> / Search</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            @include('layouts/search-bar')
        </div>
        <div class="row mb-3">
            @if(!empty($beerResults))
                @foreach( $beerResults as $beerResult)
                    <div class="col-md-3">
                        <div class="p-4 m-2 text-center">
                            <h4>{{ $beerResult->name }}</h4>
                            <a class="text-dark text-decoration-none" href="{{ url('single-beer/' . $beerResult->id) }}">
                                <div class="p-3">
                                    <img class="img-fluid beer-image h-160" src="{{$beerResult->image_url}}" alt="{{ $beerResult->name }}">
                                </div>

                                <p class="fw-bold">{{ $beerResult->tagline }}</p>
                                <p class="fw-bold">First Brewed: {{ $beerResult->first_brewed }}</p></a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
