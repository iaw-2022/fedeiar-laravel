@extends('layouts.app')

@section('header')
<h2>
    Registered Users
</h2>
@endsection

@section('page content')
<table id="usersTable" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td> {{ $user->name }}</td>
                <td> {{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable();
    });
</script>
@endsection