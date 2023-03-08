@extends('countries.layout')

@section('content')
<h2>Countries index</h2>
@foreach ($countries as $country)
<p><b>{{$country->Name}}</b></p>
<ul>
    @foreach ($country->getAttributes() as $key => $value)
    <li>{{$key}}: {{$value}}</li>
    @endforeach
</ul>
@endforeach
@endsection