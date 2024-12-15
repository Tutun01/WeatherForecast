<form method="POST" action="{{route('weather.update') }}">
    {{csrf_field()}}

    <select name="city_id">

        @foreach(\App\Models\Cities::all() as $city)
            <option value="{{$city->id}}">{{$city->name }}</option>
        @endforeach
    </select>
    <input type="text" name="temperature" placeholder="Enter temperature">
    <select name="weather">
        <option>rainy</option>
        <option>snowy</option>
        <option>sunny</option>
    </select>
    <input type="number" name="precipitation" placeholder="Enter the precipitation chance">
    <input type="date" name="date">

    <button>Save</button>

</form >

<div>

    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p> {{ $weather->city->name ?? 'Unknown City'}} - {{ $weather->temperature }}</p>
    @endforeach


</div>

