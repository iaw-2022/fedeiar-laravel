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