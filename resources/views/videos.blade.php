@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Speedrun videos of {{ $gameName }}
</h2>
@endsection

@section('page content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <a href='/games/{{ $gameName }}/'>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">
                All
            </button>
        </li>
    </a>
    @foreach($categories as $category)
        <a href='/games/{{ $gameName }}/{{ $category->category_name }}'>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">
                    {{$category->category_name}}
                </button>
            </li>
        </a>
    @endforeach
</ul>
<div class="tab-content" id="myTabContent">
    <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div> -->
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>

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
        $('#videosTable').DataTable();
    });
</script>

@endsection