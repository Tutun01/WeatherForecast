@extends("layout")

@section("content")

    <div class="d-flex flex-wrap container">
    @foreach($cities as $city)
        <p><a class="btn btn-primary text-white m-2" href="{{ route("forecast.permalink", ['city' => $city->name]) }}">{{$city->name}}</a></p>
    @endforeach
    </div>

@endsection
