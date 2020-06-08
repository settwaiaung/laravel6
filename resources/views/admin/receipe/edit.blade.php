@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Edit Receipe</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/receipe/{{$receipe->id}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$receipe->name}}">
                    @error('name')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror  
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients</label>
                    <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{$receipe->ingredients}}">
                    @error('ingredients')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror  
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{($category->id == $receipe->category_id) ? "selected" : ""}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror 
                </div>
                <p>Image</p>
                <div class="form-group mb-2 custom-file">
                    <input type="file" class="custom-file-input" id="image"  name='image' accept="image/png, image/jpeg">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>   
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection