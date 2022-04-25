@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Submit video of {{$gameName}}
</h1>
@endsection

@section('page content')


<form method="POST" action="/games">
    @csrf

    <label class="fs-4 form-label">Select the category of the speedrun</label>
    <select class="form-select mb-3" aria-label="Default select example">
        <?php
        $i = 0;
        foreach ($categories as $category) {
            echo "<option value='{{$i}}'> $category->category_name </option>";
            $i++;
        }
        ?>
    </select>

    <div class="mb-3">
        <label class="fs-4 form-label">Enter the completion time of the game (in minutes)</label>
        <input type="number" class="form-control">
    </div>

    <div>
        <label class="fs-4 form-label">Enter the URL link to the video</label>
        <input type="text" name="gameName" placeholder="Video link" class="form-control">
    </div>


    <hr class="mb-3 mt-4">
    </hr>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/games/{{$gameName}}" class="btn btn-danger" role="button">Cancel</a>
    </div>
</form>



<script>

</script>


@endsection