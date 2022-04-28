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
            <td><a href='/games/{{ $game->game_name }}' class="text-primary"><u>{{ $game->game_name }}</u></a></td>
            <td>
                <a class="btn btn-info" href="games/{{$game->game_name}}/edit">Edit</a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-game="{{$game->game_name}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Delete Modal -->
@include('utilities.modal')

<!-- Success flash -->
@include('utilities.flash')

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#gamesTable').DataTable();
    });
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var gameName = button.data('game'); // Extract info from data-* attributes

        var modal = $(this)
        modal.find('.modal-title').text('Delete '+gameName);
        modal.find('.modal-body').text('Are you sure you want to delete '+gameName+'? All the videos associated will be deleted.');
        $('#deleteForm').attr('action', 'games/'+gameName);
    })
</script>
@endsection