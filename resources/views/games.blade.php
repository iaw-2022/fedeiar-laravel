@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Games
</h2>
@endsection

@section('page content')
<div class="container">
    <table id="gamesTable" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Game Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td> <a href='/games/{{ $game->name }}' class="text-primary"><u>{{ $game->name }}</u></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#gamesTable').DataTable();
    });
</script>
@endsection