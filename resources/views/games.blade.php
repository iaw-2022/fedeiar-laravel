@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Games
</h2>
@endsection

@section('page content')
<table id="gamesTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Game Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
            <tr>
                <th scope="row">{{ $game->id }}</th>
               <td> <a href='/games/{{ $game->name }}' class="text-primary"><u>{{ $game->name }}</u></a></td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#gamesTable').DataTable();
    } );
</script>
@endsection

