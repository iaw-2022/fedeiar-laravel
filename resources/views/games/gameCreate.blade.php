@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Games
</h1>
@endsection

@section('page content')

<form action="/games" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Game name</label>
        <input type="text" name="gameName" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/games" class="btn btn-danger" role="button">Cancel</a>
</form>

@endsection