@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Submit video of {{$gameName}}
</h1>
@endsection

@section('page content')


<form method="POST" action="/games/{{$gameName}}/{{$video->id}}">
    @csrf
    @method('PATCH')

    <label class="fs-4 form-label">Select the category of the speedrun</label>
    <select name="category_id" class="form-select mb-3" aria-label="Default select example">
        <?php
        foreach ($categories as $category) {
            if($category->id == $video->id){
                echo "<option selected value='$category->id'> $category->category_name </option>";
            }
            else{
                echo "<option value='$category->id'> $category->category_name </option>";
            }
        }
        ?>
    </select>

    <div class="mb-3">
        <label class="fs-4 form-label">Enter the completion time of the game (a real number representing minutes)</label>
        <input name="time" type="number" step="any" value="{{$video->completion_time_minutes}}" class="form-control" required>
    </div>

    <div>
        <label class="fs-4 form-label">Enter the URL link to the video</label>
        <input name="link" type="text" name="gameName" value="{{$video->link_video}}" placeholder="Video link" class="form-control" required>
    </div>


    <hr class="mb-3 mt-4">
    </hr>

    @include('utilities.submitCancel-buttons', ['submitButtonName' => 'Submit Video', 'cancelPath' => '/games/'.$gameName])
</form>


@endsection