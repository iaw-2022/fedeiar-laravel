@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Games
</h1>
@endsection

@section('page content')

<a class="btn btn-success mb-2" href="games/create" role="button">Add Game</a>

<table id="gamesTable" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Game Name</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{ $game->id }}</td>
            <td> <a href='/games/{{ $game->name }}' class="text-primary"><u>{{ $game->name }}</u></a></td>
            <td>
                <a class="btn btn-info" href="games/{{$game->name}}/edit">Edit</a>
                <a class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@include('components.flash')


<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#gamesTable').DataTable();
    });
</script>
@endsection