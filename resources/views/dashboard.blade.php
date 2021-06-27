@extends('layout')

@section('title')
    Dashboard {{ $user->name }} - Best Beers
@endsection

@section('content')
    <header class="py-5 mb-5 bg-warning">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="display-4 text-white mt-5 mb-2">Benvenuto {{ $user->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><strong>Dati utente</strong></p>
                <p>Nickname: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Iscritto dal: {{ date('d M Y', $user->created_at->timestamp) }}</p>
            </div>
        </div>
    </div>
@endsection
