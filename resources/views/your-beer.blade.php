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
                @if($yourBeers->isNotEmpty())
                <ol class="list-group list-group-numbered mt-4 mb-4">
                   <?php $counter = 0; ?>
               @foreach($yourBeers as $beer)
                          <?php $counter++ ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><a href="{{'/single-beer/' . $beer->beers_id }}">{{ $beer->name }}</a></div>
                                <p>{{ $beer->tagline }}</p>
                                <h4 class="fw-bold @if($beer->count_drink >= 6) {{ 'text-danger' }} @else {{ 'text-warning' }} @endif">{{ $beer->drunk }}</h4>
                            </div>
                            <span class="badge @if($beer->count_drink >= 6) {{ 'bg-danger' }} @else {{ 'bg-warning' }} @endif rounded-pill">{{ $beer->count_drink }}</span>
                            <button type="button" class="btn btn-danger mx-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $counter }}">
                                Delete
                            </button>
                            <div class="modal fade" id="deleteModal{{ $counter }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete beer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Click on delete button to cancel the record permanently
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form id="beer-delete" class="d-inline px-3" method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <input type="hidden" name="beer_id" id="beer-id" value="{{ $beer->beers_id }}">
                                                <button type="submit" id="delete-submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                @endforeach
                </ol>
                <div class="mt-4 mb-4">
                    {{ $yourBeers->links() }}
                </div>
                    <p class="float-md-end">Total beers drink: <span class="mx-2 badge bg-dark rounded-pill">{{ beersCount() }}</span></p>
                @else
                    <p>No beers saved here yet, add one from the list of beers</p>
                @endif
                <a href="{{ url('beers/1') }}"><button type="button" class="btn btn-warning">Go to Beers</button></a>
            </div>
        </div>
    </div>
@endsection
