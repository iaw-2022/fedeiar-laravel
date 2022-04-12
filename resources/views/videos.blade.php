@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Speedrun videos of {{ $gameName }}
</h2>
@endsection

@section('page content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link" id="all-btn" type="button">
                All
            </button>
        </li>
    @foreach($categories as $category)
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="{{$category->category_name}}" type="button">
                {{$category->category_name}}
            </button>
        </li>
    @endforeach
</ul>


<table id="videosTable" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Game Name</th>
            <th scope="col">Category</th>
            <th scope="col">Completion time (in minutes)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
        <tr>
            <td>{{ $video->id }}</td>
            <td>{{ $video->username }}</td>
            <td>{{ $video->category_name }}</td>
            <td>{{ $video->completion_time_minutes }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Scripts -->
<script>
    $(document).ready(function() {
        var table = $('#videosTable').DataTable();
        $('#all-btn').click(function(){
            table.search('').draw();
        });


    });
</script>

@endsection