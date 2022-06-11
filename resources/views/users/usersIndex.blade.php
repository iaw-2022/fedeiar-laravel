@extends('layouts.app')

@section('header')
<h1 class="display-5 text-left">
    Registered Users
</h1>
@endsection

@section('page content')
<table id="usersTable" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Nationality</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td> {{ $user->user_name }}</td>
                <td> {{ $user->email }}</td>
                <td> {{ $user->role }}</td>
                <td> {{ $user->nationality }}</td>
                <td>
                    @if( $user->role == 'administrator' )
                        None
                    @else
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-user="{{ $user->user_name }}">Delete</a>
                    @endif
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
        $('#usersTable').DataTable();
    });
</script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userName = button.data('user'); // Extract info from data-* attributes

        var modal = $(this)
        modal.find('.modal-title').text('Delete '+userName);
        modal.find('.modal-body').text('Are you sure you want to delete the user '+userName+'? All its videos associated will be deleted.');
        $('#deleteForm').attr('action', 'users/'+userName);
    })
</script>

@endsection