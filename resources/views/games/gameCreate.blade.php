@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Add game
</h1>
@endsection

@section('page content')


<form method="POST" action="/games">
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

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/games" class="btn btn-danger" role="button">Cancel</a>
    </div>
</form>


    
<script>
    let addCategoryButton = document.getElementById("addCategoryButton");
    addCategoryButton.onclick = function(){
        let input = document.getElementById("categoryNameInput")
        //document.getElementById("categories").innerHTML += addNewRow(input.value);
        $("#categories").append(addNewRow(input.value));
        input.value = "";
    };

    function deleteCategory(target){
        target.parentNode.parentNode.remove();
    }

    function addNewRow(texto){
        let newRow = 
        '<div class="row mb-3">'+
            '<div class="col-auto">'+
                '<input type="text" class="form-control" placeholder="Category name" name="categoryName[]" value="'+texto+'" required>'+
            '</div>'+
            '<div class="col-auto">'+
                '<button class="btn btn-small btn-danger" type="button" onclick="deleteCategory(this)">Delete</button>'+
            '</div>'+
        '</div>'
        return newRow;
    }
</script>


@endsection