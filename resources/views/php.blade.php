@extends('layout')

@section('content')
    <h1>Php Page</h1>
    <h2>Syllabus</h2>
    @foreach ($catalog as $k => $v)
    <p>{{$k}} => {{$v}}</p>
    @endforeach
@endsection