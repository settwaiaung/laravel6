@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header d-flex justify-content-between px-2 py-1">
                    <a href="/receipe/{{$receipe->id}}" class="pt-1">{{$receipe->name}}</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Ingredients: {{$receipe->ingredients}}
                    </h5>
                    <p class="card-text">Category: {{$receipe->category->name}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="/" type="button" class="btn btn-sm btn-outline-secondary">Back</a>
                        </div>
                        <small class="text-muted">{{$receipe->created_at->diffForHumans()}} by {{$receipe->user->name}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection