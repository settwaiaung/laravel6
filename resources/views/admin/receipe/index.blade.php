@extends('admin.layouts.dashboard')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Receipes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="/receipe/create" type="button" class="btn btn-sm btn-outline-secondary">New</a>
            <a href ="/receipe/download" type="button" class="btn btn-sm btn-outline-secondary">Export</a>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Ingredients</th>
                <th>Category</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipes as $receipe)
            <tr>
                <td>#</td>
                <td>{{$receipe->name}}</td>
                <td>{{$receipe->ingredients}}</td>
                <td>{{$receipe->category->name}}</td>
                <td><img src="{{asset('/images')."/".$receipe->image}}" alt="{{$receipe->image}}" class="img-fluid" width='100px' height='auto'></td>
                <td>{{$receipe->created_at->diffForHumans()}}</td>
                <td>{{$receipe->updated_at->diffForHumans()}}</td>
                <td>
                    <form method="POST" action="receipe/{{$receipe->id}}" class="form-inline pt-0">
                        @method('delete')
                        @csrf
                        <a href="/receipe/{{$receipe->id}}/edit"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-link"><i class="far fa-trash-alt"></i></button>
                    </form>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection