<form class="mt-2" action="{{ url('/search') }}">
    <div class="input-group mb-3">
        <input class="form-control" type="search" name="q" placeholder="Search a beer..." value="@if(isset($_GET['q'])) {{ html_entity_decode($_GET['q']) }} @endif" aria-label="Search" id="beer-search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
    </div>
</form>
