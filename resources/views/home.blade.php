@extends('layouts.app')

@section('header')
<h1 class="display-3 text-center">
    Home Page
</h1>
@endsection

@section('page content')
    <p class="fs-4 lead">
        Welcome {{auth()->user()->user_name}}, use the navigation bar to access all of the information.
    </p>
@endsection