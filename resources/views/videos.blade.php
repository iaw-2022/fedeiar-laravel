@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Speedrun videos of {{ $gameName }}
</h2>
@endsection

@section('page content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Game Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
            <tr>
                <th scope="row">{{ $video->id }}</th>
                <td>{{ $video->username }}</td>
                <td>{{ $video->completion_time_minutes }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection