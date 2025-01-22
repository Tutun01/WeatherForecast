@foreach($forecast as $weather )
<p> Current temperature : {{ $weather->temperature }} in city {{ $weather->city->name }}</p>
@endforeach
