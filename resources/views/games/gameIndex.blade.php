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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{ $game->id }}</td>
            <td> <a href='/games/{{ $game->name }}' class="text-primary"><u>{{ $game->name }}</u></a></td>
            <td>
                <a class="btn btn-info" href="games/{{$game->name}}/edit">Edit</a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete game</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the game? All the videos associated will be deleted.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="/games/nombrejuego?/delete">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>


@include('components.flash')


<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#gamesTable').DataTable();
    });
</script>
@endsection