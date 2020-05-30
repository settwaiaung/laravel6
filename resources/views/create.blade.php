@extends('layout')

@section('content')
    <h1>Create Receipe</h1>
    <div class="container">
        <form method="POST" action="/receipe">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                @error('name')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror   
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{old('ingredients')}}">
                @error('ingredients')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror 
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{old('category')}}">
                @error('category')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror 
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection