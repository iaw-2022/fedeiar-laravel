@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Home Page
    </h2>
@endsection

@section('page content')
    
    Welcome {{auth()->user()->name}}
           
@endsection
