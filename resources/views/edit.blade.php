@extends('layout')

@section('content')
    <h1>Create Receipe</h1>
    <div class="container">
        <form method="POST" action="/receipe/{{$receipe->id}}">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$receipe->name}}">
            </div>
            <div class="form-group">
              <label for="ingredients">Ingredients</label>
              <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{$receipe->ingredients}}">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <input type="text" class="form-control" id="category" name="category" value="{{$receipe->category}}">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection