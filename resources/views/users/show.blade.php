@extends('users.layout')

@section('content')
    <h2>Show User</h2>
    <a href="{{ route('users.index') }}">Back</a>
    <br /><br />

    <strong>Name:</strong>
    {{ $user->name }}
    <br />

    <strong>Email:</strong>
    {{ $user->email }}
@endsection
