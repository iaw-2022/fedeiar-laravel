@extends('layouts.app')

@section('header')
<h1>
    Home Page
</h1>
@endsection

@section('page content')

    Welcome {{auth()->user()->name}}

@endsection