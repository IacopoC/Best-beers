@extends('layout')

@section('title')
    Le Birre - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Le Birre</h1>
                            <p class="text-white">Qui trovi tutte le birre in archivio</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row mb-3">
            @if(!empty($allBeers))
                @foreach( $allBeers as $allBeer)
                    <div class="col-md-4">
                        <div class="mt-4 mb-4">
                        <h4>{{ $allBeer->name }}</h4>
                        <p>{{ $allBeer->tagline }}</p>
                            <div class="p-3">
                                <img class="img-fluid h-160" src="{{$allBeer->image_url}}" alt="{{ $allBeer->name }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
        </div>
    </div>
@endsection
