@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    @yield('title')
</h1>
@endsection

@section('page content')

    @section('form content')

        @section('categoryLabelContent')
            <div>
                <label class="fs-4 form-label">Categories</label>
                <p>Enter the name of one or more speedrunning categories of the game</p>
            </div>
        @endsection
        @yield('categoryLabelContent')

        @section('addCategorySection')
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
        @endsection
        @yield('addCategorySection')

    @endsection
    @yield('form content')

@endsection

@include('games.categoryScript')



