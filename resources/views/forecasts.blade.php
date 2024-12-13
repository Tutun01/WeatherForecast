@foreach($forecast as $test)
    <p> Date: {{ $test -> forecast_date }} - Temperature {{ $test -> temperature }} </p>
@endforeach
