@foreach($forecast as $city => $temperature)
    <p> Current temperature : {{ $temperature }} in city {{ $city }}</p>
@endforeach
