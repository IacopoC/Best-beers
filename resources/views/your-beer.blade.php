@extends('layout')

@section('title')
    Your Beers - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Yours Beer catalogue</h1>
                            <p class="text-white">Here you can find {{ $user->name }}'s beers catalogue of saved beers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <ol class="list-group list-group-numbered mt-4 mb-4">
               @foreach($yourBeers as $beer)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $beer->name }}</div>
                                <p>{{ $beer->tagline }}</p>
                                <h4 class="fw-bold @if($beer->count_drink >= 6) {{ 'text-danger' }} @else {{ 'text-warning' }} @endif">{{ $beer->drunk }}</h4>
                            </div>
                            <span class="badge @if($beer->count_drink >= 6) {{ 'bg-danger' }} @else {{ 'bg-warning' }} @endif rounded-pill">{{ $beer->count_drink }}</span>
                        </li>
                @endforeach
                </ol>
                <a href="{{ url('beers/1') }}"><button type="button" class="btn btn-warning">Go to Beers</button></a>
            </div>
        </div>
    </div>
@endsection
