@foreach($forecast as $weather )
    <p> Current temperature : {{ $weather->temperature }} in city </p>
@endforeach
