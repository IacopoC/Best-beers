@extends('layout')

@section('title')
     Password dimenticata - Best Beers
@endsection

@section('content')
<div class="container">
    <div class="mb-150">
    <div class="col-md-8">
    <div class="mt-150">
        <p> {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
    </div>
    <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <!-- Email Address -->
        <div class="col-md-6">
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" required autofocus />
            </div>
            </div>
        <div>
            <button type="button" class="btn btn-warning">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</div>
    </div>
</div>
@endsection
