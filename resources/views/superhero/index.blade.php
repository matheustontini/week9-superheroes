@extends('main.layout')

@section('content')
<h1>The superheroes list</h1>

<ul>
    @foreach ($superheroes as $superheroe)
    <li>{{ $superheroe->name }}</li>
    @endforeach
</ul>
@endsection