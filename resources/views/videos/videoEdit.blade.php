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
    <select name="category_id" class="form-select mb-3 w-25">
        <?php
        foreach ($categories as $category) {
            if($category->id == $video->category_id){
                echo "<option selected value='$category->id'> $category->category_name </option>";
            }
            else{
                echo "<option value='$category->id'> $category->category_name </option>";
            }
        }
        ?>
    </select>

    <label class="fs-4 form-label">Enter the completion time of the run</label>
    <div class="row mb-3 w-25">
        <div class="col">
            <label class="mb-2">Hours</label>
            <input name="hours" type="number" value="{{$arrayTime['hours']}}" class="form-control" placeholder="Hs" required>
        </div>
        <div class="col">
            <label class="mb-2">Minutes</label>
            <input name="minutes" type="number" value="{{$arrayTime['minutes']}}" class="form-control" placeholder="Min" required>
        </div>
        <div class="col">
            <label class="mb-2">Seconds</label>
            <input name="seconds" type="number" value="{{$arrayTime['seconds']}}" class="form-control" placeholder="Sec" required>
        </div>
        @error('hours')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error('minutes')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error('seconds')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div>
        <label class="fs-4 form-label">Enter the URL link to the video</label>
        <input name="link" type="url" name="gameName" value="{{$video->link_video}}" class="form-control w-50" placeholder="Video link" required>
        @error('link')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>


    <hr class="mb-3 mt-4">
    </hr>

    @include('utilities.submitCancel-buttons', ['submitButtonName' => 'Update Run', 'cancelPath' => '/games/'.$gameName])
</form>


@endsection