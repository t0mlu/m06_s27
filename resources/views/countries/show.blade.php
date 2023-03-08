@extends('countries.layout')

@section('content')
<h2>Countries show</h2>
<p><b>{{$country->Name}}</b></p>
<ul>
    @foreach ($country->getAttributes() as $key => $value)
    <li>{{$key}}: {{$value}}</li>
    @endforeach
</ul>
@endsection