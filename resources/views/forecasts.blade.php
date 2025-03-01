@foreach($forecasts as $forecast)

    <p> <span style="color: red">Sunrise</span>: {{ $sunrise }}</p>
    <p><span style="color: blue">Sunset</span>: {{ $sunset }}</p>
    <p> <span style="color: green">Date</span>: {{ $forecast -> forecast_date }} - <span style="color: darkcyan">Temperature</span>: {{ $forecast -> temperature }} </p>
@endforeach
