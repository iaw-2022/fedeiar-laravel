@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Speedrun videos of {{ $gameName }}
</h2>
@endsection

@section('page content')

<div id='categoryFilter'>
    Select Category
</div>

<table id="videosTable" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Game Name</th>
            <th id='#categoryColumn' scope="col">Category</th>
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
    <tfoot>
            <tr>
                <th>Id</th>
                <th>Game Name</th>
                <th>Category</th>
                <th>Completion time (in minutes)</th>
            </tr>
    </tfoot>
</table>


<!-- Scripts -->
<script>
    $(document).ready(function() {
    $('#videosTable').DataTable( {
        initComplete: function () {
            this.api().columns(2).every( function () {
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
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

@endsection