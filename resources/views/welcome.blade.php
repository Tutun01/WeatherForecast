@extends("layout")

@section("content")

    <form  style="height: 100vh;" class="text-white text-left d-flex flex-wrap flex-column container justify-content-center align-items-center back p-3 mb-2 bg-dark" method="GET" action="{{route('forecast.search') }}">
            <h1 class="col-md-4 col-12"><i class="fa-solid fa-house"></i>Find your city</h1>

            @if(\Illuminate\Support\Facades\Session::has("error"))
                <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get("error") }}</p>
            @endif

            <div class="mb-3 col-md-4 col-12">
                <input class="form-control col-12" type="text" name="city" placeholder="Enter city">
            </div>
            <button type="submit" class="btn btn-primary col-12 mt-3"><i class="fa-brands fa-searchengin"></i>Search</button>
    </form>

@endsection
