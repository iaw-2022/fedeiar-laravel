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
            <th scope="col">Position</th>
            <th scope="col">User</th>
            <th scope="col">Game Name</th>
            <th scope="col">Category</th>
            <th scope="col">Completion time (in minutes)</th>
            <th scope="col">link to video</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
        <tr>
            <td>{{ $video->id }}</td>
            <td>{{ $video->username }}</td>
            <td>{{ $video->game_name }}</td>
            <td>{{ $video->category_name }}</td>
            <td>{{ $video->completion_time_minutes }}</td>
            <td>{{ $video->link_video }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Scripts -->
<script>
    let allCategories = <?php echo json_encode($categories); ?>;
    
    $(document).ready(function() {
    $('#videosTable').DataTable( {

        "order":[[4, "asc"]],

        initComplete: function () {
            this.api().columns(3).every( function () {
                var column = this;
                var select = $('<select><option value="">Show All</option></select>')
                    .appendTo( '#categoryFilter' )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                allCategories.forEach( function ( categoryName ) {
                    select.append( '<option value="'+categoryName.category_name+'">'+categoryName.category_name+'</option>' )
                } );
            } );
        }

    } );
} );
</script>

@endsection