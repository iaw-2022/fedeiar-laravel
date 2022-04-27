@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Speedrun videos of {{ $gameName }}
</h1>
@endsection

@section('page content')

<a class="btn btn-success mb-2" href="/games/{{$gameName}}/create" role="button">Add Run</a>

<p id='categoryFilter' class="fs-5">
    Select Category :
</p>

<table id="videosTable" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Game Name</th>
            <th scope="col">Category</th>
            <th scope="col">Completion time</th>
            <th scope="col">link to video</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            use App\Http\Controllers\SpeedrunVideoController;
            $position = 0;
        ?>
        @foreach($videos as $video)
        <?php 
            $arrayTime = SpeedrunVideoController::secondsToTime($video->completion_time_seconds);
            $position++;
        ?>
        <tr>
            <td>{{ $video->id }}</td>
            <td>{{ $video->user->name }}</td>
            <td>{{ $video->game->game_name }}</td>
            <td>{{ $video->category->category_name }}</td>
            <td data-order="{{$video->completion_time_seconds}}">{{ $arrayTime['hours'].' hs, '.$arrayTime['minutes'].' m, '.$arrayTime['seconds'].' s'}}</td>
            <td><a href="{{$video->link_video}}" class="text-primary">{{ substr($video->link_video, 0, 20).'...' }}</a></td>
            <td>
                <a class="btn btn-info" href="/games/{{$gameName}}/{{$video->id}}/edit">Edit</a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-video="{{$video->id}}">Delete</a>
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
    let allCategories = <?php echo json_encode($categories); ?>;
    
    $(document).ready(function() {
        $('#videosTable').DataTable({

            "order":[[4, "asc"]],

            initComplete: function(){
                this.api().columns(3).every( function(){
                    var column = this;
                    var select = $('<select><option value="">Show All</option></select>')
                        .appendTo('#categoryFilter')
                        .on('change', function(){
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
    
                    allCategories.forEach(function(categoryName){
                        select.append('<option value="'+categoryName.category_name+'">'+categoryName.category_name+'</option>')
                    });
                } );
            }

        });
    } );
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var videoId = button.data('video'); // Extract info from data-* attributes
        
        var modal = $(this)
        modal.find('.modal-title').text('Delete run');
        modal.find('.modal-body').text('Are you sure you want to delete the run?');
        $('#deleteForm').attr('action', '/games/<?php echo $gameName; ?>'+'/'+videoId);
    })
</script>

@endsection