@extends('layouts.app')

@section('content')
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($receipes as $receipe)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/public/receipe/{{$receipe->id}}">{{$receipe->name}}</a></h5>
                            <p class="card-text">Ingredients: {{$receipe->ingredients}}</p>
                            <p class="card-text">Category: {{$receipe->category->name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/public/receipe/{{$receipe->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-muted">{{$receipe->created_at->diffForHumans()}} by {{$receipe->user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$receipes->links()}}
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>
@endsection
