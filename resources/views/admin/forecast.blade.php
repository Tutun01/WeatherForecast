
<form method="POST">
    <input type="text" name="temperature" placeholder="Enter temperature">

    <select name="city_id">

        @foreach(\App\Models\Cities::all() as $city)
            <option value="{{$city->id}}">{{$city->name }}</option>
        @endforeach
    </select>

    <select>
        @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
            <option>{{ $weather }}</option>
        @endforeach
    </select>

    <input type="number" name="probability" placeholder="Enter the precipitation chance">

    <input type="date" name="forecast_date" >

    <button>Save</button>
</form>

@foreach(\App\Models\Cities::all() as $city)

    <p>{{ $city->name }}</p>
    <ul>
        @foreach($city->forecasts as $forecast)
            <li>{{$forecast->forecast_date}} - {{$forecast->temperature}}</li>
        @endforeach
    </ul>

@endforeach
