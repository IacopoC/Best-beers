@extends('layout')

@section('title')
    Beers - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Beers</h1>
                            <p class="text-white">All beers in the archive</p>
                            <p class="text-white"><a class="text-white" href="{{ url('/') }}">Home</a> / Beers</p>
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
            @if(!empty($allBeers))
                @foreach( $allBeers as $allBeer)
                    <div class="col-md-3">
                        <div class="p-4 m-2 text-center">
                            <h4>{{ $allBeer->name }}</h4>
                            <a class="text-dark text-decoration-none" href="{{ url('single-beer/' . $allBeer->id) }}">
                                <div class="p-3">
                                    @if(!is_null($allBeer->image_url))
                                    <img class="img-fluid beer-image h-160" src="{{ $allBeer->image_url }}" alt="{{ $allBeer->name }}">
                                    @else
                                    <img class="img-fluid beer-image h-160" src="{{ asset('/img/beer-no-image.jpg') }}" alt="{{ $allBeer->name }}">
                                    @endif
                                </div>

                            <p class="fw-bold">{{ $allBeer->tagline }}</p>
                                <p class="fw-bold">First Brewed: {{ $allBeer->first_brewed }}</p></a>
                        </div>
                    </div>
                    @endforeach
                @endif
        </div>
        <div class="row">
            <div class="col-md-12">
        <nav aria-label="page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ Request::path() === 'beers/1' ? 'active': '' }}"><a class="page-link" href="{{ url('beers/1') }}">1</a></li>
                <li class="page-item {{ Request::path() === 'beers/2' ? 'active': '' }}"><a class="page-link" href="{{ url('beers/2') }}">2</a></li>
                <li class="page-item {{ Request::path() === 'beers/3' ? 'active': '' }}"><a class="page-link" href="{{ url('beers/3') }}">3</a></li>
                <li class="page-item {{ Request::path() === 'beers/4' ? 'active': '' }}"><a class="page-link" href="{{ url('beers/4') }}">4</a></li>
                <li class="page-item {{ Request::path() === 'beers/5' ? 'active': '' }}"><a class="page-link" href="{{ url('beers/5') }}">5</a></li>
                <li class="page-item {{ Request::path() === 'beers/6' ? 'active': '' }}"><a class="page-link" href="{{ url('beers/6') }}">6</a></li>
            </ul>
        </nav>
            </div>
        </div>
        </div>

@endsection
