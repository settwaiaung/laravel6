@extends('layout')

@section('content')
    <h1>Receipe Page</h1>
    <h2>Syllabus</h2>
    @foreach ($data as $receipe)
    <p>{{$receipe->name}}</p>
    <p>{{$receipe->ingredients}}</p>
    <p>{{$receipe->category}}</p>
    @endforeach
@endsection