@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Submit video of {{$gameName}}
</h1>
@endsection

@section('page content')


<form method="POST" action="/games/{{$gameName}}">
    @csrf

    <label class="fs-4 form-label">Select the category of the speedrun</label>
    <select name="category_id" class="form-select mb-3 w-25">
        <?php
        foreach ($categories as $category) {
            $selected = old('category_id') == $category->id ? 'selected' : '';
            echo "<option value='$category->id'". $selected ." > $category->category_name </option>";
        }
        ?>
    </select>


    <label class="fs-4 form-label">Enter the completion time of the run</label>
    <div class="row mb-3 w-25">
        <div class="col">
            <label class="fs-5 form-label">Hours</label>
            <input name="hours" type="number" class="form-control" placeholder="Hs" value="{{ old('hours') }}" required>
        </div>
        <div class="col">
            <label class="fs-5 form-label">Minutes</label>
            <input name="minutes" type="number" class="form-control" placeholder="Min" value="{{ old('minutes') }}" required>
        </div>
        <div class="col">
            <label class="fs-5 form-label">Seconds</label>
            <input name="seconds" type="number" class="form-control" placeholder="Sec" value="{{ old('seconds') }}" required>
        </div>

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
        <input name="link" type="url" name="gameName" value="{{ old('link') }}" class="form-control w-50" placeholder="Video link" required>
        @error('link')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>


    <hr class="mb-3 mt-4">
    </hr>

    @include('utilities.submitCancel-buttons', ['submitButtonName' => 'Submit Run', 'cancelPath' => '/games/'.$gameName])
</form>


@endsection