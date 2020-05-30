@extends('layout')

@section('content')
    <div class="card mt-2">
        <div class="card-header d-flex justify-content-between px-2 py-1">
            <a href="/receipe/{{$receipe->id}}" class="pt-1">{{$receipe->name}}</a>
            <form method="POST" action="/receipe/{{$receipe->id}}" class="form-inline pt-0">
                @method('delete')
                @csrf
                <a href="/receipe/{{$receipe->id}}/edit"><i class="fas fa-edit"></i></a>
                <button type="submit" class="btn btn-link"><i class="far fa-trash-alt"></i></button>
            </form>  
        </div>
        <div class="card-body">
            <h5 class="card-title">
                Ingredietns: {{$receipe->ingredients}}
            </h5>
            <p class="card-text">Category: {{$receipe->category}}</p>
        </div>
    </div>
@endsection