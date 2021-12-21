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
            @if(!is_null($singleBeer['0']->image_url))
            <img src="{{ $singleBeer['0']->image_url }}" alt="{{ $singleBeer['0']->name }}">
             @endif
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
                    <form id="savebeer" method="POST">
                        @if(isset($count_beer))
                        @method('PATCH')
                        @endif
                        {{ csrf_field() }}
                        <input type="hidden" name="beers_id" id="beer-id" value="{{ $singleBeer['0']->id }}">
                        <input type="hidden" name="name" id="beer-name" value="{{ $singleBeer['0']->name }}">
                        <input type="hidden" name="tagline" id="beer-tagline" value="{{ $singleBeer['0']->tagline }}">
                        <input type="hidden" name="count_drink" id="beer-count" value="@if($count_beer) {{ $count_beer->count_drink }} @else {{ 0 }} @endif">
                        <input type="hidden" name="drunk" id="beer-drunk" value="@if($count_beer) {{ $count_beer->drunk }} @else {{ 'sober, good Job!' }} @endif">
                        <input type="hidden" name="users_id" id="user-id" value="{{ Auth::user()->id }}">
                        <p class="beerCounter pt-4 pb-2">Numbers of times you pour this beer: <span id="displayCount">@if($count_beer)
                                {{ $count_beer->count_drink }}
                            @else {{ 0 }} @endif</span></p>
                        <p id="displayDrunk" class="sober">@if($count_beer)
                            {{ $count_beer->drunk }}
                            @else {{ 'sober, good Job!' }} @endif</p>
                            <button type="submit" class="btn btn-warning" id="saveBeer">
                                @if(isset($count_beer)) {{'Update Beer'}} @else {{ 'Save Beer' }} @endif <img class="play-icon img-fluid" src="{{ asset('img/save.png') }}" alt="save icon">
                            </button>
                    </form>
                    <audio id="pouring-audio" src="{{ asset('audio/beer-pouring.mp3') }}"></audio>
                    <audio id="hiccup-audio" src="{{ asset('audio/hiccup.mp3') }}"></audio>
                    @endauth
                @guest
                    <div class="pt-3">
                        <p><strong><a class="text-danger" href="{{ url('/register') }}">Register</a> or <a class="text-danger" href="{{ url('/login') }}">login</a> to drink and save beers</strong></p>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <script src="{{ asset('js/beer-count.js') }}"></script>
@endsection
