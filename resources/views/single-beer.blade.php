@extends('layout')

@section('title')
    {{ $singleBeer['0']->name }} - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">{{ $singleBeer['0']->name }}</h1>
                            <p class="text-white">First brewed: {{ $singleBeer['0']->first_brewed }}</p>
                            <p class="text-white"><a class="text-white" href="{{ url('/') }}">Home</a> / <a class="text-white" href="{{ url('/beers/1') }}">Beers</a> / {{ $singleBeer['0']->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
            <img src="{{ $singleBeer['0']->image_url }}" alt="{{ $singleBeer['0']->name }}">
            </div>
            <div class="col-md-6">
                <h4>{{ $singleBeer['0']->tagline }}</h4>
                <p><strong>Details</strong></p>
                <p>Alcohol By Volume: <strong>{{ $singleBeer['0']->abv }} %</strong> International Bittering Unit: <strong>{{ $singleBeer['0']->ibu }}</strong></p>
                <p><strong>Description</strong></p>
                <p>{{ $singleBeer['0']->description }}</p>
                <p><strong>Tips</strong></p>
                <p>{{ $singleBeer['0']->brewers_tips }}</p>
                <p><strong>Food suggestion</strong></p>
                @foreach( $singleBeer['0']->food_pairing as $food_suggested)
                    <p><img src="{{ asset('img/food-pairing.png') }}" alt="food-pairing" class="food-pairing-icon p-2">{{ $food_suggested }}</p>
                @endforeach
                @auth
                    <hr>
                    <h3 class="pb-3"><strong>Try the beer</strong></h3>
                <button type="button" class="btn btn-warning" id="pourBeer">
                    Pour Beer <img class="play-icon img-fluid" src="{{ asset('img/play-icon.png') }}" alt="play icon">
                </button>
                    <p class="beerCounter pt-4 pb-2">Numbers of times you pour this beer: <span id="displayCount">0</span></p>
                    <p id="displayDrunk"></p>
                <audio id="pouring-audio" src="{{ asset('audio/beer-pouring.mp3') }}"></audio>
                    <audio id="hiccup-audio" src="{{ asset('audio/hiccup.mp3') }}"></audio>
                    <button type="button" class="btn btn-warning" id="saveBeer">
                        Save Beer <img class="play-icon img-fluid" src="{{ asset('img/save.png') }}" alt="save icon">
                    </button>
                    @endauth
            </div>
        </div>
    </div>
    <script>

        let count = 0;
        let pourButton = document.getElementById("pourBeer");
        let displayCount = document.getElementById("displayCount");
        let displayDrunk = document.getElementById("displayDrunk");

        pourButton.addEventListener("click", function() {
            count ++;
            displayCount.innerHTML = count;

            if(count === 6) {
                document.getElementById("hiccup-audio").play();
            }
            if(count >= 6) {
                displayDrunk.innerHTML = 'drunk, ahah!';
                displayDrunk.classList.remove("sober");
                displayDrunk.classList.add("drunk");
            } else {
                displayDrunk.innerHTML = 'sober, good Job!';
                displayDrunk.classList.add("sober");
                document.getElementById("pouring-audio").play();
            }
        });

    </script>
@endsection
