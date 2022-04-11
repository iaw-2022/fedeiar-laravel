@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Registered Users
</h2>
@endsection

@section('page content')
<table class="table table-bordered">
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
                <th scope="row">{{ $user->id }}</th>
                <td> {{ $user->name }}</td>
                <td> {{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection