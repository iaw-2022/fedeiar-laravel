@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Add game
</h1>
@endsection

@section('page content')


<form method="POST" action="/games" enctype="multipart/form-data">
    @csrf
    <div>
        <label class="fs-4 form-label">Game name</label>
        <input type="text" name="gameName" value="{{ old('gameName') }}" placeholder="Game name" class="form-control" required>
        @error('gameName')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 mt-4">
        <label class="fs-4 form-label">Add game image</label>
        <input type="file" name="gameImage" class="form-control" id="gameImage" required>
    </div>

    <hr class="mb-3 mt-4">
    </hr>

    <div>
        <label class="fs-4 form-label">Categories</label>
        <p>Enter the name of one or more speedrunning categories of the game</p>
    </div>

    <div id="categories">
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

    @include('utilities.submitCancel-buttons', ['submitButtonName' => 'Submit Game', 'cancelPath' => '/games'])
</form>


@include('games.categoryScript')


@endsection