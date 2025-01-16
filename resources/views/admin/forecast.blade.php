
@extends("admin.layout")

@section("content")

    <form method="POST" action="{{route("forecast.save")}}">

        <h2> Create new forecast </h2>
        {{csrf_field()}}

        <div class="mb-3 col-md-5">
            <select name="city_id" class="form-select">
                @foreach(\App\Models\Cities::all() as $city)
                    <option value="{{$city->id}}">{{$city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-5">
        <input class="form-control" type="text" name="temperature" placeholder="Enter temperature">
        </div>

        <div class="mb-3 col-md-5">
            <select name="weather_type" class="form-select">
                @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                    <option>{{ $weather }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-5">
        <input class="form-control" type="number" name="probability" placeholder="Enter the precipitation chance">
        </div>

        <div class="mb-3 col-md-5">
        <input class="form-control" type="date" name="forecast_date">
        </div>

        <div class="col-md-5">
            <button class="btn btn-outline-primary col-12">Save</button>
        </div>

    </form>

    <div class="d-flex flex-wrap" style="gap: 10px">
        @foreach(\App\Models\Cities::all() as $city)
            <div>
                <p>{{ $city->name }}</p>

                <ul class="list-group  mb-4">
                    @foreach($city->forecasts as $forecast)

                        @php $color= \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                            $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type)
                        @endphp

                        <li class="list-group-item ">{{$forecast->forecast_date}} -
                            <i class="fa-solid {{$icon}}"  ></i>
                            <span style="color: {{$color}}">{{$forecast->temperature}} </span></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>


@endsection


<i class="fa-solid fa-sun"></i>
<i class="fa-solid fa-cloud-rain"></i>
<i class="fa-solid fa-snowflake"></i>


