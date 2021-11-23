@extends('layout')

@section('title')
    Deleted User - Best Beers
@endsection
@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">User deleted</h1>
                            <p class="text-white">Goodbye</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <div class="container">
            <div class="margin-up">
                <h4 class="text-uppercase"></h4>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"></div>

                            <div class="panel-body">
                                <h3>Your user has been eliminated</h3>
                                <a href="{{ url('/') }}"><button type="button" class="btn btn-warning">Home</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
