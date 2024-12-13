<form xmlns:input="http://www.w3.org/1999/html">

    <input type="text" name="temperature" placeholder="Enter temperature">
    <select name="city_id">

        @foreach(\App\Models\Cities::all() as $city)
            <option value="{{$city->id}}">{{$city->name }}</option>
        @endforeach
    </select>
    <button>ADD</button>

</form>

<div>

    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p> {{ $weather->city->name ?? 'Unknown City'}} - {{ $weather->temperature }}</p>
    @endforeach


</div>