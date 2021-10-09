@inject('countries', 'App\Http\Utilities\Country')
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
                            <h1 class="display-4 text-white mt-5 mb-2">Welcome {{ $user->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><strong>User data</strong></p>
                <p>Nickname: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Subscribed: {{ date('d M Y', $user->created_at->timestamp) }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(!empty($user->address))
                    <p class="pt-4"><strong>Address</strong></p>
                    <p>{{ $user->address }}
                        @endif
                        @if(!empty($user->zip))
                            {{ $user->zip }}</p>
                @endif
                @if(!empty($user->hometown))
                    <p>{{ $user->hometown }}
                        @endif
                        @if(!empty($user->province))
                            {{ $user->province }} @endif
                            @if(!empty($user->country))
                              - {{ $user->country }}
                            @endif
                    </p>
            </div>
            <div class="col-md-12 pt-4 pb-4">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Update profile
                </button>
            </div>
        </div>
    </div>

    <!-- Modal user -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mw-100 w-75">
            <div class="modal-content">
                <div class="modal-header card-header-title">
                    <h4 class="modal-title card-element-title">Add user informations</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group pt-4">
                            <label for="address" class="col-md-4 control-label-p">Address</label>
                            <div class="col-md-9">
                                <input id="address" type="text" class="form-control" name="address" value="@if(!empty($user->address)){{ $user->address }} @endif">
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <label for="zip" class="col-md-6 control-label-p">ZIP</label>
                            <div class="col-md-9">
                                <input id="zip" type="text" class="form-control" name="zip" value="@if(!empty($user->zip)){{ $user->zip }} @endif">
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <label for="province" class="col-md-6 control-label-p">Province</label>
                            <div class="col-md-9">
                                <input id="province" type="text" class="form-control" name="province" value="@if(!empty($user->province)){{ $user->province }} @endif">
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <label for="hometown" class="col-md-4 control-label-p">Town</label>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"></span>
                                    <input id="hometown" type="text" class="form-control" name="hometown" value="@if(!empty($user->hometown)){{ $user->hometown }} @endif" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-4 pb-4">
                            <label for="country" class="col-md-4 control-label-p">State</label>

                            <div class="col-md-9">
                                <select id="country" class="form-control form-select" aria-label="Default select" name="country">

                                    <!--See blade inject for Country class-->
                                    <?php $code=''; ?>
                                    @foreach( $countries::all() as $country => $code)
                                        <option <?php if (isset($user->country) && $user->country == $code): echo "selected"; endif;?> value="{{ $code }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-2">
                                <button type="submit" class="btn btn-warning">
                                    Update profile
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection
