@extends('layout')

@section('title')
    Beers - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Beers</h1>
                            <p class="text-white">All beers in the archive</p>
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
                    <div class="col-md-3">
                        <div class="p-4 m-2 bg-light text-center">
                            <h4>{{ $allBeer->name }}</h4>
                            <a href="single-beer/{{ $allBeer->id }}">
                                <div class="p-3">
                                    <img class="img-fluid beer-image h-160" src="{{$allBeer->image_url}}" alt="{{ $allBeer->name }}">
                                </div>
                            </a>
                            <p>{{ $allBeer->tagline }}</p>
                            <p>First Brewed: {{ $allBeer->first_brewed }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
        </div>
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <button type="button" class="btn btn-warning" id="btn-more-results">More results</button>
            </div>
        </div>
            <div id="more-results" class="row"></div>
        </div>
    <script>
        let moreResults = document.querySelector('.more-results');
        document.getElementById("btn-more-results").addEventListener("click", function() {
            fetch('https://api.punkapi.com/v2/beers?page=2&per_page=40')
                .then(response => response.json())
                .then(data => data.forEach(function (values) {
                    document.getElementById("more-results").innerHTML += `<div class=\"col-md-3\"><div class=\"p-4 m-2 bg-light text-center\"><h4>${values.name}</h4> <a href="single-beer/${values.id}"><div class="p-3"><img class=\" img-fluid beer-image h-160 \" src="${values.image_url}" alt="${values.name}"></div></a><p>${values.tagline}</p><p>First Brewed: ${values.first_brewed}</p></div></div>`;
                }))
        });
    </script>
@endsection
