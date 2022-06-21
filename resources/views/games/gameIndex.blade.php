@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Games
</h1>
@endsection

@section('page content')

@if(auth()->user()->role == 'administrator')
    <a class="btn btn-success mb-2" href="games/create" role="button">Add Game</a>
@endif

<table id="gamesTable" class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Game Name</th>
            @if(auth()->user()->role == 'administrator')
                <th>Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{ $game->id }}</td>
            <td style="width: 10%" class="text-center"><img class="rounded" src="/images/{{$game->id}}_{{str_replace(':', '_', $game->updated_at)}}.jpg" width="150"></td> 
            <td><a href='/games/{{ $game->game_name }}' class="text-primary"><u>{{ $game->game_name }}</u></a></td>
            @if( auth()->user()->role == 'administrator' )
                <td>
                    <a class="btn btn-info" href="games/{{$game->game_name}}/edit">Edit</a>
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-game="{{$game->game_name}}">Delete</a>
                </td>
            @endif
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
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var gameName = button.data('game'); // Extract info from data-* attributes

        var modal = $(this)
        modal.find('.modal-title').text('Delete '+gameName);
        modal.find('.modal-body').text('Are you sure you want to delete '+gameName+'? All the videos associated will be deleted.');
        $('#deleteForm').attr('action', 'games/'+gameName);
    })
</script>
@endsection