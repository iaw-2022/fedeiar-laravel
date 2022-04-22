@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Edit game {{ $gameName }}
</h1>
@endsection

@section('page content')


<form method="POST" action="/games/{{$gameName}}">
    @csrf
    @method('PUT')
    <div>
        <label class="fs-4 form-label">Game name</label>
        <input type="text" name="gameName" value="{{ old('gameName', $gameName) }}" placeholder="Game name" class="form-control" required>
        @error('gameName')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <hr class="mb-3 mt-4">
    </hr>


    <div>
        <label class="fs-4 form-label">Categories</label>
        <p>Enter the name of one or more speedrunning categories of the game</p>
    </div>

    <div id="categories">
        @foreach($categories as $category)
            <div class="row mb-3">
                <div class="col-auto">
                    <input type="text" class="form-control" placeholder="Category name" name="categoryName[]" value="{{$category->category_name}}">
                </div>
                <div class="col-auto">
                    <div class="btn btn-small btn-danger" type="button" onclick="deleteCategory(this)">Delete</div>
                </div>
            </div>
        @endforeach
        <!-- Aquí se insertan las categorías con los botones edit y delete, usando Add Category -->   
    </div>
    
    <div class="row">
        <div class="col-auto">
            <input id="categoryNameInput" type="text" class="form-control" placeholder="Category name">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="button" id="addCategoryButton">Add Category</button>
        </div>
        @error('categoryName')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error('categoryName.*')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>


    <hr class="mb-3 mt-4">
    </hr>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/games" class="btn btn-danger" role="button">Cancel</a>
    </div>
</form>


<script type="text/javascript" src="/js/addGameCategory.js"></script>


@endsection